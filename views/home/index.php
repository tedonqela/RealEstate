<section id="home">
      <div id="home-cover">
        <div id="home-content-box">
          <div id="home-content-box-inner">
            <div class="home-heanding">
              <h1>Gjej&#235; sht&#235;pin&#235; e duhur p&#235;r ju</h1>
              <p>Apartamente-Shtepi-Toka</p>
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
              <a type="button" href="<?php echo ROOT_PATH;?>shares/add" id="sign-in-btn" class="btn btn-primary sign-in">Posto Patundshm&#235;ri</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
</section>


<!-- begin:search -->
<div class="the-search">
    <div class="container">
        <div class="row">
<!--            action="home/result/" method="GET"-->
            <form  >
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="form-group">
                        <label>Lokacioni</label>
                        <select class="form-control" name="city">
                            <option selected >--Selecte</option>
                            <option>Artane</option>
                            <option>Viti</option>
                            <option>Ferizaj</option>
                            <option>Drenas</option>
                        </select>
                    </div>
                </div>
                <!-- break -->
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="form-group">
                        <label>Statusi</label>
                        <select class="form-control" name="status">
                            <option selected>--Selecte</option>
                            <option>Per Shitje</option>
                            <option>Per Blerje</option>
                            <option>Me Qera</option>
                        </select>
                    </div>
                </div>
                <!-- break -->
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="form-group">
                        <label>Tipi</label>
                        <select class="form-control" name="type">
                            <option selected >--Selecte</option>
                            <option>Ara dhe Ferma</option>
                            <option>Banesa</option>
                            <option>Dhoma</option>
                            <option>Objekte Afariste</option>
                            <option>Shtepi/Villa</option>
                            <option>Zyre</option>
                        </select>
                    </div>
                </div>
<!--                <div class="col-md-2 col-sm-3 col-xs-6">-->
<!--                    <div class="form-group">-->
<!--                        <label>Dhoma</label>-->
<!--                        <select class="form-control" name="room">-->
<!--                            <option selected>--Selecte</option>-->
<!--                            <option>1</option>-->
<!--                            <option>2</option>-->
<!--                            <option>3</option>-->
<!--                            <option>4</option>-->
<!--                            <option>5</option>-->
<!--                            <option>6</option>-->
<!--                            <option>7</option>-->
<!--                            <option>8</option>-->
<!--                            <option>9</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- break -->
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="form-group">
                        <label>Qmimi me i ulet</label>
                        <select class="form-control" name="price">
                            <option selected>--Selecte</option>
                            <option>360.00</option>
                            <option>600.00</option>
                            <option>124153.00</option>
                            <option>12342.00</option>
                            <option>26000.00</option>
                            <option>26000.00</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
<!--                    <div class="form-group">-->
<!--                        <label>Qmimi me i lart&#235;</label>-->
<!--                        <select class="form-control">-->
<!--                            <option selected>--Selecte</option>-->
<!--                            <option>360.00</option>-->
<!--                            <option>600.00</option>-->
<!--                            <option>124153.00</option>-->
<!--                            <option>12342.00</option>-->
<!--                            <option>26000.00</option>-->
<!--                            <option>26000.00</option>-->
<!--                        </select>-->
<!--                    </div>-->
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="submit" name="submit" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end:search -->













<!--

 <div class="the-search">
 <div class="container">
   <div class="row">
     <form action="<?php echo ROOT_URL;?>home/result" method="POST">
         <input type="text" name="search" placeholder="Kerko">
         <input type="submit" name="submit">
     </form>
   </div>
 </div>
</div>
    end:search -->

    <!-- end:Latest Real Estate -->
  <!-- begin:content -->
    <div id="content">
      <div class="container">
        <!-- begin:latest -->
        <div class="row">
          <div class="col-md-12">
            <div class="heading-title">
              <h2>Real Estate e fundit</h2>
            </div>
          </div>
        </div>

        <div class="row">
        <?php 
        foreach($viewmodel as $item) : ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="property-container">
                <div class="property-one">
              
                  <div class="property-image">
<!--                  --><?php
//                        if($item['is_sold'] == 'PO'){
//                          echo '<h1 id="is_sold"style="position: absolute;">SHITUR</h1>';
//                        }else{
//                          echo '';
//                        }
//                        ?>
                    <img src="<?php echo ROOT_PATH;?>assets/uploads/<?php echo $item['Img_Path']; ?>" alt="mikha real estate theme">
                    <div class="property-price">
                      <h4><?php echo $item['Type_Name']; ?></h4>
                      <span><?php echo $item['Pro_Price']; ?> €</span>
                    </div>
                    <div class="property-status">
                      <span><?php echo $item['Sts_Name']; ?></span>
                    </div>
                  </div>
                
                  <div class="property-content">
                    <h3 style="white-space: nowrap;width: 100%; overflow: hidden;text-overflow: ellipsis;">
                      <a href="<?php echo ROOT_PATH;?>shares/show/<?php echo $item['Pro_ID']; ?>"><?php echo $item['Pro_Title']; ?></a>
                      <small><?php echo $item['City_Name']; ?>, <?php echo $item['Sta_Name']; ?></small>
                    </h3>
                      <p style="white-space: nowrap;width: 100%; overflow: hidden;text-overflow: ellipsis;"><?php echo $item['Pro_Description']; ?></p>
                  </div>
                  <div class="property-features">
                    <span><i class="fa fa-home"></i> <?php echo $item['Pro_Surface']; ?> m<sup>2</sup></span>
