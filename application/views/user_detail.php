<div class="col-lg-4 offset-lg-4">
	<h1>User <?php echo $username ?></h1>

	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
		<?php
	} ?>

	<br><br>

	<h3>User reviews:</h3>
	<table class="table table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Stars</th>
			<th scope="col">Review</th>
		</tr>
		</thead>
		<tbody>

		<?php
		foreach ($user as $row)
		{ ?>
			<tr>
				<th scope="row"> <?php echo $row['stars']; ?> 	</th>
				<td>	<?php echo $row['review']; ?>	</td>
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>

	<a class="btn btn-secondary" href="<?php echo base_url(); ?>listings/add_u_review/<?php echo $username ?>">Write a review</a>

</div>
