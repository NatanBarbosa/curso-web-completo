<?php

    session_start();

    #remover indices do array de sessão
    //unset($_SESSION['indice'])
    //serve pra remover indices de qualquer array
    //remove o indice apenas se existir

    #destruir a variável de sessão
    session_destroy();
    //destrói todos os índices da superglobal session
    //ele só destrói a sessão dps da proxima requisição, por isso é recomendavel forçar um redirecionamento

    header('Location: index.php');
?>