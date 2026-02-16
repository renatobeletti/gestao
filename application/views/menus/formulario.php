<?php 
    $is_edit = isset($menu_edicao);
    $action = $is_edit ? 'menus/atualizar/'.$menu_edicao->id : 'menus/salvar';
?>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $is_edit ? 'Editar: '.$menu_edicao->titulo : 'Cadastrar Novo Menu'; ?></h3>
            </div>
            <form action="<?php echo base_url($action); ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control" value="<?php echo $is_edit ? $menu_edicao->titulo : ''; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">URL</label>
                            <input type="text" name="url" class="form-control" value="<?php echo $is_edit ? $menu_edicao->url : ''; ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ícone (Tabler Icons)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i id="icon-preview" class="<?php echo $is_edit ? $menu_edicao->icone : 'ti ti-star'; ?> icon"></i></span>
                                <input type="text" name="icone" id="icone-input" class="form-control" value="<?php echo $is_edit ? $menu_edicao->icone : 'ti ti-star'; ?>">
                                <a href="https://tabler-icons.io/" target="_blank" class="btn btn-outline-secondary" title="Procurar ícone">
                                    <i class="ti ti-external-link"></i>
                                </a>
                            </div>
                            <small class="text-muted">Clique no ícone no site, copie o nome e cole acima.</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Menu Pai</label>
                            <select name="pai_id" class="form-select">
                                <option value="0">Nenhum</option>
                                <?php foreach($pais as $p): ?>
                                    <option value="<?php echo $p->id; ?>" <?php echo ($is_edit && $menu_edicao->pai_id == $p->id) ? 'selected' : ''; ?>>
                                        <?php echo $p->titulo; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ordem</label>
                            <input type="number" name="ordem" class="form-control" value="<?php echo $is_edit ? $menu_edicao->ordem : '0'; ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="<?php echo base_url('menus'); ?>" class="btn btn-link">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('icone-input').addEventListener('input', function() {
    let iconName = this.value.trim();
    
    // Se o usuário colou apenas "list", nós transformamos em "ti ti-list"
    if (!iconName.startsWith('ti ')) {
        iconName = 'ti ti-' + iconName;
    }
    
    document.getElementById('icon-preview').className = iconName + ' icon';
});
</script>