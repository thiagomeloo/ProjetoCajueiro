function confirmDelete(url) {

    document.getElementById("btnConfirmDel").setAttribute("href",url);
}

function getHistorico(url) {
    if (url.length == 0) {
        document.getElementById("ulModal").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                var myObj = JSON.parse(this.responseText);
                var ulMoldal = document.getElementById("ulModal").innerHTML = "";


                if(myObj.length != 0){
                    for (var i = 0; i < myObj.length; i++){
                        if(i == 0){
                            $("#ulModal").append(
                                '<li>' +
                                '<p href="#" class="float-right"> Criação da Disciplina </p>'+
                                '<p class="container-fluid row">Nome: ' + myObj[i].nome_old + '</p>'+
                                '<p class="container-fluid row">Quantidade de Aulas: ' + myObj[i].qtd_aulas_old + '</p>'+
                                '<p class="container-fluid row">Professor: ' + myObj[i].id_professor_old.nome + '</p>'+
                                '</li>'
                            );
                        }

                        $("#ulModal").append(
                            '<li>' +
                            '<p href="#" class="float-right">' + myObj[i].data_modificacao + '</p>'+
                            '<p class="container-fluid row">Nome: ' + myObj[i].nome_new + '</p>'+
                            '<p class="container-fluid row">Quantidade de Aulas: ' + myObj[i].qtd_aulas_new + '</p>'+
                            '<p class="container-fluid row">Professor: ' + myObj[i].id_professor_new.nome + '</p>'+
                            '</li>'
                        );
                    }
                }else{
                    $("#ulModal").append(
                        '<li> Não há modificações</li>'
                    );
                }


            }
        }
        xmlhttp.open("GET", "historicoDisciplina?id="+url, true);
        xmlhttp.send();
    }
}


function newResp() {

        $("#content_resp").append(
            '            <div class="row">' +
            '                <div class="form-group col">' +
            '                    <label>Nome</label>' +
            '                    <input type="text" class="form-control" placeholder="Nome" name="nome_responsavel[]" value="" required>  ' +
            '                    <input type="number" class="d-none" placeholder="id" name="id_responsavel[]" value="" >'+
            '<input type="number" class="d-none" placeholder="id" name="id_alunos[]" value="" >'+
            '                </div>' +
            '                <div class="col">' +
            '                    <label>CPF</label>' +
            '                    <input type="text" class="form-control" placeholder="CPF" name="cpf_responsavel[]" value="" required>' +
            '                </div>' +
            '               <div class="col">' +
            '                   <label>data Nascimento</label>' +
            '                   <input type="date" class="form-control"  id="dataResp" name="data_responsavel[]" value="" required>' +
            '               </div>' +
            '<div class="p-2 btn-circle m-auto align-content-center btn  bg_color_secundary fas fa-user-minus my_FontColor float-right" onclick="delResp(this);"> </div>' +
            '            </div>'
        );



}


function delResp(e) {
    $(e).closest('.row').remove();
}