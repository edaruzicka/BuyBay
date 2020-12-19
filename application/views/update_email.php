<div class="col-lg-4 offset-lg-4">
	<h1>Update email:</h1>

	<?php if (isset($_SESSION['error'])) { ?>
		<div class="alert alert-danger"> <?php echo $_SESSION['error']; ?></div>
		<?php
	} ?>

	<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

	<form action="" method="POST">
		<div class="form-group">
			<label for="old_email">Old email: </label>
			<input class="form-control" name="old_email" id="old_email" type="text">
		</div>

		<div class="form-group">
			<label for="new_email">New email:</label>
			<input class="form-control" name="new_email" id="new_email" type="text">
		</div>

		<div>
			<button class="btn btn-primary" name="update_email">Update email</button>
		</div>
	</form>

</div>
