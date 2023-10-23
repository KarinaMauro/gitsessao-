<?php

class UsuarioModel {
    private $pdo;
    public function __construct($pdo) {
        $this -> pdo = $pdo;
    }

    //Método para criar o Usuario
    public function criarUsuario($usuario, $senha, $email) {
        $sql = "INSERT INTO usuario (usuario, senha, email)
        VALUES (?, ?)";
        $stmt = $this -> pdo ->prepare($sql);
        $stmt->execute([$usuario, $senha, $email]);
    }

    //Model para a listar usuario
    public function listarUsuarios() {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->pdo->query($sql);
        return $stmt->FetchAll(PDO::FETCH_ASSOC);
    }

}