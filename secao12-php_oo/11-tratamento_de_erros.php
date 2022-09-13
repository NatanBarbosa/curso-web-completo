<?php
	//mysql_query($sql); -> se esse erro estivesse fora do try a aplicação iria morrer nessa linha

	try{
		//encapsula o conteudo sucetivel a algum erro (chamada de "exceção")
		echo '<h3>*** Try ***</h3>';

		//Instrução que vai dar erro
		$sql = 'Select * from clientes';
		//mysql_query($sql); => DESCOMENTADO = ERRO | COMENTADO = EXCEÇÃO
		//se esse erro não acontecesse ele pula para o finally

		if(!file_exists('arquivo.php')){
			//retorna true ou false. verifica se um determinado arquivo existe. Nesse caso o contrário

			//Criando uma exceção. throw + instanciando um objeto de erro com uma mensagem
			throw new Exception('O arquivo em questão deveria estar disponível às ' . date('d/m/Y → H:i:s ') . ' horas mas não estava. Vamos seguir mesmo assim');
			//essa exception vai ser jogada lá pro catch e trata exceptions
			//throw new Error(...) nesse caso estamos lançando um erro para o catch que trata erros
		}

	} catch(Error $e) { //recebe por parâmetro essa palavra reservada uma variável que vai receber a descrição do erro
		echo '<h3>*** Catch do Erro ***</h3>';
		echo '<p style="color: red;">' . $e . '</p>';

		//É interessante armazenar esse erro no banco de dados, para que posteriormente ele possa ser tratado e corrigido pela equipe 
	} catch (Exception $e){
		echo '<h3>*** Catch da Excessão ***</h3>';
		echo '<p style="color: red;">' . $e . '</p>'; //tratando e mostrando essa exceção
	} finally {
		//bloco que será execultado   após a tentativa de alguma coisa (sempre tem q terminar com esse bloco)
		//O finally é opcional quando se há o catch
		echo '<h3>*** Finally ***</h3>';
	}

/*
É mais comum o programador lanças excessões
enquanto o php lança erros
*/