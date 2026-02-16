<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usuários Cadastrados</h3>
                <div class="card-actions">
                    <a href="<?php echo base_url('usuarios/formulario'); ?>" class="btn btn-primary">
                        <i class="ti ti-user-plus me-2"></i> Novo Usuário
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Nível</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lista_usuarios as $u): ?>
                        <tr>
                            <td><?php echo $u->nome; ?></td>
                            <td class="text-muted"><?php echo $u->email; ?></td>
                            <td><span class="badge bg-<?php echo $u->nivel == 'admin' ? 'purple' : 'azure'; ?>-lt"><?php echo $u->nivel; ?></span></td>
                            <td class="text-end">
                                <a href="<?php echo base_url('usuarios/formulario/'.$u->id); ?>" class="btn btn-warning btn-sm">
                                    <i class="ti ti-edit me-2"></i> Editar
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>