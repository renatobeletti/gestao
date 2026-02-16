<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Fluxo de Contas a Pagar</h3>
                <div class="card-actions">
                    <a href="<?=base_url('contas_pagar/formulario')?>" class="btn btn-primary">
                        <i class="ti ti-plus me-2"></i> Novo Lançamento
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Vencimento</th>
                            <th>Fornecedor</th>
                            <th>Descrição</th>
                            <th>Parcela</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($despesas as $d): ?>
                        <tr>
                            <td><?= date('d/m/Y', strtotime($d->vencimento)) ?></td>
                            <td><?= $d->fornecedor ?></td>
                            <td><?= $d->descricao ?></td>
                            <td><?= $d->parcela_atual ?>/<?= $d->total_parcelas ?></td>
                            <td>R$ <?= number_format($d->valor_total, 2, ',', '.') ?></td>
                            <td>
                                <span class="badge bg-<?= $d->status == 'pago' ? 'success' : 'warning' ?>-lt">
                                    <?= ucfirst($d->status) ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-white">Ações</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>