<?php

namespace App\DAO;

use App\DAO;
use App\Model\UsuariosModel;
use FW\Controller\FuncoesGlobais;


class UsuariosDAO extends DAO{


    public function inserir($obj){
        $sql = "INSERT INTO usuarios (
                    nome,
                    senha,
                    status
                ) VALUES (
                    :nome,
                    :senha,
                    :status
                )";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->bindValue(':nome', $obj->__get('nome'));
        $stmt->bindValue(':senha', $obj->__get('senha'));
        $stmt->bindValue(':status', $obj->__get('status'));
        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function excluir($obj){}
    public function alterar($obj){}
    public function buscarPorId($obj){}
    public function listar(){
        try{
            $usuarios = array();
            $sql = "SELECT 
                            *
                        FROM 
                            usuarios 
                        
                    ";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach($result as $row){
                $usuariosModel = new UsuariosModel();
                
                
                $usuariosModel->__set('id', $row['id']);
                $usuariosModel->__set('nome', $row['nome']);
                $usuariosModel->__set('senha', $row['senha']);
                $usuariosModel->__set('status', $row['status']);
                array_push($usuarios, $usuariosModel);
            }
            return $usuarios;
        } catch(\PDOException $ex){
            header('Location:/error103');
            die();
        }
    }

}