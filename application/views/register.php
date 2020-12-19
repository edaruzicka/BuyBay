<div class="col-lg-4 offset-lg-4">
	<h1>Register Page:</h1>
	<p>Fill in the details to register to BuyBay.</p>

	<?php if(isset($_SESSION['success']))
	{ ?>
		<div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
		<?php
	} ?>

	<?php if(isset($_SESSION['error']))
	{ ?>
		<div class="alert alert-danger"> <?php echo $_SESSION['error']; ?></div>
		<?php
	} ?>

	<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

	<form action="" method="POST">
		<div class = "form-group">
			<label for="username">Username:</label>
			<input class="form-control" name ="username" id="username" type="text">
		</div>

		<div class = "form-group">
			<label for="email">Email:</label>
			<input class="form-control" name ="email" id="email" type="text">
		</div>

		<div class = "form-group">
			<label for="password">Password:</label>
			<input class="form-control" name ="password" id="password" type="password">
		</div>

		<div class = "form-group">
			<label for="password">Confirm password:</label>
			<input class="form-control" name ="password2" id="password" type="password">
		</div>

		<div>
			<button class="btn btn-primary" name="register">Register</button>
		</div>
	</form>
</div>
