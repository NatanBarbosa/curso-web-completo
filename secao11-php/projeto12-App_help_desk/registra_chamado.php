<?php
    session_start();

    #Criando texto apartir do array POST

    //Trabalhando na montagem do texto
    foreach($_POST as $i => $valor){
        $_POST[$i] = str_replace('#', '-', $valor);
        //substitui possiveis # por - em cada posição do $_POST
    }
    $texto = $_SESSION['id'] . '#' . implode('#', $_POST) . PHP_EOL; 
    //transformando array em texto separado por #
    //PHP_EOL -> quebra linha em um arquivo de texto
    //O id da SESSION, criado no valida login para autenticações válidas
    

    //abrindo o arquivo
    $arquivo = fopen('../../../../app_help_desk/arquivo.txt','a');
    //https://www.php.net/manual/pt_BR/function.fopen.php -> a = escrita será feita no final do arquivo

    //escrevendo o texto
    fwrite($arquivo, $texto);
    //https://www.php.net/manual/pt_BR/function.fwrite.php

    //fechando arquivo
    fclose($arquivo);

    //voltando para abertura de chamado
    header('Location: abrir_chamado.php');
?>