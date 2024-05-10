<?php
include "includes/header.php";
include "includes/db.php";

if (isset($_POST["submit"])) {
	$username = mysqli_real_escape_string($connection, $_POST["username"]);
	$email = mysqli_real_escape_string($connection, $_POST["email"]);
	$password = mysqli_real_escape_string($connection, $_POST["password"]);
	$pass_char = strlen($password);
	$user_firstName = mysqli_real_escape_string($connection, $_POST["firstName"]);
	$user_lastName = mysqli_real_escape_string($connection, $_POST["lastName"]);

	$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

	if (!empty($_FILES['image']['name'])) {
		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];
	} else {
        $user_image= "default.jpg";
		$user_image_temp = '';
	}

	move_uploaded_file($user_image_temp, "../images/$user_image");


	$query = "INSERT INTO users(user_firstName,user_lastName,user_name,user_email, user_password, user_role,pass_char,user_image) ";
	$query .= "values(?,?,?,?,?,'0b001',?,?)";

	$stmt = mysqli_prepare($connection, $query);
	mysqli_stmt_bind_param($stmt, "sssssis", $user_firstName, $user_lastName, $username, $email, $password, $pass_char, $user_image);
	try {
		mysqli_stmt_execute($stmt);
		$done = true;
		mysqli_stmt_close($stmt);
		$query = "SELECT LAST_INSERT_ID()";
		$selected_LAST_Post = mysqli_query($connection, $query);
		if ($row = mysqli_fetch_assoc($selected_LAST_Post))
			updateSessionData($row["LAST_INSERT_ID()"]);
		header("Location:blog_List");
	} catch (mysqli_sql_exception $e) {
		$error = $e->getMessage();
		$done = false;
	}


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
                        <h1>Register</h1>
						<?php if (isset($done) && !$done) {
							echo "<h3 class='text-danger'>Error, fix those errors : <br></h3>";
							echo "<h4 class='bg-danger'>$error</h4>";
						} ?>
                        <form role="form" enctype="multipart/form-data" action="registration.php" method="post"
                              id="login-form" autocomplete="off">

                            <div class="form-group">
                                <label for="First Name" class="sr-only">First Name</label>
                                <input type="text" name="firstName" id="firstName" class="form-control"
                                       placeholder="Enter First Name" required>
                            </div>

                            <div class="form-group">
                                <label for="Last Name" class="sr-only">Last Name</label>
                                <input type="text" name="lastName" id="lastName" class="form-control"
                                       placeholder="Enter Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="user_image">User Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="user name" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       placeholder="Enter Username" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="somebody@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control"
                                       placeholder="Password" required>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                   value="Register">
                            <h5>Already have an account?<a style="text-decoration: underline"
                                                           href="login?visited=<?php echo $visited ?>">Log in</a></h5>
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>


	<?php include "includes/footer.php"; ?>
