<?php

require_once __DIR__ . "/../Config/Banco.php";

class Torneio {
    public static function listarPorJogo($idJogo) {
        $sql = "SELECT * FROM torneios WHERE id_jogo = ? ORDER BY id DESC";
        $consulta = Banco::getConn()->prepare($sql);
        $consulta->execute([$idJogo]);
        $torneios = [];

        while ($torneio = $consulta->fetchObject()) {
            $torneios[] = $torneio;
        }

        return $torneios;
    }

    public static function criar($idJogo, $idUsuario, $nome, $descricao, $premiacao) {
        $sql = "INSERT INTO torneios (id_jogo, id_usuario, nome, descricao, premiacao)
                VALUES (?, ?, ?, ?, ?)";
        $consulta = Banco::getConn()->prepare($sql);
        return $consulta->execute([$idJogo, $idUsuario, $nome, $descricao, $premiacao]);
    }
}
