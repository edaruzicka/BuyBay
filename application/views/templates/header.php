<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css"
		  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>BuyBay</title>
</head>
<body>

<div class="flex-container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="<?php echo base_url(); ?>listings/browse">BuyBay</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url(); ?>listings/browse">Browse <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>

				<?php if (isset($_SESSION['user_logged']) == FALSE) { ?>
					<li class="nav-item">
						<a class="nav-link" href=<?php echo base_url(); ?>auth/login>Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href=<?php echo base_url(); ?>auth/register>Register</a>
					</li>
				<?php } else { ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Account
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?php echo base_url(); ?>user/profile">Profile</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo base_url(); ?>auth/logout">Logout</a>
						</div>
					</li>
				<?php
				} ?>

			</ul>

			<form class="form-inline my-2 my-lg-0" action="<?php echo base_url(); ?>listings/browse" method = "GET">
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
				<input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">
			</form>

			<ul class="navbar-nav ml-auto">
			<?php if (isset($_SESSION['user_logged']) == FALSE) { ?>
				<li class="nav-item">
					<a class="nav-link" href=<?php echo base_url(); ?>auth/login>Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href=<?php echo base_url(); ?>auth/register>Register</a>
				</li>
			<?php } else { ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
					   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Account
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url(); ?>user/profile">Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo base_url(); ?>auth/logout">Logout</a>
					</div>
				</li>
				<?php
			} ?>
			</ul>

		</div>
	</nav>
</div>

