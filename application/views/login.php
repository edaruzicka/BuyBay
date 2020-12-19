<div class="col-lg-4 offset-lg-4">
	<h1>Login Page:</h1>
	<p>Fill in the details to login to BuyBay.</p>

	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
		<?php
	} ?>

	<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

	<form action="" method="POST">
		<div class="form-group">
			<label for="username">Username: </label>
			<input class="form-control" name="username" id="username" type="text" value ="<?php echo get_cookie("username"); ?>">
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input class="form-control" name="password" id="password" type="password" value ="<?php echo get_cookie("password"); ?>">
		</div>

		<div class="form-check">
			<input type="checkbox" class="form-check-input" name="remember_me" id="remember_me" value=1>
			<label class="form-check-label" for="remember_me">Remember username?</label>
		</div>

		<div>
			<button class="btn btn-primary" name="login">Login</button>
		</div>
	</form>
</div>
