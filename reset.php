<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<!-- Navigation -->

<?php include "includes/navigation.php"; ?>

<?php
if (isset($_GET["token"])) {
	$token = $_GET["token"];
	$query = "SELECT user_name,user_email, token FROM users WHERE token = ? ";
	$stmt = mysqli_prepare($connection, $query);
	mysqli_stmt_bind_param($stmt, "s", $token);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $username, $user_email, $token);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
} else header("Location:blog_List");

if (isset($_POST["reset"])) {
	if ($_POST["pass"] == $_POST["conPass"] && !empty($_POST["pass"])) {
		$password = $_POST["pass"];
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT, array('const' => 12));
		$query = "UPDATE users SET token=NULL,user_password = ? WHERE user_email = ? ";
		$stmt = mysqli_prepare($connection, $query);
		mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $user_email);
		mysqli_stmt_execute($stmt);
		if (mysqli_stmt_affected_rows($stmt) >= 1)
			header("Location:reset?token=n&k=true");
		mysqli_stmt_close($stmt);

	} else header("Location:reset?token={$token}&noRes=true");
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
                        <div class="text-center">
                            <h3><i class="fa fa-user fa-4x"></i></h3>
                            <h2 class="text-center">Reset Password</h2>
							<?php if (!isset($_GET["k"]) && !isset($_GET["noRes"])): ?>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
                                <form id="login-form" role="form" autocomplete="off" class="form" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-user "></i></span>
                                            <input name="pass" type="password" class="form-control"
                                                   placeholder="Enter New password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-check"></i></span>
                                            <input name="conPass" type="password" class="form-control"
                                                   placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="reset" class="btn btn-lg btn-primary btn-block" value="Submit"
                                               type="submit">
                                    </div>
                                </form>
                            </div><!-- Body-->
                        </div>
						<?php elseif (isset($_GET["noRes"])): ?>
                            <h2 class="text-center text-danger">No Result</h2>
                            <br>
                            <a class="text-center" href="reset?token=<?php echo $_GET['token']; ?>"><p>please
                                    make
                                    sure passwords are same</p></a>
						<?php else: ?>
                            <h2 class="bg-success text-success">Password changed</h2>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
	<?php include "includes/footer.php"; ?>
</div> <!-- /.container -->
