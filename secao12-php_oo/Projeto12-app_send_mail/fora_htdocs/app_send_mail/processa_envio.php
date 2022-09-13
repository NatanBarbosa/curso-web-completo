<?php
	//importando a biblioteca PHPMailer
	require './bibliotecas/PHPMailer/Exception.php';
	require './bibliotecas/PHPMailer/OAuth.php';
	require './bibliotecas/PHPMailer/PHPMailer.php';
	require './bibliotecas/PHPMailer/POP3.php';
	require './bibliotecas/PHPMailer/SMTP.php';

	//definindo os namespaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;


	//Criando abstração de um objeto de mensagem
	class Mensagem{
		#atributos
		private $para = null;
		private $assunto = null;
		private $mensagem = null;
		public $status = ['codigo_status' => null, 'descricao_status' => ''];

		#métodos mágicas
		public function __get($attr){
			return $this->$attr;
		}

		public function __set($attr, $valor){
			$this->$attr = $valor;
		}

		#método para validação
		public function mensagemValida(){
			if( empty($this->para) || empty($this->assunto) || empty($this->mensagem) ){
				return false;
			}

			if( !(strstr($this->para, '@') && (strstr($this->para, '.com') || strstr($this->para, '.org') || strstr($this->para, '.gov'))) ){
				return false;
			}

			return true;
		}
	}

	//instanciando objeto e deifnindo seus atributos
	$mensagem = new Mensagem();

	$mensagem->__set('para', $_POST['para']);
	$mensagem->__set('assunto', $_POST['assunto']);
	$mensagem->__set('mensagem', $_POST['mensagem']);

	if(!$mensagem->mensagemValida()){
		echo 'mensagem não é valida';
		#die(); //mata o processamento do script
		header('Location: index.php?erro');
	} 

	//nesse caso os scripts importantes de uma biblioteca estavam na pasta src (renomeada para PHP mailer).

	//Bloco de código da biblioteca responsável pelo envio
	//linhas de código trocadas terão um /**/
	//linhas de código não necessárias terão um #

	$mail = new PHPMailer(true);
	try {
	    //Server settings
	    /**/$mail->SMTPDebug = false;                         // Desabilitar todo log que aparece na tela
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    /**/$mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    /**/$mail->Username = 'testewebphp81@gmail.com';      // SMTP username
	    /**/$mail->Password = 'minecraft@123';                // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    /**/$mail->setFrom('testewebphp81@gmail.com', 'Servicos Send-Mail'); //Remetente
	    /**/$mail->addAddress($mensagem->__get('para')); // Destinatário
	    #$mail->addReplyTo('info@example.com', 'Information'); //quem vai receber a resposta
	    #$mail->addCC('cc@example.com'); -> destinatários de cópia
	    #$mail->addBCC('bcc@example.com'); -> idem

	    //Attachments
	    #$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $mensagem->__get('assunto');
	    $mail->Body    = $mensagem->__get('mensagem'); //pode ter tags html
	    $mail->AltBody = 'É necessário ter um client que suporte HTML para ter acesso ao conteúdo dessa mensagem'; 
	    //aqui é o mesmo do de cima, mas sem formataçõesmensagem caso o servidor SMTP não tenha acesso a recursos html
	    $mail->send();

	    //feedback sucesso
	    $mensagem->status['codigo_status'] = true;
	    $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso';

	} catch (Exception $e) {
		//feedback erro
	    $mensagem->status['codigo_status'] = false;
	    $mensagem->status['descricao_status'] = 'Não foi possível enviar este e-mail. Por favor tente novamente mais tarde <br> Detalhes do erro: ' . $mail->ErrorInfo;

	    //alguma lógica que armazene o erro para posterior analise do programador...
	}


	//Servidor SMTP -> GMAIL, usado pelo phpmailer. definições encontradas em https://support.google.com/a/answer/176600?hl=pt-BR (requisitos)
	//para ativar o envio de e-mail de terceiros(no caso esse app) tem q ir na conta que enviará os emails e habilitar a opção de "Acesso a apps menos seguras"

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    	<title>Enviando email</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="py-3 text-center">
			<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
			<h2>Send Mail</h2>
			<p class="lead">Seu app de envio de e-mails particular!</p>
		</div>

		<div class="row">
			<div class="col-12 text-center">
				<? if($mensagem->status['codigo_status']){ ?>
						<!--feedback sucesso-->
						<div class="container">
							<h1 class="display-4 text-success">Sucesso</h1>
							<p><?= $mensagem->status['descricao_status'] ?></p>
							<a href="index.php" class="btn btn-primary btn-lg mb-5"> Enviar outro e-mail </a>
						</div>
				<?	} ?>

				<? if(!$mensagem->status['codigo_status']){ ?>
						<!--feedback erro-->
						<div class="container">
							<h1 class="display-4 text-danger">Ops!</h1>
							<p><?= $mensagem->status['descricao_status'] ?></p>
							<a href="index.php" class="btn btn-danger btn-lg mb-5"> voltar e corrigir </a>
						</div>
				<?	} ?>
				
			</div>
		</div>	
	</div>

</body>
</html>
