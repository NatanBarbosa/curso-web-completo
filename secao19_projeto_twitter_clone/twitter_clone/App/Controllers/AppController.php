<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {
    public function timeline(){
        $this->verificaLogin();

        //recuperação dos tweets e encaminha-los para a view timeline
        $tweet = Container::getModel('Tweet');
        $tweet->__set('id_usuario', $_SESSION['id']);

        //Variáveis de paginação
        $registros_por_pagina = 10; //limit
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $deslocamento = ($pagina - 1) * $registros_por_pagina; //offset (começar a contar a partir do primeiro) Ex.: pag 3: (3 - 1) * 10 = 20
        $total_tweets = $tweet->getTotalRegistros();
        $totalPaginas = ceil($total_tweets['total'] / $registros_por_pagina); //ex: 31 registros dividido por 10 registros por página dá 4 páginas (arredondar para cima)

        $this->view->totalPaginas = $totalPaginas;
        $this->view->pagina_ativa = $pagina;

        $this->view->tweets = $tweet->getPorPagina($registros_por_pagina, $deslocamento);

        //pegar as informações do usuário para a caixinha da esquerda
        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);

        $this->view->info_usuario = $usuario->getInfoUsuario();
        $this->view->total_tweets = $usuario->getTotalTweets();
        $this->view->total_seguindo = $usuario->getTotalSeguindo();
        $this->view->total_seguidores = $usuario->getTotalSeguidores();

        $this->render('timeline');
    }

    public function tweet(){
        $this->verificaLogin();

        $tweet = Container::getModel('Tweet');

        $tweet->__set('tweet', $_POST['tweet']);
        $tweet->__set('id_usuario', $_SESSION['id']);

        $tweet->salvar();

        header('Location: /timeline');
    }

    public function quem_seguir(){
        $this->verificaLogin();

        $pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : "";

        $usuarios = array();

        if($pesquisarPor != ''){
            $usuario = Container::getModel('Usuario');
            $usuario->__set('nome', $pesquisarPor);
            $usuario->__set('id', $_SESSION['id']);
            $usuarios = $usuario->getAll();
        }

        $this->view->usuarios = $usuarios;

        //pegar as informações do usuário para a caixinha da esquerda
        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);

        $this->view->info_usuario = $usuario->getInfoUsuario();
        $this->view->total_tweets = $usuario->getTotalTweets();
        $this->view->total_seguindo = $usuario->getTotalSeguindo();
        $this->view->total_seguidores = $usuario->getTotalSeguidores();

        $this->render('quemSeguir');
    }

    public function acao(){
        $this->verificaLogin();

        $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        $id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        $usuarioSeguidor = Container::getModel('UsuariosSeguidores');
        $usuarioSeguidor->__set('id_usuario', $_SESSION['id']);
        $usuarioSeguidor->__set('id_usuario_seguindo', $id_usuario_seguindo);

        if($acao == 'seguir'){
            $usuarioSeguidor->seguirUsuario();
        } else if($acao == 'deixar_de_seguir'){
            $usuarioSeguidor->deixarSeguirUsuario();
        }

        header('Location: /quem_seguir?pesquisarPor='.$_GET['pesquisarPor']);
    }

    public function remover_tweet(){
        $this->verificaLogin();

        $tweet = Container::getModel('Tweet');
        $tweet->__set('id', $_POST['id_tweet']);
        $tweet->removerTweet();
        header('Location: /timeline');
    }

    public function verificaLogin(){
        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' && !isset($_SESSION['nome']) || $_SESSION['nome'] == ''){
            header('Location: /?login=erro');
        }
    }
}

/*
Paginação
limit: quantos registros queremos mostrar por página
offset: Quantidade de registros que devem ser pulados na consulta
*/
?>