<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <form action="<?php echo base_url('usuarios/salvar'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $user_edit->id ?? ''; ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nome Completo</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $user_edit->nome ?? ''; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $user_edit->email ?? ''; ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Telefone</label>
                            <input type="text" name="telefone" class="form-control" value="<?php echo $user_edit->telefone ?? ''; ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nível de Acesso</label>
                            <select name="nivel" class="form-select">
                                <option value="usuario" <?php echo (isset($user_edit) && $user_edit->nivel == 'usuario') ? 'selected' : ''; ?>>Usuário Comum</option>
                                <option value="admin" <?php echo (isset($user_edit) && $user_edit->nivel == 'admin') ? 'selected' : ''; ?>>Administrador</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Senha <?php echo isset($user_edit) ? '(Deixe em branco para manter)' : ''; ?></label>
                            <input type="password" name="senha" class="form-control" <?php echo isset($user_edit) ? '' : 'required'; ?>>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="<?php echo base_url('usuarios'); ?>" class="btn btn-link">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar Usuário</button>
                </div>
            </form>
        </div>
    </div>
</div>