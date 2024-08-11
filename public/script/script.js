function editar(page, id, txt_tarefa) {

    // criar um form de edição
    let form = document.createElement('form');
    form.action = page + '.php?pag='+ page +'&action=update';
    form.method = 'post';
    form.className = 'row';

    // criar um input pra entrada do texto
    let inputTarefa = document.createElement('input');
    inputTarefa.type = 'text'; 
    inputTarefa.name = 'task'; 
    inputTarefa.className = 'col-9 m-0 form-control'; 
    inputTarefa.value = txt_tarefa;

    // adicionar um input hidden para guardar o id da tarefa
    let inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;

    // criar um button pra envio do form
    let button = document.createElement('button');
    button.type = 'submit';
    button.className = 'col-3 btn btn-info';
    button.innerHTML = 'Atualizar';

    //incluir inputTarefa no form
    form.appendChild(inputTarefa);

    form.appendChild(inputId);

    form.appendChild(button);

    // console.log(form);

    // selecionar a div tarefa
    let tarefa = document.getElementById('tarefa_'+id);

    // limpar o texto da tarefa para inclusão do form

    tarefa.innerHTML = '';

    //incluir form na página

    tarefa.insertBefore(form, tarefa[0]);
}

function remover(page, id) {
    location.href = page + '.php?pag=' + page + '&action=delete&id=' + id;
}

function marcarRealizada(page, id) {
    location.href = page + '.php?pag=' + page + '&action=markRealize&id=' + id;

}