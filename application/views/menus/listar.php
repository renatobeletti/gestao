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
                        <?php 
                        $pais_lista = array_filter($lista_menus, function($m) { return $m->pai_id == 0; });
                        foreach($pais_lista as $item): 
                        ?>
                            <tr class="bg-light">
                                <td><strong><?php echo $item->id; ?></strong></td>
                                <td>
                                    <strong><i class="<?php echo $item->icone; ?> me-2"></i> <?php echo $item->titulo; ?></strong>
                                </td>
                                <td><code>/<?php echo $item->url; ?></code></td>
                                <td><span class="badge bg-blue-lt">Principal</span></td>
                                <td><?php echo $item->ordem; ?></td>
                                <td class="text-end">
                                    <div class="btn-list flex-nowrap justify-content-end">
                                        <a href="<?php echo base_url('menus/editar/'.$item->id); ?>" class="btn btn-warning btn-sm d-none d-sm-inline-flex align-items-center">
                                            <i class="ti ti-edit me-2"></i> Editar
                                        </a>
                                        
                                        <a href="<?php echo base_url('menus/eliminar/'.$item->id); ?>" 
                                           class="btn btn-danger btn-sm d-none d-sm-inline-flex align-items-center" 
                                           onclick="return confirm('Deseja realmente excluir?')">
                                            <i class="ti ti-trash me-2"></i> Excluir
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <?php 
                            $filhos_lista = array_filter($lista_menus, function($m) use ($item) { return $m->pai_id == $item->id; });
                            foreach($filhos_lista as $sub): 
                            ?>
                                <tr>
                                    <td><?php echo $sub->id; ?></td>
                                    <td class="ps-4">
                                        <i class="ti ti-corner-down-right text-muted me-2"></i> <?php echo $sub->titulo; ?>
                                    </td>
                                    <td><code>/<?php echo $sub->url; ?></code></td>
                                    <td><span class="badge bg-gray-lt">Pai: <?php echo $item->titulo; ?></span></td>
                                    <td><?php echo $sub->ordem; ?></td>
                                    <td class="text-end">
                                        <div class="btn-list flex-nowrap justify-content-end">
                                            <a href="<?php echo base_url('menus/editar/'.$sub->id); ?>" class="btn btn-warning btn-sm d-none d-sm-inline-flex align-items-center">
                                                <i class="ti ti-edit me-2"></i> Editar
                                            </a>
                                            
                                            <a href="<?php echo base_url('menus/eliminar/'.$sub->id); ?>" 
                                               class="btn btn-danger btn-sm d-none d-sm-inline-flex align-items-center" 
                                               onclick="return confirm('Deseja realmente excluir?')">
                                                <i class="ti ti-trash me-2"></i> Excluir
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>