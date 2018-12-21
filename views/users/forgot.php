

<div id="main-content" style="margin-bottom: 169px;">
    <div style="margin: 10% 0 20% 0" class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="forgot_from">
                    <fieldset>
                        <h3 style="color:dimgray; text-align: center">Rikthe fjalëkalimin</h3>
                        <hr class="colorgraph">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <p>
                                <input id="email" class="form-control middle" placeholder="E-mail" name="email" type="email" required>
                            </p>
                        </div>
                        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Rikthe">
                        <br>
                        <p class="text-center"><a href="<?php echo ROOT_URL; ?>users/login"><<<< Kthehu mbrapa</a></p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
