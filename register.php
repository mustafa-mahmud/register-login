<?php require_once 'header.php';?>
<script type="module" defer src="js/reg.js"></script>
		<title>Registration</title>
<main id="main-area">

	<!-- registration area -->
	<section id="register">
		<div class="row m-0">
			<div class="col-lg-4 offset-lg-2">
				<div class="text-center pb-5">
					<h1 class="login-title text-dark">Register</h1>
					<p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
					<span class="font-ubuntu text-black-50">I already have <a href="login.php">Login</a></span>
				</div>
				<div class="upload-profile-image d-flex justify-content-center pb-5">
					<div class="text-center">
						<div class="d-flex justify-content-center">
							<img class="camera-icon" src="./assets/camera-solid.svg" alt="camera">
						</div>
						<img src="./assets/profile/beard.png" style="width: 200px; height: 200px" class="img rounded-circle"
							alt="profile">
						<small class="form-text text-black-50">Choose Image</small>
						<input form="reg-form" type="file" class="form-control-file" name="image" id="upload-profile">
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
						<div class="form-row">
							<div class="col">
								<input type="text" value="" name="first_Name" id="firstName" class="form-control"
									placeholder="First Name">
							</div>
							<div class="col">
								<input type="text" value="" name="last_Name" id="lastName" class="form-control" placeholder="Last Name">
							</div>
						</div>

						<div class="form-row my-4">
							<div class="col">
								<input type="email" value="" name="email" id="email" class="form-control" placeholder="Email*">
							</div>
						</div>

						<div class="form-row my-4">
							<div class="col">
								<input type="password" value="" name="password" id="password" class="form-control"
									placeholder="password*">
							</div>
						</div>

						<div class="form-row my-4">
							<div class="col">
								<input type="password" value="" name="confirm_password" id="confirm_pwd" class="form-control"
									placeholder="Confirm Password*">
							</div>
						</div>

						<div class="message-box">
							<h2 class="msg"></h2>
						</div>

						<div class="form-check form-check-inline">
							<input required type="checkbox" name="agreement" class="form-check-input" id="agreement">
							<label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">term,
									conditions, and policy </a>(*) </label>
						</div>

						<div class="submit-btn text-center my-5">
							<button type="submit" name="reg_submit"
								class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- #registration area -->

</main>

<?php require_once 'footer.php';?>