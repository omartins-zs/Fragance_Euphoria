<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titulo) ? $titulo : 'Login Administrativo | Fragance Euphoria' ?></title>

    <!-- Bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #180d24 0%, #301740 50%, #0d0614 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #2e1a38;
        }
        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
            width: 100%;
            max-width: 480px;
            overflow: hidden;
            border: 1px solid rgba(255, 215, 0, 0.2);
        }
        .login-header {
            background: #1e0d2e;
            color: #ffffff;
            padding: 32px 24px;
            text-align: center;
            border-bottom: 3px solid #d4af37;
            position: relative;
        }
        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            color: #f7d57f;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }
        .login-body {
            padding: 30px 28px;
        }
        .btn-gold {
            background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%);
            color: #ffffff;
            border: none;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, #e5c158 0%, #c99719 100%);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(212, 175, 55, 0.35);
        }
        .demo-box {
            background: #faf7fc;
            border: 1px dashed #d6c5e2;
            border-radius: 12px;
            padding: 16px;
            margin-top: 24px;
        }
        .demo-btn {
            font-size: 0.84rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
            padding: 10px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none !important;
        }
        .demo-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <i class="fa-solid fa-gem mb-2" style="font-size: 2.4rem; color: #d4af37;"></i>
        <h3 class="brand-title">Fragance Euphoria</h3>
        <small class="text-light opacity-75">Painel de Gestão e E-commerce</small>
    </div>

    <div class="login-body">
        <?php if ($this->session->flashdata('erro')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-exclamation mr-1"></i> <?= $this->session->flashdata('erro') ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('sucesso')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check mr-1"></i> <?= $this->session->flashdata('sucesso') ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/auth/entrar') ?>" method="POST">
            <div class="form-group">
                <label for="email" class="font-weight-bold text-muted small text-uppercase">
                    <i class="fa-solid fa-envelope mr-1 text-warning"></i> E-mail Corporativo
                </label>
                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="seu.email@fragance.com" required>
            </div>

            <div class="form-group mb-4">
                <label for="senha" class="font-weight-bold text-muted small text-uppercase">
                    <i class="fa-solid fa-lock mr-1 text-warning"></i> Senha de Acesso
                </label>
                <input type="password" class="form-control form-control-lg" id="senha" name="senha" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-gold btn-block btn-lg shadow-sm">
                <i class="fa-solid fa-right-to-bracket mr-2"></i> Acessar Painel
            </button>
        </form>

        <div class="demo-box">
            <div class="d-flex align-items-center mb-2">
                <i class="fa-solid fa-bolt text-warning mr-2"></i>
                <strong class="text-dark" style="font-size: 0.9rem;">Perfis de Demonstração (1 Clique)</strong>
            </div>
            <p class="text-muted small mb-3">Escolha um perfil para autenticar instantaneamente:</p>

            <a href="<?= base_url('admin/auth/demo/admin') ?>" class="btn btn-outline-danger btn-block demo-btn">
                <span><i class="fa-solid fa-crown mr-2"></i> Administrador Geral</span>
                <span class="badge badge-danger">Acesso Total</span>
            </a>

            <a href="<?= base_url('admin/auth/demo/gerente') ?>" class="btn btn-outline-primary btn-block demo-btn">
                <span><i class="fa-solid fa-boxes-packing mr-2"></i> Gerente de Vendas</span>
                <span class="badge badge-primary">Gestão</span>
            </a>

            <a href="<?= base_url('admin/auth/demo/atendente') ?>" class="btn btn-outline-success btn-block demo-btn mb-0">
                <span><i class="fa-solid fa-headset mr-2"></i> Atendente de Loja</span>
                <span class="badge badge-success">Atendimento</span>
            </a>
        </div>

        <div class="text-center mt-4">
            <a href="<?= base_url('shop') ?>" class="text-muted small">
                <i class="fa-solid fa-arrow-left mr-1"></i> Ir para a Loja Virtual (Vitrine Pública)
            </a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
