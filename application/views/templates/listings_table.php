<div class="col-lg-4 offset-lg-4">
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
			<th scope="row"> <?php echo $row['lid']; ?> </th>
			<td>	<?php echo $row['name']; ?> 		</td>
			<td>	<?php echo $row['category']; ?>		</td>
			<td>	<?php echo $row['username']; ?>		</td>
			<td>	<?php echo $row['price_bid']; ?>	</td>
			<td>	<?php echo $row['price_buyout']; ?>	</td>
			<td>	<?php echo $row['status']; ?>	</td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>
</div>
