<div class="col-lg-4 offset-lg-4">
	<h1>Profile Page:</h1>

	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
		<?php
	} ?>

	HELLO, <?php echo $_SESSION['username']; ?>

	<br><br>

	<a class="btn btn-secondary" href="<?php echo base_url(); ?>user/update_email">Update email</a>

	<br><br>

	<h3>Your listings:</h3>
	<br>
	<table class="table table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">id</th>
			<th scope="col">Name</th>
			<th scope="col">Category</th>
			<th scope="col">Current bid</th>
			<th scope="col">Buyout price</th>
			<th scope="col">Status</th>
		</tr>
		</thead>
		<tbody>

		<?php
		foreach ($listings as $row) { ?>
			<tr>
				<th scope="row"> <?php echo $row['lid']; ?>    </th>
				<td>
					<a href="<?php echo base_url(); ?>listings/detail/<?php echo $row['lid']; ?>">    <?php echo $row['name']; ?> </a>
				</td>
				<td>
					<a href="<?php echo base_url(); ?>listings/browse?search=<?php echo $row['category']; ?>">    <?php echo $row['category']; ?>        </a>
				</td>
				<td>    <?php echo $row['price_bid']; ?>        </td>
				<td>    <?php echo $row['price_buyout']; ?>    </td>
				<td>    <?php echo $row['status']; ?>    </td>
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>

	<br><br>

	<h3>Your bids:</h3>
	<br>
	<table class="table table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Name</th>
			<th scope="col">Bid</th>
			<th scope="col">Time</th>
			<th scope="col">Status</th>
		</tr>
		</thead>
		<tbody>

		<?php
		foreach ($bids as $row) { ?>
			<tr>
				<th scope="row"><a
							href="<?php echo base_url(); ?>listings/detail/<?php echo $row['lid']; ?>"> <?php echo $row['name']; ?>   </a>
				</th>
				<td>    <?php echo $row['bid']; ?>        </td>
				<td>    <?php echo $row['timestamp']; ?>    </td>
				<td>    <?php echo $row['status']; ?>    </td>
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>

	<br><br>

	<h3>Your bought items:</h3>
	<br>
	<table class="table table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">id</th>
			<th scope="col">Name</th>
			<th scope="col">Category</th>
			<th scope="col">Current bid</th>
			<th scope="col">Buyout price</th>
			<th scope="col">Status</th>
		</tr>
		</thead>
		<tbody>

		<?php
		foreach ($bought_items as $row) { ?>
			<tr>
				<th scope="row"> <?php echo $row['id']; ?>    </th>
				<td>
					<a href="<?php echo base_url(); ?>listings/detail/<?php echo $row['id']; ?>">    <?php echo $row['name']; ?> </a>
				</td>
				<td>
					<a href="<?php echo base_url(); ?>listings/browse?search=<?php echo $row['category']; ?>">    <?php echo $row['category']; ?>        </a>
				</td>
				<td>    <?php echo $row['price_bid']; ?>        </td>
				<td>    <?php echo $row['price_buyout']; ?>    </td>
				<td>    <?php echo $row['status']; ?>    </td>
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>

</div>
