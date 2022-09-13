<? require_once("validador_acesso.php") ?>

<html>

<head>
	<meta charset="utf-8" />
	<title>App Help Desk</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style>
		.card-abrir-chamado {
			padding: 30px 0 0 0;
			width: 100%;
			margin: 0 auto;
		}
	</style>
</head>

<body>

	<nav class="navbar navbar-dark bg-dark">
		<div class="container">	
			<a class="navbar-brand" href="#">
				<img src="imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				App Help Desk
			</a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="logoff.php" class="nav-link btn btn-danger px-4 text-light">Sair</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">

			<div class="card-abrir-chamado">
				<div class="card">
					<div class="card-header">
						Abertura de chamado
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">

								<form method="POST" action="registra_chamado.php" id="formChamado">
									<div class="form-group">
										<label>Título</label>
										<input type="text" name="titulo" class="form-control" placeholder="Título" id="titulo">
									</div>

									<div class="form-group">
										<label>Categoria</label>
										<select name="categoria" class="form-control" id="categoria" >
											<option>Criação Usuário</option>
											<option>Impressora</option>
											<option>Hardware</option>
											<option>Software</option>
											<option>Rede</option>
										</select>
									</div>

									<div class="form-group">
										<label>Descrição</label>
										<input type="text" name="descricao" class="form-control" id="descricao">
									</div>

									<div class="row mt-5">
										<div class="col-6">
											<a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
										</div>

										<div class="col-6">
											<button onclick="verificaDados()" class="btn btn-lg btn-info btn-block" type="button">Abrir</button>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			function verificaDados(){
				let titulo = document.getElementById('titulo').value
				let categoria = document.getElementById('categoria').value
				let descricao = document.getElementById('descricao').value

				if(titulo == '' || categoria == '' || descricao == '' ){
					alert('Preencha todos os dados')
				} else{
					alert('Chamado registrado')
					document.getElementById('formChamado').submit()
				}
			}
		</script>
</body>

</html>