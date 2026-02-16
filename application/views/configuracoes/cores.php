<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Minha Identidade Visual</h3></div>
            <form action="<?php echo base_url('configuracoes/salvar_cores'); ?>" method="post">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Cor dos Botões e Links</label>
                        <input type="color" name="cor_primaria" class="form-control form-control-color" value="<?php echo $cores->cor_primaria ?? '#206bc4'; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cor do Menu Lateral</label>
                        <input type="color" name="cor_sidebar" class="form-control form-control-color" value="<?php echo $cores->cor_sidebar ?? '#1b2431'; ?>">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Aplicar Cores</button>
                </div>
            </form>
        </div>
    </div>
</div>