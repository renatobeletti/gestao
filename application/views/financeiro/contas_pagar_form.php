<div class="card">
    <div class="card-header"><h3 class="card-title">Novo Lançamento</h3></div>
    <form action="<?=base_url('contas_pagar/salvar')?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Descrição da Despesa</label>
                    <input type="text" name="descricao" class="form-control" placeholder="Ex: Assinatura Adobe" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Valor Total</label>
                    <input type="number" step="0.01" name="valor_total" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fornecedor</label>
                    <select name="fornecedor_id" class="form-select">
                        <?php foreach($fornecedores as $f): ?>
                            <option value="<?=$f->id?>"><?=$f->nome_fantasia?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pagar por (Banco/Cartão)</label>
                    <select name="conta_origem_id" class="form-select">
                        <?php foreach($contas as $c): ?>
                            <option value="<?=$c->id?>"><?=$c->descricao?> (<?=$c->tipo?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">1º Vencimento</label>
                    <input type="date" name="vencimento" class="form-control" value="<?=date('Y-m-d')?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Parcelas</label>
                    <input type="number" name="total_parcelas" class="form-control" value="1">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Comprovante (PDF/Imagem)</label>
                    <input type="file" name="comprovante" class="form-control">
                </div>
            </div>
            <label class="form-check mt-2">
                <input class="form-check-input" type="checkbox" name="recorrente">
                <span class="form-check-label">Despesa Recorrente (Assinatura mensal)</span>
            </label>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Lançar Despesa</button>
        </div>
    </form>
</div>