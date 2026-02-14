<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <title>Login - Sistema de Gestão</title>
    <link href="<?php echo base_url('assets/tabler/css/tabler.min.css'); ?>" rel="stylesheet"/>
  </head>
  <body class="d-flex flex-column">
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Acesse sua conta</h2>
            <form action="<?php echo base_url('auth/login_process'); ?>" method="post" autocomplete="off">
              <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" placeholder="seu@email.com">
              </div>
              <div class="mb-2">
                <label class="form-label">Senha</label>
                <input type="password" class="form-control" placeholder="Sua senha">
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url('assets/tabler/js/tabler.min.js'); ?>" defer></script>
  </body>
</html>