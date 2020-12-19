<div class="col-lg-4 offset-lg-4">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class = "form-group">
			<label for="name">Item name:</label>
			<input class="form-control" name ="name" id="name" type="text">
		</div>

		<div class = "form-group">
			<label for="description">Description:</label>
			<input class="form-control" name ="description" id="description" type="text">
		</div>

		<div class = "form-group">
			<label for="category">Category:</label>
			<input class="form-control" name ="category" id="category" type="text">
		</div>

		<div class = "form-group">
			<label for="price_bid">Starting bid:</label>
			<input class="form-control" name ="price_bid" id="price_bid" type="int">
		</div>

		<div class = "form-group">
			<label for="price_buyout">Buyout price:</label>
			<input class="form-control" name ="price_buyout" id="price_buyout" type="int">
		</div>

		<div>
			<button class="btn btn-primary" name="add_listing">Create listing</button>
		</div>
	</form>
</div>
