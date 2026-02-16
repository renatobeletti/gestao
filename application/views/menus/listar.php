<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menus do Sistema</h3>
                <div class="card-actions">
                    <a href="<?php echo base_url('menus/adicionar'); ?>" class="btn btn-primary">
                        <i class="ti ti-plus icon"></i> Novo Menu
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>URL</th>
                            <th>Ícone</th>
                            <th>Ordem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lista_menus as $item): ?>
                        <tr>
                            <td><?php echo $item->id; ?></td>
                            <td><?php echo $item->titulo; ?></td>
                            <td><?php echo $item->url; ?></td>
                            <td><i class="<?php echo $item->icone; ?>"></i></td>
                            <td><?php echo $item->ordem; ?></td>
                            <td>
                                <button class="btn btn-sm btn-warning">Editar</button>
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>