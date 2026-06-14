<?php

abstract class Banco {
    private static $conn;

    public static function getConn(): PDO {
        if (!isset(self::$conn)) {
            $local = "localhost";
            $usuario = "root";
            $senha = "";
            $banco = "seucamp";

            try {
                self::$conn = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
            } catch (Throwable $erro) {
                die("Erro ao conectar com o banco de dados.");
            }
        }

        return self::$conn;
    }
}
