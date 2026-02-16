<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Cadastrar Novo Menu</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <form action="<?php echo base_url('menus/salvar'); ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Título do Menu</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Ex: Clientes" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">URL (Rota)</label>
                            <input type="text" name="url" class="form-control" placeholder="Ex: clientes/listar" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ícone (Tabler Icon)</label>
                            <input type="text" name="icone" class="form-control" placeholder="ti ti-user" value="ti ti-star">
                            <small class="form-hint">Use as classes do <a href="https://tabler-icons.io/" target="_blank">Tabler Icons</a>.</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Menu Pai</label>
                            <select name="pai_id" class="form-select">
                                <option value="0">Nenhum (Item Principal)</option>
                                <?php foreach($pais as $p): ?>
                                    <option value="<?php echo $p->id; ?>"><?php echo $p->titulo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ordem de Exibição</label>
                            <input type="number" name="ordem" class="form-control" value="0">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="<?php echo base_url('menus'); ?>" class="btn btn-link">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>