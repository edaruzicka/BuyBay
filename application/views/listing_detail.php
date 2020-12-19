<div class="flex-container border">

	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
		<?php
	} ?>

	<?php if (isset($_SESSION['error'])) { ?>
		<div class="alert alert-danger"> <?php echo $_SESSION['error']; ?></div>
		<?php
	} ?>

	<div class="row">
		<div class="col ml-3 border">
			<h1><?php echo $listing->name ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col ml-3 border">
			<h3>Description:</h3>
			<p><?php echo $listing->description ?></p>
		</div>
	</div>

	<?php if ($listing->status == 'open' AND $listing->user_id != $_SESSION['user_id']) { ?>
	<div class="row">
		<div class="col ml-3 border">
			<h3>Current bid:</h3>
			<h4><?php echo $listing->price_bid ?>$</h4>

			<form class="form-inline" action="" method="POST">
				<div class="form-group mx-sm-3 mb-2">
					<label for="price_bid">Bid:</label>
					<input class="form-control" name="price_bid" id="price_bid" type="number"
						   value=<?php echo $listing->price_bid + 10 ?>>
				</div>
				<div>
					<button class="btn btn-primary mb-2" style="width:100px" name="bid">Bid</button>
				</div>
			</form>

		</div>
		<div class="col border">
			<h3>Buyout price:</h3>
			<h4><?php echo $listing->price_buyout ?>$</h4>
			<form class="form-inline" action="" method="POST">
				<button class="btn btn-primary" name="buyout">Buyout</button>
			</form>
		</div>
	</div>
	<?php } elseif($listing->user_id == $_SESSION['user_id']) { ?>
	<div class="row">
		<div class="col ml-3 border">
			<h1>This is your listing!</h1>
		</div>
	</div>
	<?php } else { ?>
	<div class="row">
		<div class="col ml-3 border">
			<h1>Item is sold!</h1>
		</div>
	</div>
	<?php } ?>

</div>

<div class="container fluid">
	<div class="row">
		<div class="col ml-3 border">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?php echo base_url('images/phone.jpg'); ?>" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?php echo base_url('images/phone.jpg'); ?>" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?php echo base_url('images/phone.jpg'); ?>" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>
