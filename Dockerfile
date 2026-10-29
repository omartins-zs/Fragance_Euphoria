# PHP 8.1 FPM Alpine - Otimizado e seguro
FROM php:8.1-fpm-alpine

# Dependencias do sistema e bibliotecas
RUN apk update && apk add --no-cache \
    bash \
    curl \
    git \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    mysql-client \
    shadow \
    tzdata

# Configurar e instalar extensoes PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        mysqli \
        pdo_mysql \
        mbstring \
        intl \
        zip \
        opcache \
        gd \
        bcmath

# Configurar timezone
ENV TZ=America/Sao_Paulo

# Diretorio da aplicacao
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . /var/www/html

# Copiar configuracao customizada do PHP
COPY docker/php/local.ini /usr/local/etc/php/conf.d/local.ini

# Criar diretorios necessarios e ajustar permissoes
RUN mkdir -p /var/www/html/application/cache/sessions \
    && mkdir -p /var/www/html/application/logs \
    && mkdir -p /var/www/html/assets/admin/upload \
    && chown -R www-data:www-data /var/www/html/application/cache \
    && chown -R www-data:www-data /var/www/html/application/logs \
    && chown -R www-data:www-data /var/www/html/assets/admin/upload \
    && chmod -R 775 /var/www/html/application/cache \
    && chmod -R 775 /var/www/html/application/logs \
    && chmod -R 775 /var/www/html/assets/admin/upload

# Copiar script de inicializacao
COPY docker/scripts/start-app.sh /usr/local/bin/start-app.sh
RUN chmod +x /usr/local/bin/start-app.sh

EXPOSE 9000

CMD ["/usr/local/bin/start-app.sh"]
