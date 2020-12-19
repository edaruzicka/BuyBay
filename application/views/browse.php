<div class="col-lg-8 offset-lg-2">
	<h1>Listings:</h1>

	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
		<?php
	} ?>

	<table class="table table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">id</th>
			<th scope="col">Name</th>
			<th scope="col">Category</th>
			<th scope="col">Seller</th>
			<th scope="col">Current bid</th>
			<th scope="col">Buyout price</th>
			<th scope="col">Status</th>
		</tr>
		</thead>
		<tbody>

		<?php
		foreach ($listings as $row)
		{ ?>
		<tr>
			<th scope="row"> <?php echo $row['lid']; ?> 	</th>
			<td><a href="<?php echo base_url(); ?>listings/detail/<?php echo $row['lid']; ?>">	<?php echo $row['name']; ?> </a></td>
			<td><a href="?search=<?php echo $row['category']; ?>">	<?php echo $row['category']; ?>		</a></td>
			<td><a href="<?php echo base_url(); ?>listings/user_detail/<?php echo $row['username']; ?>">	<?php echo $row['username']; ?>		</a></td>
			<td>	<?php echo $row['price_bid']; ?>		$</td>
			<td>	<?php echo $row['price_buyout']; ?>	$</td>
			<td>	<?php echo $row['status']; ?>	</td>
		</tr>
		<?php
		}
		?>

		</tbody>
	</table>

	<a class="btn btn-secondary" href="<?php echo base_url(); ?>listings/add_listing">Create a listing</a>

</div>
