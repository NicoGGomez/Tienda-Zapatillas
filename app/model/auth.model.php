<?php 

class authModel {
    private $db;

    function __construct(){
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=zapas;charset=utf8', 'root', '');
    }

    // obtener el usuario por el nombre
    function getUserByName($username){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre = ?');
        $query->execute([$username]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    // registrar nuevo usuario
    function insertarUsuario($nombre, $password, $mail, $img){
        $query = $this->db->prepare('INSERT INTO usuario (nombre, mail, contraseña, imagen_usuario) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $mail, $password, $img]);

        return $this->db->lastInsertId();
    }

    function devolverMail($userId){
        $query = $this->db->prepare('SELECT mail FROM usuario WHERE id_usuario = ?');
        $query->execute([$userId]);

        return $query->fetchColumn(); // Retorna solo el email
    }

}