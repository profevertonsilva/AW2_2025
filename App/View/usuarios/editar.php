<form action="/dashboard/usuarios/atualizar" method="POST">
    <h1>Cadastro de Usuario</h1>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?=$this->getView()->usuario->__get('nome');?>" required>
        
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" value="<?=$this->getView()->usuario->__get('senha');?>" required>
    
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="">Selecione</option>
        <option value="A" <?= ($this->getView()->usuario->__get('status') == "A") ? "selected" : "";  ?>>Ativo</option>
        <option value="I" <?php if($this->getView()->usuario->__get('status') == "I"){ echo "selected"; }  ?>>Inativo</option>
    </select>

    <input type="hidden" name="id" value="<?=$this->getView()->usuario->__get('id');?>">
    <button type="submit">Cadastrar</button>
</form>