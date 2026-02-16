<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Fornecedor</label>
        <div class="input-group">
            <select name="fornecedor_id" class="form-select" required>
                <?php foreach($fornecedores as $f): ?>
                    <option value="<?=$f->id?>"><?=$f->nome_fantasia?></option>
                <?php endforeach; ?>
            </select>
            <a href="<?=base_url('fornecedores/formulario')?>" class="btn btn-outline-primary" title="Cadastrar Fornecedor">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Valor Total</label>
        <input type="number" step="0.01" name="valor_total" id="v_total" class="form-control" required>
        <small class="text-muted" id="preview_parcela">Será dividido pelas parcelas</small>
    </div>
    
    <div class="col-md-3 mb-3">
        <label class="form-label">Qtd Parcelas</label>
        <input type="number" name="total_parcelas" id="q_parcelas" class="form-control" value="1">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Chave PIX (se houver)</label>
        <input type="text" name="chave_pix" class="form-control" placeholder="E-mail, CPF, CNPJ ou Aleatória">
    </div>

    <div class="col-md-6 mb-3 d-flex align-items-end">
        <label class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="debito_automatico">
            <span class="form-check-label">Conta em Débito Automático?</span>
        </label>
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Anexar Boleto (PDF ou Imagem)</label>
        <input type="file" name="boleto" class="form-control">
    </div>
</div>

<script>
// Script simples para você ver o valor da parcela antes de salvar
document.getElementById('q_parcelas').addEventListener('input', calcular);
document.getElementById('v_total').addEventListener('input', calcular);

function calcular() {
    let total = document.getElementById('v_total').value;
    let qtd = document.getElementById('q_parcelas').value;
    if(total > 0 && qtd > 0) {
        let parc = (total / qtd).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        document.getElementById('preview_parcela').innerHTML = qtd + "x de " + parc;
    }
}
</script>