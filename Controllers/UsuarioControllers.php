<?php
require_once 'Models/UsuarioModel.php';

class usuarioController{
    private $usuarioModel;

    public function __construct($pdo){
        $this->usuarioModel = new UsuarioModel($pdo);
    }

    public function criarUsuario($usuario, $senha, $email) {
    $this->usuarioModel->criarUsuario($usuario, $senha, $email);
    }

    public function listarUsuarios() {
        return $this->usuarioModel->listarUsuarios();
    }

    public function exibirListaUsuarios() {
    $usuarios = $this -> usuarioModel->listarUsuarios();
    include 'views/usuarios/lista.php';
    }

}