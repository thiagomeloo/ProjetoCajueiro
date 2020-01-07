function confirmDelete(url) {

    document.getElementById("btnConfirmDel").setAttribute("href",url);
}

function geraQrCode(texto) {
    if (texto.length === 0) {
        document.getElementById("content_modalqr").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            if (this.readyState === 4 && this.status === 200) {


                var Moldal = document.getElementById("content_modalqr").innerHTML = "";
                    $("#content_modalqr").append(
                        '<img src="'+this.responseURL+'" class="img-thumbnail img-fluid">'
                    );

            }
        }
        xmlhttp.open("GET", "geraQrCode?texto="+texto, true);
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