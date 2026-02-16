<div class="page-body">
    <div class="container-xl">
        <form action="<?php echo base_url('configuracoes/salvar_cores'); ?>" method="post">
            <div class="row row-cards">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Cores da Interface</h3></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Destaque (Primária)</label>
                                <input type="color" name="cor_primaria" class="form-control form-control-color w-100" value="<?php echo $cores->cor_primaria ?? '#206bc4'; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fundo da Página</label>
                                <input type="color" name="cor_fundo_pagina" class="form-control form-control-color w-100" value="<?php echo $cores->cor_fundo_pagina ?? '#f4f6fa'; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Menu Lateral</h3></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Fundo do Menu</label>
                                <input type="color" name="cor_sidebar" class="form-control form-control-color w-100" value="<?php echo $cores->cor_sidebar ?? '#1b2431'; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Texto do Menu</label>
                                <input type="color" name="cor_texto_sidebar" class="form-control form-control-color w-100" value="<?php echo $cores->cor_texto_sidebar ?? '#ffffff'; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-check icon"></i> Salvar Preferências
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>