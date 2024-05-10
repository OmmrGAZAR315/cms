<?php
use PHPMailer\PHPMailer\PHPMailer;
include "includes/header.php";
include "includes/db.php";
require 'vendor/autoload.php';
?>

<?php
if (isset($_POST["submit"])) {
	$subject = $_POST["subject"];
	$msg_content = $_POST["msg_content"];
	$email = $_POST["email"];

	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 2525;
	$phpmailer->Username = '080f7c57e62653';
	$phpmailer->Password = 'c332f40104ec55';
	$phpmailer->isHTML(true);
	$phpmailer->CharSet = 'UTF-8';

	$phpmailer->setFrom("$email", "{$_SESSION['firstName']} {$_SESSION['lastName']}");
	$phpmailer->addAddress("omarahmedelgazzar600@gmail.com", "Omar Ahmed");
	$phpmailer->Subject = 'Test Email....';
	$phpmailer->Body = $msg_content;
	if ($phpmailer->send())
		$done = true;
	else
		$done = false;
}
?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
						<?php
						if (isset($_POST['submit']) && $done)
							echo "<p>Your Message has been submitted and we will contact you shortly</p>";
						?>
                        <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">

                            <div class="form-group">
                                <label for="Email Subject">Email Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="somebody@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="text" class="sr-only">Your Message</label>
                                <textarea name="msg_content" id="" cols="74" rows="5"></textarea>
                            </div>

							<?php if (UserLoginIn()): ?>
                                <input type="submit" name="submit" id="btn-login"
                                       class="btn btn-custom btn-lg btn-block"
                                       value="Send">
							<?php else: ?>
                                <h4><br>you need to login to contact
                                    <a style="text-decoration: underline" href="login?visited=<?php echo $visited; ?>">Login</a>
                                </h4>
							<?php endif; ?>
                        </form>
						<?php
						if (isset($done)) {
							if ($done)
								echo "<h3 class='bg-success'>mail has been sent</h3>";
							else {
								echo "<h4 class='text-danger'>sorry, there was an error, try again later<br></h4>";
							}
						} ?>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>


	<?php include "includes/footer.php"; ?>
