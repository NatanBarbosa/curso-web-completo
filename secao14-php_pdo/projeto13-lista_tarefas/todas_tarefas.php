<?php
    //usar o bloco de códigos de recuperar(2º if) do tarefa_controller.php
    $acao = 'recuperar';
    require "tarefa_controller/tarefa_controller.php";
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <script src="script.js"></script>

    </head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<? foreach ($listaTarefas as $i => $tarefa) { ?>

                                <div class="row mb-3 d-flex align-items-center tarefa">
                                    <div class="col-sm-9" id="tarefa_<?=$tarefa->id?>"> <!-- Ids dinâmicos -->
                                        <?= $tarefa->tarefa ?> <small> (<?= $tarefa->status ?>) </small>
                                    </div>

									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>, 'todas_tarefas')"></i>

                                        <? if($tarefa->status == 'pendente'){ ?>
										    <i class="fas fa-edit fa-lg text-info" onclick="editar(<?=$tarefa->id?> , '<?=$tarefa->tarefa?>', 'todas_tarefas')"></i> <!--encaminhando o id da tarefa-->
										    <i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?=$tarefa->id?>, 'todas_tarefas')"></i>
									    <? } ?>

                                    </div>
								</div>

                                <? } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>