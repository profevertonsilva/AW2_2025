<?php

namespace App\Controller;

use FW\Controller\Action;
use App\DAO\UsuariosDAO;
use App\Model\UsuariosModel;


class UsuariosController extends Action{

    public function index(){
        $this->render('index', 'dashboard');
    }

    public function usuarios(){

        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->listar(); 
        $this->getView()->usuarios = $usuarios;


        $this->render('usuarios', 'dashboard');
    }

    public function cadastro(){
        $this->render('cadastro', '');
    }

    public function cadastrar(){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $status = $_POST['status'];

        $usuariosModel = new UsuariosModel();
        $usuariosModel->__set('nome', $nome);
        $usuariosModel->__set('senha', $senha);
        $usuariosModel->__set('status', $status);

        $usuariosDAO = new UsuariosDAO();
        if($usuariosDAO->inserir($usuariosModel)){
            header('Location:/dashboard/usuarios?success=1');
        } else {
            header('Location:/dashboard/usuarios?error=1');
        }
        
    }


    public function editar(){
        $id = $this->getParams()[0];  // Pega o primeiro parâmetro da URL
        $usuariosDAO = new UsuariosDAO();
        $usuario = $usuariosDAO->buscarPorId($id);
        
        $this->getView()->usuario = $usuario;
        $this->render('editar', '');
    }
    public function atualizar(){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $status = $_POST['status'];

        $usuariosModel = new UsuariosModel();
        $usuariosModel->__set('id', $id);
        $usuariosModel->__set('nome', $nome);
        $usuariosModel->__set('senha', $senha);
        $usuariosModel->__set('status', $status);

        $usuariosDAO = new UsuariosDAO();
        if($usuariosDAO->alterar($usuariosModel)){
            header('Location:/dashboard/usuarios?success=1');
        } else {
            header('Location:/dashboard/usuarios?error=1');
        }
    }

    public function excluir(){
        $id = $this->getParams()[0];  // Pega o primeiro parâmetro da URL
        $usuariosDAO = new UsuariosDAO();
        if($usuariosDAO->excluir($id)){
            header('Location:/dashboard/usuarios?success=1');
        } else {
            header('Location:/dashboard/usuarios?error=1');
        }
    }

    public function validaAutenticacao() {}
    
}
    ?>