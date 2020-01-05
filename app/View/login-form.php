
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>S W E - Sistema Web Escola</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body>

    <div class="container-fluid main-panel">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="login-panel" >
                    <div class="login-user-avatar"></div>
                    <div class="login-form">
                        <form action="/login" method="post">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control text-center" type="email" id="login-username" name="email" required="" placeholder="E-mail"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group"><input class="form-control text-center" type="password" name="senha" required="" placeholder="Senha"></div>
                            </div>
                            <div class="form-group"><button class="btn bg_color_primary btn-block my_FontColor" type="submit">ENTRAR</button></div>
                        </form>
                    </div>

                    <div class="login-response has-error"></div>
                    <?php use Ifnc\Tads\Helper\Flash; Flash::showAll(); ?>
            </div>
                <div class="login-panel ladoD float-right text-center bg_color_primary" style="">
                    <h5 class="my_FontColor">Outros Serviços</h5>
                    <hr>
                    <div class="margin-center">
                        <a class="btn my_FontColor" href=""> Esqueci minha senha </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>

</body>

</html>