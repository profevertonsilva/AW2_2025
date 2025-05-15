<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" /><h1>Usuarios</h1>
<a href="/dashboard/usuarios/cadastro">Novo Usuario</a>

<table border='1' width='100%' cellspacing='0' cellpadding='0'>
    <tr>
        <td>#</td>
        <td>NOME</td>
        <td>SENHA</td>
        <td>STATUS</td>
        <td>AÇÕES</td>
    </tr>
    <?php foreach($this->getView()->usuarios as $usuario){ ?>
    <tr>
        <td><?= $usuario->__get('id');?></td>
        <td><?= $usuario->__get('nome');?></td>
        <td><?= $usuario->__get('senha');?></td>
        <td><?= $usuario->__get('status');?></td>
        <td>
        <a href="/dashboard/usuarios/editar/<?= $usuario->__get('id');?>"><i class="fa-solid fa-pen-to-square" title="Editar Usuário"></i></a>
        <a href="/dashboard/usuarios/excluir/<?= $usuario->__get('id');?>"><i class="fa-solid fa-trash" title="Excluir Usuário"></i></a>
        
        </td>
    </tr>
    <?php } ?>
</table>