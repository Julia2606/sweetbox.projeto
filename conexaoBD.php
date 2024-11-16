<?php

class ConexaoBD{

    public static function conectar():PDO{
        $conexao = new PDO("mysql:host=localhost;dbname=sweetbox","root","Batman");
        return $conexao;
    }
}
ConexaoBD::conectar(); 