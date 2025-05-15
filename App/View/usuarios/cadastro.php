<form action="/dashboard/usuarios/cadastrar" method="POST">
    <h1>Cadastro de Usuario</h1>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>
        
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>
    
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="A">Ativo</option>
        <option value="I">Inativo</option>
    </select>

    <button type="submit">Cadastrar</button>
</form>