<?php
  require_once 'read.php';
  if (!isset($_SESSION)) {
    session_start();
  }
  if (isset($_SESSION['user_id'])) {
    $user = readData('users', ['image'], 'id', $_SESSION['user_id']);
  }
?>
<?php require_once 'header.php';?>

<script type="module" defer src="js/log.js"></script>
<title>Login</title>

<!-- registration area -->
<section id="login-form">
	<div class="row m-0">
		<div class="col-lg-4 offset-lg-2">
			<div class="text-center pb-5">
				<h1 class="login-title text-dark">Login</h1>
				<p class="p-1 m-0 font-ubuntu text-black-50">Login and enjoy additional features</p>
				<span class="font-ubuntu text-black-50">Create a new <a href="register.php">account</a></span>
			</div>
			<div class="upload-profile-image d-flex justify-content-center pb-5">
				<div class="text-center">
					<img
						src="<?php echo isset($user[0]['image']) ? 'assets/profile/' . $user[0]['image'] : 'assets/profile/beard.png'; ?>"
						style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
				</div>
			</div>
			<div class="d-flex justify-content-center">
				<form method="post" enctype="multipart/form-data" id="log-form">

					<div class="form-row my-4">
						<div class="col">
							<input type="email" name="email" id="email" class="form-control" placeholder="Email*">
						</div>
					</div>

					<div class="form-row my-4">
						<div class="col">
							<input type="password" name="password" id="password" class="form-control" placeholder="password*">
						</div>
					</div>

					<div class="message-box">
						<h2 class="msg"></h2>
					</div>

					<div class="submit-btn text-center my-5">
						<button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</section>
<!-- #registration area -->

</main>

<?php require_once 'footer.php';?>