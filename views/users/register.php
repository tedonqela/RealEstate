<div id="main-content">
        <div style="margin: 10% 0 10% 0" class="container-fluid">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <form id="reg-form" class="register-form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                  <fieldset>
                      <h3 style="color:dimgray; text-align: center">Regjistrohu dhe krijo Real Estate</h3>
                      <hr class="colorgraph">
                      <div class="form-group">
                          <label for="titulli">Emri</label>
                        <p>
                          <input id="titulli" class="form-control" type="text" placeholder="Emri" name="username" type="text" required>
                        </p>
                      </div>
                      <div class="form-group">
                          <label for="email">E-mail</label>
                        <p>
                          <input id="email" class="form-control" type="email" placeholder="E-mail" name="email" required>
                        </p>
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                        <p>
                          <input id="password" class="form-control" type="password" minlength="5"  placeholder="Fjal&#235;kalimi" name="password" value="" required>
                        </p>
                      </div>
                      <div class="form-group">
                          <label for="passwordconf">Konfirmo fjal&#235;kalimin</label>
                        <p>
                          <input id="passwordconf" class="form-control" type="password" minlength="5" placeholder="Konfirmo fjal&#235;kalimin" equalTo="#password" name="password_confirm"  value="" required>
                        </p>
                      </div>
                    
                      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Regjistrohu">
                      <!-- <p class="text-center" style="margin-top:10px;">OSE</p> -->

                      <!--Google +-->
                      <!-- <button type="button" class="btn btn-gplus google-btn"><i class="fa fa-google-plus left"></i> Google +</button> -->

                      <br>
                      <p class="text-center"><a href="<?php echo ROOT_URL; ?>users/login">Kyqu</a> n&#235;se keni llogari</p>
                    </fieldset>
                  </form>
              </div>
              </div>
          </div>
    </div>
