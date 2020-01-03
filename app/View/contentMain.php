<div class="container-fluid">
    <hr>
    <div class="container row">
        <div class="col-auto d-flex justify-content-center">
            <img src="assets/img/user-icon.jpg" name="aboutme" class="maxTam rounded-circle img-profile mx-auto">
        </div>
        <div class="col-auto mt-3">
            <a class="btn btn-circle bg_color_btn float-right" href="\editarUsuario?id=<?=$usuario->id?>&type=1">
                <i class="btn fas fa-user-edit fa-1x my_FontColor"></i>
            </a>
            <h4 class="row"><?=$usuario->nome?></h4>
            <label class="row">E-mail: <?=$usuario->email?></label>
        </div>

    </div>
    <hr>
</div>