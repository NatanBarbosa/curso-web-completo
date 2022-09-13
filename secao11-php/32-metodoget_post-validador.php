<?php
    //Esse arquivo será responsável por validar o formulário do index.php que vai enviar essas respostas para esse arquivo que atua do lado do servidor
    //Método get: envia as informações pro interpretador do php por meio  da url
    //Método get: '                    idem                   ' por meio de um anexo dos dados do formulário dentro da requisição
    
    /*print_r($_GET);

    echo '<br>';

    echo $_GET['email']; //get/post: array com indice sendo nome do form
    echo '<br>';
    echo $_GET['senha'];*/

    print_r($_POST);

    echo '<br>';

    echo $_POST['email']; 
    echo '<br>';
    echo $_POST['senha'];

    
?>