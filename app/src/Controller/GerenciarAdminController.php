<?php

namespace Ifnc\Tads\Controller;


use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Render;
use Ifnc\Tads\Helper\Transaction;

class GerenciarAdminController implements IController

{

    public function request(): void
    {
        Transaction::open();
        echo Render::html(
            [

                "cabecalho.php",
                "contentGerenciarUsuario.php",
                "rodape.php"

            ],
            [
                "usuario" => Usuario::download(),
                "nomePag" => "Gerenciar Admin",
                "urlCadastrar" => "/cadastrarAdmin",
                "entidade" => "Administradores",
                "usuariosArray"=> Usuario::all("tipo_user = 1"),
                "itens" => $_SESSION["itensMenu"],
                "qtdAtivo" => Usuario::count("tipo_user = 1 and status_user = 1"),
                "qtdInativo" => Usuario::count("tipo_user = 1 and status_user != 1"),
                "qtdTotal" => Usuario::count()
            ]);
        Transaction::close();
    }
}