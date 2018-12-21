    <div class="title-content" >
        <div class="container">
        <hr style="border-top: 1px solid  #e2e2e2;">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 style="font-size: 30px; color: #339BEB;"><?php echo $viewmodel['Pro_Title']; ?></h2>
                </div>
            </div>
        <hr style="border-top: 1px solid  #e2e2e2;">
        </div>
    </div>
    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="bs-example">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <?php 
                        $images = new ShareModel();
                        $rows = $images->showImg();
                    ?>
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel"  data-slide-to='0' class="active"></li>
                        <?php 
                            $count = 0;
                            foreach($rows as $item) :
                            $count++;
                            echo "<li data-target='#myCarousel' data-slide-to='$count' class=''></li>";
                        ?> 
                        <?php endforeach; ?>  
                    </ol>   
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div  style="max-height: 60px;" class="item active ">
                            <img style="height: 100%;" src="<?php echo ROOT_PATH;?>assets/uploads/<?php echo $item['Img_Path'];?>">
                        </div> 
                                            
                        <?php  foreach($rows as $item) : ?>
                        <div style="max-height: 60px;"class="item ">
                            <img style="height: 100%;" src="<?php echo ROOT_PATH;?>assets/uploads/<?php echo $item['Img_Path'];?>">
                        </div> 
                        <?php endforeach; ?>  	
                    </div>
                    <!-- Carousel controls -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                            <span style="position: absolute;  top: 40%; font-size: 55px;" class="fa-mod fa fa-chevron-left"></span>
                        </a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">
                            <span style="position: absolute;  top: 40%; font-size: 55px;" class="fa-mod fa fa-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="property-content">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <h5 style="color: #999">Kategoria</h5>
                    <h4 style="font-weight: 400;"><?php echo $viewmodel['Type_Name']; ?></h4>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <h5 style="color: #999">Lloji i shpalljes</h5>
                    <h4 style="font-weight: 400;"><?php echo $viewmodel['Sts_Name']; ?></h4>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <h5 style="color: #999">Kuadratura</h5>
                    <h4 style="font-weight: 400;"><?php echo $viewmodel['Pro_Surface']; ?></h4>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <h5 style="color: #999">Nr. Dhomave</h5>
                    <h4 style="font-weight: 400;">3</h4>
                </div>
            </div>
            <hr>
        </div>

        <div class="container text-left">
           <div class="row">
                <div class="col-sm-2">
                    <h3  style="font-weight: 400;">Detajet:</h3>
                </div>
                <div class="col-md-10">
                    <div class="row ">
                        <div class="col-sm-2">
                            <h4>Titulli:  </h4>
                        </div>
                        <div class="col-sm-10">
                            <h4 style="font-weight: bold;"><?php echo $viewmodel['Pro_Title']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Data:  </h4>
                        </div>
                        <div class="col-sm-10">
                            <h4 style="font-weight: bold;"><?php echo $viewmodel['Pro_Post_Date']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Rajoni:  </h4>
                        </div>
                        <div class="col-sm-10">
                            <h4 style="font-weight: bold;"><?php echo $viewmodel['City_Name']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Shteti:  </h4>
                        </div>
                        <div class="col-sm-10">
                            <h4 style="font-weight: bold;"><?php echo $viewmodel['Sta_Name']; ?></h4>
                        </div>

                    </div>
                    <div class="row">
                    <div class="col-sm-2">
                            <h3>Çmimi:  </h3>
                        </div>
                        <div class="col-sm-10">
                            <h3 style="font-weight: bold;"><?php echo $viewmodel['Pro_Price']; ?>  €</h3>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>

        <div class="container">
            <div class="row text-left">
                <div class="col-md-2">
                    <h3 style="margin-top: 10px">P&#235;rshkrimi:</h3>
                </div>
                <div class="col-md-10">
                    <h4 style="font-size: 16px;"><?= nl2br($viewmodel['Pro_Description']); ?></h4>
                </div>
               
            </div>
            <hr>
        </div>

       
        <div class="container text-left">
           <div class="row">
                <div class="col-md-2">
                    <h3 style="margin-top: 10px;">Kontakti: </h3>
                 
                </div>
                <div class="col-md-10">
                    <div class="row ">
                        <div class="col-sm-12">
                            <h4>Email: <?php echo $viewmodel['Con_Email']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Tel: <?php echo $viewmodel['Con_Phone']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 "style="width: auto">
                            <h4>Vendodhja:</h4>
                        </div>
                        <div class="col-sm-2" style="width: auto; padding-right: 0;">
                            <h4><?php echo $viewmodel['City_Name']; ?></h4>
                        </div>
                        <div class="col-sm-2" style="width: auto; padding-left: 0;">
                            <h4>/<?php echo $viewmodel['Sta_Name']; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>