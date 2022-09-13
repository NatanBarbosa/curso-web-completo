<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Curso PHP</title>
	</head>
	<body> 
		<?php
			
			#e-comerce
			//Se o usuário possui o cartão da loja e se a compra é superior à R$400 -> desconto no frete

			$usuario_possui_cartao_loja = true;
			$valor_compra = 50;
			$valor_frete = 50;
			$recebeu_desconto_frete = true;

			//----nota: variaveis booblenas não precisam ser comparadas com ==true ou ==false: if($recebeu_desconto_frete == false) -> if($recebeu_desconto_frete)----

			if($usuario_possui_cartao_loja && $valor_compra >= 400){
				$valor_frete = 0;
			} else if($usuario_possui_cartao_loja && $valor_compra >= 300){
				$valor_frete = 10;
			} else if($usuario_possui_cartao_loja && $valor_compra >= 100){
				$valor_frete = 25;
			} else {
				$recebeu_desconto_frete = false;
			}
		?>

		<h1>Detalhes do pedido</h1>
		<p>Possui cartão da loja? 

			<?= $usuario_possui_cartao_loja ? 'SIM' : 'NÃO'; ?>
			<!--
				// <condicao> ? true : false
				//$usuario_possui_cartao_loja == true?

				 Se usar esse bagui de print nem precisa dar echo 'sim' ou echo 'nao'
			-->
		</p>
		<p>Valor da compra: <?= $valor_compra ?> </p>

		<p>Receberá desconto no frete?
			<?php

				//Atribuindo valor de operador ternário à variáveis

				$resposta = $recebeu_desconto_frete ? 'SIM' : 'NÃO';
				echo $resposta;
			?>
		</p>
		<p>Valor final do frete: <?= $valor_frete ?> </p>
		

	</body>
</html>