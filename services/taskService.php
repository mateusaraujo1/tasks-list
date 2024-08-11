<?php 

class TaskService {

    private $connection;
    private $task;

    public function __construct(Connection $connection, Task $task) {
        $this->connection = $connection->connect();
        $this->task = $task;
    }

    // inserir tarefa
    public function insert() {
        $query = 'insert into tb_tasks(task) values (:task)';

        // tratamento para evitar sql injection
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':task', $this->task->__get('task'));
        $stmt->execute();
    }

    // recuperar tarefas
    public function recover() {

        $query = '
            select
                t.id, s.status, t.task 
            from 
                tb_tasks as t
                left join tb_status as s on (t.id_status = s.id)
        ';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // atualizar tarefa
    public function update() {

        $query = '
            update 
                tb_tasks
            set
                task = :task 
            where
                id = :id
        ';

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':task', $this->task->__get('task'));
        $stmt->bindValue(':id', $this->task->__get('id'));

        return $stmt->execute();

    }

    // excluir tarefa
    public function delete() {
        $query = 'delete from tb_tasks where id = :id';
        
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $this->task->__get('id'));
        $stmt->execute();
    }

    // marcar tarefa como realizada
    public function markRealize() {

        $query = '
            update 
                tb_tasks
            set
                id_status = :id_status 
            where
                id = :id
        ';

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id_status', $this->task->__get('id_status'));
        $stmt->bindValue(':id', $this->task->__get('id'));

        return $stmt->execute();

    }

    // recuperar tarefas pendentes
    public function recoverPending(){
        
        $query = '
            select
                t.id, s.status, t.task 
            from 
                tb_tasks as t
                left join tb_status as s on (t.id_status = s.id)
            where 
                t.id_status = :id_status
        ';

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id_status', $this->task->__get('id_status'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    
}

?>