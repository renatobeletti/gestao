<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <title><?php echo $titulo; ?> - Gestão Beletti</title>
    <link href="<?php echo base_url('assets/tabler/css/tabler.min.css'); ?>" rel="stylesheet"/>
  </head>
  <body>
    <div class="page">
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <h1 class="navbar-brand navbar-brand-autodark d-none-auto pe-0 pe-md-3">
            <a href=".">Gestão Beletti</a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown">
                <div class="d-none d-xl-block ps-2">
                  <div><?php echo $nome_usuario; ?></div>
                  <div class="mt-1 small text-muted">Administrador</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item">Sair</a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="page-wrapper">