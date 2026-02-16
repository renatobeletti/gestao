<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <title><?php echo $titulo; ?> - Gestão Beletti</title>
    <link href="<?php echo base_url('assets/tabler/css/tabler.min.css'); ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
      :root {
          /* Define a cor primária do Tabler (Botões, links, etc) */
          --tblr-primary: <?php echo $cores->cor_primaria ?? '#206bc4'; ?>;
      }
      
      /* Aplica a cor no fundo do menu lateral */
      .navbar-vertical {
          background-color: <?php echo $cores->cor_sidebar ?? '#1b2431'; ?> !important;
      }

      /* Aplica a cor nos textos do menu lateral */
      .navbar-vertical .nav-link, 
      .navbar-vertical .navbar-brand, 
      .navbar-vertical .nav-link-icon {
          color: <?php echo $cores->cor_texto_sidebar ?? '#ffffff'; ?> !important;
      }

      /* Aplica a cor de fundo da página */
      body {
          background-color: <?php echo $cores->cor_fundo_pagina ?? '#f4f6fa'; ?> !important;
      }
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
              <?php 
              $current_url = $this->uri->segment(1); // Pega 'menus', 'configuracoes', etc.
              
              $pais_principais = array_filter($menus, function($m) { return $m->pai_id == 0; });
              
              foreach ($pais_principais as $p): 
                  $filhos = array_filter($menus, function($m) use ($p) { return $m->pai_id == $p->id; });
                  $tem_filhos = !empty($filhos);
                  
                  // Verifica se algum filho está ativo
                  $filho_ativo = false;
                  foreach($filhos as $f) {
                      if($f->url == $current_url) $filho_ativo = true;
                  }
                  
                  // O pai está ativo se ele mesmo for a URL ou se um filho for
                  $pai_ativo = ($p->url == $current_url || $filho_ativo);
              ?>
              
              <li class="nav-item <?php echo $tem_filhos ? 'dropdown' : ''; ?> <?php echo $pai_ativo ? 'active' : ''; ?>">
                  <a class="nav-link <?php echo $tem_filhos ? 'dropdown-toggle' : ''; ?>" 
                     href="<?php echo $tem_filhos ? '#navbar-menu-'.$p->id : base_url($p->url); ?>" 
                     <?php echo $tem_filhos ? 'data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="'.($pai_ativo ? 'true' : 'false').'"' : ''; ?>>
                      <span class="nav-link-icon"><i class="<?php echo $p->icone; ?> icon"></i></span>
                      <span class="nav-link-title"><?php echo $p->titulo; ?></span>
                  </a>
                  
                  <?php if ($tem_filhos): ?>
                  <div class="dropdown-menu <?php echo $filho_ativo ? 'show' : ''; ?>">
                      <div class="dropdown-menu-columns">
                          <div class="dropdown-menu-column">
                              <?php foreach ($filhos as $f): ?>
                                  <a class="dropdown-item <?php echo ($f->url == $current_url) ? 'active' : ''; ?>" 
                                     href="<?php echo base_url($f->url); ?>">
                                      <i class="<?php echo $f->icone; ?> me-2"></i> <?php echo $f->titulo; ?>
                                  </a>
                              <?php endforeach; ?>
                          </div>
                      </div>
                  </div>
                  <?php endif; ?>
              </li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </aside>

    <div class="page-wrapper">