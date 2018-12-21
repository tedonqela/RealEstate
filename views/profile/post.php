<div class="container">
	<div class="row">
    <div class="col-md-12">
      <div class="heading-title">
        <h2>Shpalljet e juaja</h2>
      </div>
		</div>
	</div>
</div>
<!-- if(!isset($_SESSION['has_post'])) : -->
	<?php if(!isset($_SESSION['has_post'])) :?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div style="margin-bottom: 275px;" class="heading-title">
							<h2 style="color: #E90000;">Ju ende nuk keni postuar ndonjë shpallje!</h2>
						</div>
					</div>
				</div>
			</div>
		<?php else : ?>
<div class="container">
	<div class="row">
		<?php foreach($viewmodel as $item) : ?>
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
								<h3 style="white-space: nowrap;width: 100%; overflow: hidden;text-overflow: ellipsis;"><a href="<?php echo ROOT_PATH;?>shares/show/<?php echo $item['Pro_ID']; ?>"><?php echo $item['Pro_Title']; ?></a> <small><?php echo $item['City_Name']; ?>, <?php echo $item['Sts_Name']; ?></small></h3>
								<p style="white-space: nowrap;width: 100%; overflow: hidden;text-overflow: ellipsis;"><?php echo $item['Pro_Description']; ?></p>
							</div>
							<div class="property-features">
								<span><i class="fa fa-home"></i> <?php echo $item['Pro_Surface']; ?> m<sup>2</sup></span>
<!--								<span><i class="fa fa-hdd-o"></i> --><?php //echo $item['badroom']; ?><!-- Bed</span>-->
							</div>
						</div>
						<div class="row">
						<div class="col-xs-6 col-md-6">
						<a class="btn btn-primary"  id="edit-btn" href="<?php echo ROOT_URL;?>shares/edit/<?php echo $item['Pro_ID'];?>">Edito</a>

						</div>
						<div class="col-xs-6 col-md-6 text-right">
							<form method="post" action="<?php echo ROOT_URL; ?>shares/delete">
								<input type="hidden" name="delete_id" value="<?php echo $item['Pro_ID'];?>"/>
								<input type="submit" onclick="return confirm('A jeni te sigurt se doni ta fshini kete prone?');" id="delete-btn" value="Fshijë" name="delete" class="delete-btn btn btn-danger"/>
							</form>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
