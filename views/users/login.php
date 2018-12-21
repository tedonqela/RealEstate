

<div id="main-content" style="margin-bottom: 169px;">
    <div style="margin: 10% 0 20% 0" class="container-fluid">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="loginform" class="form-signin">
              <fieldset>
                  <h3 style="color:dimgray; text-align: center">Kyqu tani</h3>
                  <hr class="colorgraph">
                  <div class="form-group">
                      <label for="email">E-mail</label>
                    <p>
                      <input id="email" class="form-control middle" placeholder="E-mail" name="username" type="text" required>
                    </p>
                  </div>
                  <div class="form-group">
                      <label for="password">Fjal&#235;kalimi</label>
                    <p>
                      <input id="password" class="form-control middle" placeholder="Fjal&#235;kalimi" minlength="5" name="password" type="password" value="" required>
                    </p>
                  </div>
                 
                  <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Kyqu">
                  <br>
                  <p class="text-center"><a href="<?php echo ROOT_URL; ?>users/forgot"> Keni harruar fjalëkalimin?</a></p>
                  <p class="text-center">Nuk keni llogari?<a href="<?php echo ROOT_URL; ?>users/register"> Regjistrohu tani!</a></p>

                </fieldset>
              </form>
          </div>
          </div>
      </div>
</div>
