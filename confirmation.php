<?php session_start();?>
<?php
  if (!isset($_SESSION['user_info'])) {
    header('location: logout.php');
  }
?>
<?php require_once 'header.php';?>
<?php
  require 'insert.php';
  $res = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm'])) {
      $code = $_POST['confirm'];

      if ($_SESSION['email_code'] === md5($code)) {
        //table columns
        $columns[] = 'firstName';
        $columns[] = 'lastName';
        $columns[] = 'email';
        $columns[] = 'password';
        $columns[] = 'image';

        //table values
        $values[] = "'{$_SESSION['user_info'][0]}'";
        $values[] = "'{$_SESSION['user_info'][1]}'";
        $values[] = "'{$_SESSION['user_info'][2]}'";
        $values[] = "'{$_SESSION['user_info'][3]}'";
        $values[] = "'{$_SESSION['user_info'][4]}'";

        $res = insertData('users', $columns, $values);
      } else {
        $res = 'sorry';
      }
    }
  }
?>
<!-- Confirmation -->
<title>Confirmation</title>

<section class="confirmation">

	<div class="container">
		<p>Please check your email and Confirm your 4 digit numbers here in <strong style="color:red"></strong>s</p>
		<div>
			<form method="post">
				<input placeholder="4 Digit Numbers" type="number" name="confirm">
				<button type="submit">
					<img src="assets/img/send.png" alt="send png" />
				</button>
			</form>
		</div>
		<?php if ($res === 'success'): ;?>
			<p class="confirmaion_msg" style="color:green">
				Your registeration is successfully.
			</p>
			<?php
          echo "
											<script>
													setTimeout(() => {
														location.href = 'login.php';
													}, 2000);
											</script>
									";
        ?>
<?php endif;?>
<?php if (strstr($res, 'sorry')): ;?>
			<p class="confirmaion_msg" style="color:red">
				Wrong Digits, Pls check your email.
			</p>
			<?php endif;?>

	</div>
</section>
<script type="module" src="js/conf.js"></script>
<?php require_once 'footer.php';?>