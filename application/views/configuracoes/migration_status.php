<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/><title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
</head>
<body class="bg-light">
<div class="page-wrapper">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <h2 class="text-primary">Gestão Beletti <small class="text-muted">v2.0</small></h2>
        </div>

        <div class="card card-md border-0 shadow-sm">
            <div class="card-status-top <?php echo ($status == 'sucesso') ? 'bg-success' : 'bg-danger'; ?>"></div>
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Status da Migração</h3>
                
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Versão Atual</div>
                        <div class="datagrid-content">
                            <span class="badge bg-blue text-blue-fg">v<?php echo $versao_atual; ?></span>
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Última Execução</div>
                        <div class="datagrid-content"><?php echo $executado_em; ?></div>
                    </div>
                </div>

                <div class="mt-4 alert <?php echo ($status == 'sucesso') ? 'alert-success' : 'alert-danger'; ?>">
                    <div class="d-flex">
                        <div class="me-3"><?php echo ($status == 'sucesso') ? '✅' : '❌'; ?></div>
                        <div><?php echo $mensagem; ?></div>
                    </div>
                </div>

                <hr>

                <h4 class="mb-3">Histórico de Migrations Detectadas:</h4>
                <ul class="list-group list-group-flush">
                    <?php foreach ($historico as $h): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small">#<?php echo sprintf('%03d', $h['versao']); ?></span>
                            <span class="ms-2"><?php echo ucwords($h['nome']); ?></span>
                        </div>
                        <?php if ($h['versao'] <= $versao_atual): ?>
                            <span class="badge bg-green-lt">Aplicado</span>
                        <?php else: ?>
                            <span class="badge bg-yellow-lt">Pendente</span>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-primary w-100">
                    <i class="ti ti-arrow-left me-2"></i> Ir para o Painel
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>