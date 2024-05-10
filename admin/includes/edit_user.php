<?php
if (bindec($_SESSION["user_role"]) & 0b100) {
	if (isset($_GET["userID"])) {
		$user_id = $_GET['userID'];
		$query = "SELECT * FROM users WHERE user_id = $user_id";
		$selectedUser = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($selectedUser);
		$user_firstName = $row['user_firstName'];
		$user_lastName = $row['user_lastName'];
		$user_role = $row['user_role'];
		$user_image = $row['user_image'];
		$user_name = $row['user_name'];
		$user_email = $row['user_email'];
		$user_password_old = $row['user_password'];
		$pass_char = $row['pass_char'];
	}

	if (isset($_POST['update_user'])) {
		assigningUserDataPOST();
		if ($user_password == null)
			$user_password = $user_password_old;

		$query = "UPDATE users SET 
                 user_name='$user_name',
                 user_password='$user_password',
                 pass_char= $pass_char,
                 user_firstName='$user_firstName',
                 user_lastName='$user_lastName',
                 user_email='$user_email',
                 user_role='$user_role',
                 user_image='$user_image',
                 user_date = '$user_date' 
                 WHERE user_id = $user_id";

		$selectedPost = mysqli_query($connection, $query);
		updateSessionData();
		header("Location: admin_users");
	}

	?>

    <form style="margin: 0 20%" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="FN">First Name</label>
            <input type="text" class="form-control" name="user_firstName" value="<?php echo $user_firstName; ?>"
                   required>
        </div>
        <hr>
        <div class="form-group">
            <label for="LN">last Name</label>
            <input type="text" class="form-control" name="user_lastName" value="<?php echo $user_lastName; ?>" required>
        </div>
        <hr>
        <div class="form-group">
            <label for="User Role">User Role</label>
            <select name="user_role">
                <option value=<?php echo $user_role; ?>>
					<?php if (bindec($user_role) & 0b100)
						echo "Owner";
					else if (bindec($user_role) & 0b010)
						echo "Admin";
					else
						echo "Subscriber"; ?>
                </option>
				<?php
				if (bindec($user_role) & 0b100)
					echo "<option value='0b111'>Owner</option>";
				else if (bindec($user_role) & 0b010)
					echo "<option value='0b011'>Admin</option>";
				else
					echo "<option value='0b001'>Subscriber</option>";
				?>
            </select>
        </div>
        <hr>
        <div class="form-group">
            <label for="user_image">User Old Image</label>
            <br>
            <img src="../images/<?php echo $user_image; ?>" width="100" alt="Old Image">
            <br>
            <label for="">Delete
                <input type="radio" name="deleteImg"></label>
        </div>
        <div class="form-group">
            <label for="user_image">Change User Image</label>
            <input type="file" name="image">
        </div>
        <hr>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $user_name; ?>" required>
        </div>
        <hr>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>" required>
        </div>
        <hr>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="user_password"
                   value="<?php echo substr($user_password_old, 0, $pass_char) ?>" required>

        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
        </div>

    </form>
<?php } else
	header("Location:{$_SERVER["HTTP_REFERER"]}?notAllowed");
?>