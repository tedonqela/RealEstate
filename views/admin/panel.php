

<!-- begin:content -->
<div id="content">

    <div class="col-sm-12" style="padding: 0">
        <!-- begin:for-rent -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-title">
                        <h2>Postimet e pronave</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($viewmodel as $item) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="property-container">
                            <div class="property-one">

                                <div class="property-image">
                                    <!--	--><?php
                                    //												if($item['is_sold'] == 'PO'){
                                    //													echo '<h1 id="is_sold"style="position: absolute;">SHITUR</h1>';
                                    //												}else{
                                    //													echo '';
                                    //												}
                                    //												?>
                                    <img src="<?php echo ROOT_PATH; ?>assets/uploads/<?php echo $item['Img_Path']; ?>"
                                         alt="mikha real estate theme">
                                    <div class="property-price">
                                        <h4><?php echo $item['Type_Name']; ?></h4>
                                        <span><?php echo $item['Pro_Price']; ?> €</span>
                                    </div>
                                    <div class="property-status">
                                        <h4><?php echo $item['Sts_Name']; ?></h4>
                                    </div>
                                </div>

                                <div class="property-content">
                                    <h3 style="white-space: nowrap;width: 100%; overflow: hidden;text-overflow: ellipsis;">
                                        <a href="<?php echo ROOT_PATH; ?>admin/show/<?= $item['Pro_ID']; ?>"
                                           style="white-space: break-word;"><?php echo $item['Pro_Title']; ?></a>

                                        <h5 style="font-style: italic;"><?php echo $item['City_Name']; ?>
                                            , <?php echo $item['Sts_Name']; ?></h5>
                                        <h1></h1>
                                        <?php if ($item['Pro_Active'] == 1) : ?>
                                            <h1 style="color: green">Active</h1>
                                        <?php else : ?>
                                            <h1 style="color: red">Deactive</h1>
                                        <?php endif ?>
                                    </h3>
                                </div>
                                <div class="property-features">
                                    <span><i class="fa fa-home"></i> <?php echo $item['Pro_Surface']; ?>
                                        m<sup>2</sup></span>
                                    <!--                        <span><i class="fa fa-hdd-o"></i> -->
                                    <?php //echo $item['badroom']; ?><!--  Dhoma</span>-->
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 30%;">
                            <form action="<?php echo ROOT_URL; ?>admin/active" method="POST">
                                <select class="form-control" name="active" style="margin-bottom: 10px">

                                    <?php if ($item['Pro_Active'] == 1) : ?>
                                        <option value="0">Deactive</option>
                                        <!--   <option selected>--Selecte</option>-->
                                    <?php else : ?>
                                        <option value="1">Active</option>
                                    <?php endif ?>
                                </select>

                                <input type="hidden" name="pro_id" value="<?= $item['Pro_ID'] ?>">
                                <input style="width: 100%; background-color: #339BEB; color: white; font-size: 15px"
                                       type="submit" name="submit" class="btn">
                            </form>
                        </div>
                    </div>


                <?php endforeach; ?>
                <?php
                $viewmodel = new AdminModel();

                $date['total_lajme'] = $viewmodel->total_lajme(LIMIT);
                $totali = $date['total_lajme']['sa_faqe'];
                $url = explode("/", $_SERVER['REQUEST_URI']);
                ?>
                <div class="row text-center">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <h4>Faqja <?= $url[3] . " nga " . $totali ?></h4>
                                <?php if ($url[3] == 1) : ?>

                                <?php else : ?>
                                    <li class="page-item"><a class="page-link"
                                                             href="<?php echo ROOT_PATH; ?>admin/panel/<?= $url[3] - 1 ?>"><<<</a>
                                    </li>
                                <?php endif ?>
                                <?php for ($i = 1; $i <= $totali; $i++) : ?>

                                    <?php if ($url[3] == $i) : ?>
                                        <li class="page-item <?= "active" ?>"><a class="page-link "
                                                                                 href="<?php echo ROOT_PATH; ?>admin/panel/<?php echo $i; ?>"><?php echo $i ?></a>
                                        </li>
                                    <?php else : ?>
                                        <li class="page-item "><a class="page-link "
                                                                  href="<?php echo ROOT_PATH; ?>admin/panel/<?php echo $i; ?>"><?php echo $i ?></a>
                                        </li>
                                    <?php endif ?>
                                <?php endfor; ?>
                                <?php if ($url[3] == $totali) : ?>

                                <?php else : ?>
                                    <li class="page-item"><a class="page-link"
                                                             href="<?php echo ROOT_PATH; ?>admin/panel/<?= $url[3] + 1 ?>">>>></a>
                                    </li>
                                <?php endif ?>
                                <li class="page-item"><a class="page-link"
                                                         href="<?php echo ROOT_PATH; ?>admin/panel/<?= $totali ?>">FUNDI</a>
                                </li>

                            </ul>
                        </nav>

                    </div>
                </div>


            </div>
        </div>3


