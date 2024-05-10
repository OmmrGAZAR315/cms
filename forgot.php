<?php include "includes/header.php"; ?>
<?php //use PHPMailer\PHPMailer\PHPMailer; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php require 'vendor/autoload.php' ?>
<?php
$done = false;
if (!$_GET["fg"])
	header("Location:blog_List");

if (isset($_POST["submit"])) {
	$email = $_POST["email"];
	$email = mysqli_real_escape_string($connection, $email);
	$length = 50;
	$token = bin2hex(openssl_random_pseudo_bytes($length));
	$query = "SELECT * FROM users WHERE user_email = '$email'";
	$result = mysqli_query($connection, $query);
	$header = "forgot?fg=1&";
	if (0 < mysqli_num_rows($result)) {
		if ($row = mysqli_fetch_assoc($result))
			$user_name = $row['user_name'];

		$query = "UPDATE users SET token = '$token' WHERE user_email = ?";
		$stmt = mysqli_prepare($connection, $query);
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		//////CONFIG email////////////
//		$phpmailer = new PHPMailer();
//		$phpmailer->isSMTP();
//		$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
//		$phpmailer->SMTPAuth = true;
//		$phpmailer->Port = 2525;
//		$phpmailer->Username = '080f7c57e62653';
//		$phpmailer->Password = 'c332f40104ec55';
//		$phpmailer->isHTML(true);
//		$phpmailer->CharSet = 'UTF-8';
//
//		$phpmailer->setFrom("$email", "User");
//		$phpmailer->addAddress("omarahmedelgazzar600@gmail.com","Omar Ahmed");
//		$phpmailer->Subject = 'Test Email....';
//		$phpmailer->Body = "<p>please click to reset your password
//         <a href='http://localhost/cms/reset?token=$token'>http://localhost:8080/cms/reset?token=$token</a></p>";
//		if ($phpmailer->send())
//			header("Location:{$header}done=true");
//		else
//			header("Location:{$header}done=false");

		$subject = "Reset Password";
		$msg_content = "your username:$user_name\nplease click to reset your password\nhttps://cms-php-omar29.000webhostapp.com/cms/reset?token=$token";
		$email = $_POST["email"];

		if (mail($email, $subject, $msg_content))
			header("Location:{$header}done=true");
		else
			header("Location:{$header}done=false");

	} else
		header("Location:{$header}noRes");
}

?>

<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
						<?php if (!isset($_GET["done"]) && !isset($_GET["noRes"])): ?>
                            <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">
                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" required placeholder="email address"
                                                       class="form-control" type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="submit" class="btn btn-lg btn-primary btn-block"
                                                   value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>
                                </div><!-- Body-->

                            </div>
						<?php elseif (isset($_GET["noRes"])): ?>
                            <h2 class="text-center text-danger">No Result</h2>
                            <br>
                            <a class="text-center" href="forgot?fg=<?php echo uniqid(true); ?>"><h4>Try Again</h4></a>
						<?php elseif ($_GET["done"] == 'false'): ?>
                            <h2 class="bg-danger">An Error occurred <br> Please try again later</h2>
						<?php else: ?>
                            <h2 class="text-success">Please check your email</h2>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
	<?php include "includes/footer.php"; ?>
</div> <!-- /.container -->

