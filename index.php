<?php
  require_once 'read.php';

  if (!isset($_SESSION['user_id'])) {
    header('location: register.php');
  }

  $user = readData('users', ['*'], 'id', $_SESSION['user_id']);
?>
<?php require_once 'header.php';?>
<title>Home</title>

<main id="main-area">
	<button class="logout"><a href="logout.php" class="logout">Logout</a></button>
	<section id="main-site">
		<div class="container py-5">
			<div class="row">
				<div class="col-4 offset-4 shadow py-4">
					<div class="upload-profile-image d-flex justify-content-center pb-5">
						<div class="text-center">
							<img class="img rounded-circle" style="width: 200px; height: 200px;"
								src="<?php echo isset($user[0]['image']) ? './assets/profile/' . $user[0]['image'] : './assets/profile/beard.png'; ?>"
								alt="">
							<h4 class="py-3">
								<?php
                  if (isset($user[0]['firstName'])) {
                    printf('%s %s', $user[0]['firstName'], $user[0]['lastName']);
                  }
                ?>
							</h4>
						</div>
					</div>

					<div class="user-info px-3">
						<ul class="font-ubuntu navbar-nav">
							<li class="nav-link"><b>First Name:
								</b><span>
									<?php echo isset($user[0]['firstName']) ? $user[0]['firstName'] : ''; ?>
								</span></li>
							<li class="nav-link"><b>Last Name:
								</b><span>
									<?php echo isset($user[0]['lastName']) ? $user[0]['lastName'] : ''; ?>
								</span></li>
							<li class="nav-link"><b>Email:
								</b><span>
									<?php echo isset($user[0]['email']) ? $user[0]['email'] : ''; ?>
								</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php require_once 'footer.php';?>