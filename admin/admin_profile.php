<?php //ob_start(); ?>
<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">
    <!-- Navigation -->
	<?php include "includes/admin_navigation.php"; ?>
	<?php
	if (isset($_SESSION["userName"])) {
		$user_id = $_SESSION['userID'];
		$user_name = $_SESSION['userName'];
		$user_password_old = $_SESSION['password'];
		$pass_char = $_SESSION['pass_char'];
		$user_firstName = $_SESSION['firstName'];
		$user_lastName = $_SESSION['lastName'];
		$user_email = $_SESSION['user_email'];
		$user_role = $_SESSION['user_role'];
		$user_image = $_SESSION['image'];
		$user_date = date("d-M-Y h:i:s");
	}
	if (isset($_POST['update_user'])) {
		assigningUserDataPOST();
		if ($user_password == null)
			$user_password = $user_password_old;
		if (empty($user_role))
			$user_role = $_SESSION['user_role'];

		$query = "UPDATE users SET ";
		$query .= "user_name='$user_name', ";
		$query .= "user_password='$user_password', ";
		$query .= "pass_char=$pass_char, ";
		$query .= "user_firstName='$user_firstName', ";
		$query .= "user_lastName='$user_lastName', ";
		$query .= "user_email='$user_email', ";
		$query .= "user_role='$user_role', ";
		$query .= "user_image='$user_image', ";
		$query .= " user_date = '$user_date' ";
		$query .= "WHERE user_id = $user_id ";
		$selectedPost = mysqli_query($connection, $query);
		updateSessionData();
		header("Location:admin_profile");
	}

	?>

    <form style="margin: 0 13%" action="" method="post" enctype="multipart/form-data">
	    <?php if (!empty($user_image)) { ?>
            <div class="text-center form-group">
                <br>
                <img class="img-circle" src="../images/<?php echo $user_image; ?>" width="200" height="250" alt="Old Image">
            </div>
	    <?php } ?>
        <div class="form-group">
            <label for="user_image">User Image</label>
            <input type="file" name="image">
        </div>
        <div class="form - group">
            <label for="FN">First Name</label>
            <input type="text" class="form-control" name="user_firstName"
                   value="<?php echo $user_firstName; ?>" required>
        </div>
        <hr>
        <div class="form-group">
            <label for="LN">last Name</label>
            <input type="text" class="form-control" name="user_lastName"
                   value="<?php echo $user_lastName; ?>" required>
        </div>
        <hr>
		<?php if (bindec($user_role) & 0b100) { ?>
        <div class="form-group">
            <select name="user_role">
				<?php
				echo "<option selected value='0b111'>Owner</option>";
				echo "<option value='0b011'>Admin</option>";
				echo "<option value='0b001'>Subscriber</option>";
				?>
            </select>
			<?php } else {
				echo "<div class='bg-info'>";
				switch ($user_role) {
					case '0b011':
						$role = 'Admin';
						break;
					case '0b001':
						$role = 'Subscriber';
						break;
				}
				echo "<h3 class='text-center'>$role</h3>";
			} ?>
        </div>
        <hr>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" required value="<?php echo $user_name; ?>">
        </div>
        <hr>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="user_email"
                   value="<?php echo $user_email; ?>" required>
        </div>
        <hr>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password"
                   value="<?php echo substr($user_password_old, 0, $pass_char) ?>"
                   name="user_password" required>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
        </div>
    </form>
    <!-- /.container-fluid -->
    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>