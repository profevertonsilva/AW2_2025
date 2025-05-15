<?php

namespace App\Controller;

use FW\Controller\Action;
use App\DAO\UsuariosDAO;
use App\Model\UsuariosModel;


class UsuariosController extends Action{

    public function index(){
        $this->render('index', '');
    }

    public function usuarios(){

        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->listar(); 
        $this->getView()->usuarios = $usuarios;


        $this->render('usuarios', '');
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

    public function validaAutenticacao() {}
    
}
    ?>