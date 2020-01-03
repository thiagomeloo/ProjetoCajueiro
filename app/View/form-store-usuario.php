<div class="container-fluid">
    <form id="form" method="post" action="/storeUsuario?type=<?= isset($type) && $type == 1? $type : ''?>">
        <hr>
        <h5 class="font-weight-bold">Dados Pessoais</h5>
        <hr class="m-auto">
        <div class="form-group">

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nome</label>
                <input type="text" class="form-control" placeholder="Nome Completo" name="nome" required="" value="<?=isset($usuarioAtt) ? $usuarioAtt->nome : ''?>" >
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" required="" value="<?=isset($usuarioAtt) ? $usuarioAtt->email : ''?>">
            </div>
        </div>

        <input type="number" class="d-none" name="tipo_user" value="<?=isset($usuarioAtt) ? $usuarioAtt->tipo_user : $tpUser?>">
        <input type="number" class="d-none" name="id" value="<?=isset($usuarioAtt) ? $usuarioAtt->id : ''?>" >


        <button type="submit" class="btn bg_color_secundary btn-lg fas fa-user-plus float-right my_FontColor" data-toggle-form-edit="#form">
            <?=$name_btn;?>
        </button>
    </form>
</div>