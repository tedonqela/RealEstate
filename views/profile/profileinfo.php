<div id="vertical-form" class="form-horizontal">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center border-bottom">
                <h1 >Të dhënat e profilit</h1>
            </div>

        </div>
    </div>
</div>
<form class="cmxform" id="profile-form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" >
    <div class="container">
        <div class="row">
            <div class="col-sm-6 info-right-border">
                <h1 class="main-title">Informatat e llogarisë tuaj</h1>
                <div class="form-group">
                    <h4 style="display: inline;" for="emri">Emri:   </h4>
                    <h3 style="display: inline;"> <?= $_SESSION['user_data']['username']?></h3>
                </div>
                <div class="form-group">
                    <h4 style="display: inline;" for="emri">Email:   </h4>
                    <h3 style="display: inline;"> <?= $_SESSION['user_data']['email']?></h3>
                </div>
                <div class="form-group">
                    <label for="oldpass">Passowrd i vjetër</label>
                    <input id="oldpass" class="form-control" name="old_password" minlength="2" type="password" required>
                </div>

                <div class="form-group">
                    <label for="newpass1">Passowrd i ri</label>
                    <input id="newpass1" class="form-control" name="new_password1" minlength="2" type="password" required>
                </div>

                <div class="form-group">
                    <label for="newpass2">Passowrd i ri (Përsërite)</label>
                    <input id="newpass2" class="form-control" name="new_password2" minlength="2" type="password" required>
                </div>

            </div>

            <div class="col-sm-6">



            </div>
        </div>
    </div>
    <div id="form-submit-btn">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center btn-prim">
                    <input id="postoBtn"  type="submit" class="btn btn-primary" value="Ndrysho">
                </div>
            </div>
        </div>
    </div>
</form>








<!--
<script type="text/javascript">
	Dropzone.options.imageUpload = {
        maxFilesize:1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
</script> -->
<!--
    <script src="<?php echo ROOT_PATH;?>assets/js/dropzone.js"></script> -->
<script src="<?php echo ROOT_PATH;?>assets/js/script.js"></script>