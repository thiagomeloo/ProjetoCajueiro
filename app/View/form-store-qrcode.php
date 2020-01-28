<div class="container-fluid">
    <form id="form" method="post" action="/storeQrCode">
        <hr>
        <h5 class="font-weight-bold">Dados Qr Code</h5>
        <hr class="m-auto">
        <div class="form-group">

        </div>
        <div class="form-row">
            <div class="form-group col">
                <label>Texto</label>
                <textarea class="form-control" name="texto"><?=isset($qrCodeAtt) ? $qrCodeAtt->texto : ''?></textarea>
            </div>
        </div>

        <input type="number" class="d-none" name="id" value="<?=isset($qrCodeAtt) ? $qrCodeAtt->id : ''?>" >


        <button type="submit" class="btn bg_color_secundary btn-lg fas fa-plus float-right my_FontColor" data-toggle-form-edit="#form">
            <?=$name_btn;?>
        </button>
    </form>
</div>