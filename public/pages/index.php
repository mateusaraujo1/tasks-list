<?php

$action = 'recoverPending';

require '../../controller/taskController.php';

?>

<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Lista Tarefas</title>

	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				App Lista Tarefas
			</a>
		</div>
	</nav>

	<?php

	if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) {
	?>

		<div class="bg-success pt-2 text-white d-flex justify-content-center">
			<h5>Tarefa inserida com sucesso!</h5>
		</div>

	<?php } ?>

	<div class="container app">
		<div class="row">
			<div class="col-md-3 menu">
				<ul class="list-group">
					<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
					<li class="list-group-item"><a href="newTask.php">Nova tarefa</a></li>
					<li class="list-group-item"><a href="allTasks.php">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Tarefas pendentes</h4>
							<hr />

							<?php foreach ($tasks as $id => $task) { ?>

								<div class="row mb-3 d-flex align-items-center task">

									<div class="col-sm-9" id="tarefa_<?= $task->id ?>">
										<?= $task->task; ?>
									</div>

									<div class="col-sm-3 mt-2 d-flex justify-content-between">

										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover('index', <?= $task->id ?>)"></i>
										<i class="fas fa-edit fa-lg text-info" onclick="editar('index', <?= $task->id ?>, '<?= $task->task ?>')"></i>
										<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada('index', <?= $task->id ?>)"></i>

									</div>

								</div>

							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="../script/script.js"></script>
	
</body>

</html>