<!--                    <span style="font-style: bold;"><i class="fa fa-hdd-o"></i> --><?php //echo $item['badroom']; ?><!-- Dhoma</span>-->
                    <span><i class="fa fa-male"></i> 2 Bath</span>
                  </div>
              </div>
            </div>
        </div>
        <?php endforeach; ?>
      </div> 
    <!-- Ends: Latest Real Estate -->




    <!-- begin:for-sale -->
        <div class="row">
          <div class="col-md-12">
            <div class="heading-title">
              <h2>Real Estate P&#235;r Shitje</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php 
              $latestRealestate = new HomeModel();
              $row = $latestRealestate->sales();
              foreach($row as $item) : ?>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="property-container">
              <div class="property-image">
                <img src="<?php echo ROOT_PATH;?>assets/uploads/<?php echo $item['Img_Path']; ?>" alt="real estate per shitje">
                <div class="property-price">
                  <h4><?php echo $item['Type_Name']; ?></h4>
                  <span><?php echo $item['Pro_Price']; ?></span>
                </div>
                <div class="property-status">
                  <span><?php echo $item['Sts_Name']; ?></span>
                </div>
              </div>
              
                <div class="property-content">
                  <h3 style="white-space: nowrap;width: 100%; overflow: hidden;text-overflow: ellipsis;"><a href="<?php echo ROOT_PATH;?>shares/show/<?php echo $item['Img_ID']; ?>"><?php echo $item['Pro_Title']; ?></a> <small><?php echo $item['City_Name']; ?>, <?php echo $item['Sta_Name']; ?></small></h3>
                  <p style="white-space: nowrap;width: 100%; overflow: hidden;text-overflow: ellipsis;"><?php echo $item['Pro_Description']; ?></p>
                </div>
                <div class="property-features">
                  <span><i class="fa fa-home"></i> <?php echo $item['Pro_Surface']; ?> m<sup>2</sup></span>
<!--                  <span><i class="fa fa-hdd-o"></i> --><?php //echo $item['badroom']; ?><!-- Bed</span>-->
                  <span><i class="fa fa-male"></i> 2 Bath</span>
                  <span><i class="fa fa-car"></i> 2 Garages</span>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
<!--        <!-- end:for-sale -->

    <!-- begin:for-sale -->
    <div class="row">
      <div class="col-md-12">
        <div class="heading-title">
          <h2>Real Estate Me qera</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      $row = $latestRealestate->rents();
      foreach($row as $item) : ?>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="property-container">
          <div class="property-image">
            <img src="<?php echo ROOT_PATH;?>assets/uploads/<?php echo $item['Img_Path']; ?>" alt="real estate per shitje">
            <div class="property-price">
              <h4><?php echo $item['Type_Name']; ?></h4>
              <span><?php echo $item['Pro_Price']; ?></span>
            </div>
            <div class="property-status">
              <span><?php echo $item['Sts_Name']; ?></span>
            </div>
          </div>
          
            <div class="property-content">
              <h3 style="white-space: nowrap;width: 100%; overflow: hidden;text-overflow: ellipsis;">
                <a href="<?php echo ROOT_PATH;?>shares/show/<?php echo $item['Img_ID']; ?>"><?php echo $item['Pro_Title']; ?></a>
                 <small><?php echo $item['City_Name']; ?>, <?php echo $item['Sta_Name']; ?></small></h3>
              <p style="white-space: nowrap;width: 100%; overflow: hidden;text-overflow: ellipsis;"><?php echo $item['Pro_Description']; ?></p>
            </div>
            <div class="property-features">
              <span><i class="fa fa-home"></i> <?php echo $item['Pro_Surface']; ?> m<sup>2</sup></span>
<!--              <span><i class="fa fa-hdd-o"></i> --><?php //echo $item['badroom']; ?><!-- Bed</span>-->
              <span><i class="fa fa-male"></i> 2 Bath</span>
              <span><i class="fa fa-car"></i> 2 Garages</span>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

      <div id="slider" style="background-image: url(<?php echo ROOT_URL; ?>assets/uploads/bg-home-2.png);">
        <div class="bg-slider">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="selling-content">
                  <h2>Posto shpallje FALAS</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.</p>
                      <?php if(isset($_SESSION['is_logged_in'])) : ?>
                      <a type="button" id="getStarted" class="btn btn-primary" href="<?php echo ROOT_URL;?>shares/add">FILLO</a>
                      <?php else : ?>
                      <a type="button" id="getStarted" class="btn btn-primary" href="<?php echo ROOT_URL;?>users/login">FILLO</a>
                      <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div id="contact-form">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
              <h4><strong>Kontakto</strong></h4>
              <div class="div-text-center">
                <form id="cont-form" action="<?php echo ROOT_URL;?>home/sentMail" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Emri" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Subjekti" required>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control textarea" style="height: 196px; resize: vertical; border-radius: none;" name="comment" minlength="2" rows="3" placeholder="Komenti" required></textarea>
                  </div>
    
                  <button type="submit" name="submit" class="btn btn-primary dergo" >
                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Dergo
                  </button>
                </form>
              </div>
          </div>
          <div class="col-md-6">
              <iframe id="location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d391.37103220426457!2d21.152785622840568!3d42.64696005705491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549e8d5d607f25%3A0xa31dd05b21bd09de!2sUniversiteti+p%C3%ABr+Biznes+dhe+Teknologji!5e1!3m2!1sen!2s!4v1513459389201" height="440" allowfullscreen></iframe>
          </div>

      </div>
     </div>
    </div>