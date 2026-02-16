<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <title><?php echo $titulo; ?> - Gestão Beletti</title>
    <link href="<?php echo base_url('assets/tabler/css/tabler.min.css'); ?>" rel="stylesheet"/>
    <style>
      :root {
          --tblr-primary: <?php echo $cores->cor_primaria ?? '#206bc4'; ?>;
          --tblr-bg-surface: <?php echo $cores->cor_fundo_pagina ?? '#f4f6fa'; ?>;
      }
      
      .navbar-vertical {
          background-color: <?php echo $cores->cor_sidebar ?? '#1b2431'; ?> !important;
          color: <?php echo $cores->cor_texto_sidebar ?? '#ffffff'; ?> !important;
      }

      .navbar-vertical .nav-link {
          color: <?php echo $cores->cor_texto_sidebar ?? 'rgba(255,255,255,0.7)'; ?> !important;
      }
      
      body { background-color: var(--tblr-bg-surface); }
  </style>
  </head>
  <body>
    <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <h1 class="navbar-brand navbar-brand-autodark">
          <a href="<?php echo base_url('dashboard'); ?>">Gestão Beletti</a>
        </h1>

        <div class="collapse navbar-collapse" id="sidebar-menu">
          <ul class="navbar-nav pt-lg-3">
            <?php foreach ($menus as $m): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url($m->url); ?>">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="<?php echo $m->icone; ?> icon"></i>
                  </span>
                  <span class="nav-link-title"><?php echo $m->titulo; ?></span>
                </a>
              </li>
            <?php endforeach; ?>
            
            <li class="nav-item">
              <a class="nav-link text-danger" href="<?php echo base_url('auth/logout'); ?>">
                <span class="nav-link-icon"><i class="ti ti-logout icon"></i></span>
                <span class="nav-link-title">Sair</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </aside>

    <div class="page-wrapper">