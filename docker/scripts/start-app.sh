#!/bin/bash
set -e

echo "[Fragance Euphoria] Inicializando aplicacao..."

# Garantir permissoes nas pastas de gravacao
mkdir -p /var/www/html/application/cache/sessions
mkdir -p /var/www/html/application/logs
mkdir -p /var/www/html/assets/admin/upload
chown -R www-data:www-data /var/www/html/application/cache /var/www/html/application/logs /var/www/html/assets/admin/upload
chmod -R 775 /var/www/html/application/cache /var/www/html/application/logs /var/www/html/assets/admin/upload

# Variaveis de conexao
DB_HOST="${DB_HOST:-mysql}"
DB_PORT="${DB_PORT:-3306}"

echo "[Fragance Euphoria] Verificando conexao com MySQL em $DB_HOST:$DB_PORT..."

# Aguardar o banco de dados estar disponivel antes de subir o servico
MAX_TRIES=30
COUNT=0
until nc -z -v -w3 "$DB_HOST" "$DB_PORT" 2>/dev/null || mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" --silent 2>/dev/null; do
    COUNT=$((COUNT + 1))
    if [ $COUNT -gt $MAX_TRIES ]; then
        echo "[Fragance Euphoria] Timeout ao aguardar banco de dados em $DB_HOST:$DB_PORT. Iniciando PHP-FPM mesmo assim..."
        break
    fi
    echo "[Fragance Euphoria] Aguardando banco de dados ($COUNT/$MAX_TRIES)..."
    sleep 2
done

echo "[Fragance Euphoria] Banco de dados pronto. Iniciando PHP-FPM..."
exec php-fpm
