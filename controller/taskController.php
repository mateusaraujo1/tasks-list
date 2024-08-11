<?php

require "../../model/taskModel.php";
require "../../services/taskService.php";
require "../../services/connection.php";

$action = isset($_GET['action']) ? $_GET['action'] : $action;

switch ($action) {
    case 'insert':
        $task = new Task();
        $task->__set('task', $_POST['task']);

        $connection = new Connection();

        $taskService = new TaskService($connection, $task);
        $taskService->insert();

        header('Location: newTask.php?inclusion=1');

        break;

    case 'recover':
        $task = new Task();
        $connection = new Connection();

        $taskService = new TaskService($connection, $task);
        $tasks = $taskService->recover();

        break;

    case 'update':
        $task = new Task();
        $task->__set('id', $_POST['id']);
        $task->__set('task', $_POST['task']);

        $connection = new Connection();

        $taskService = new TaskService($connection, $task);
        if ($taskService->update()) {

            if (isset($_GET['pag']) && $_GET['pag'] == 'index')
                header('Location: index.php');
            else
                header('Location: allTasks.php');
        }

        break;

    case 'delete':
        $task = new Task();
        $task->__set('id', $_GET['id']);

        $connection = new Connection();

        $taskService = new TaskService($connection, $task);

        $taskService->delete();

        if (isset($_GET['pag']) && $_GET['pag'] == 'index')
            header('Location: index.php');
        else
            header('Location: allTasks.php');

        break;

    case 'markRealize':
        $task = new Task();
        $task->__set('id', $_GET['id']);
        $task->__set('id_status', 2);

        $connection = new Connection();

        $taskService = new TaskService($connection, $task);
        $taskService->markRealize();

        if (isset($_GET['pag']) && $_GET['pag'] == 'index')
            header('Location: index.php');
        else
            header('Location: allTasks.php');

        break;

    case 'recoverPending':
        $task = new Task();
        $task->__set('id_status', 1);
        $connection = new Connection();

        $taskService = new TaskService($connection, $task);
        $tasks = $taskService->recoverPending();

        break;

    default:

        break;
}
