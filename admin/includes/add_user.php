<?php
if (bindec($_SESSION["user_role"]) & 0b100) {
	if (isset($_POST['create_user'])) {
		assigningUserDataPOST();

		$query = "INSERT INTO users(user_name,user_password,user_firstName,user_lastName,user_email,user_role,user_image,user_date,pass_char) ";
		$query .= "VALUES('$user_name','$user_password','$user_firstName','$user_lastName','$user_email','$user_role','$user_image','$user_date',$pass_char)";
		$selectedPost = mysqli_query($connection, $query);
		header("Location:admin_users");
	}
	?>

    <form style="margin: 0 20%" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="FN">First Name</label>
            <input type="text" class="form-control" name="user_firstName">
            <hr>
        </div>
        <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" class="form-control" name="user_lastName">
        </div>
        <hr>
        <div class="form-group">
            <select name="user_role">
                <option value="subscriber">Choose a Role</option>
                <option value="0b111">Owner</option>
                <option value="0b011">Admin</option>
                <option value="0b001">Subscriber</option>
            </select>
        </div>
        <hr>
        <div class="form-group">
            <label for="user_image">User Image</label>
            <input type="file" name="image">
        </div>
        <hr>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <hr>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="user_email" required>
        </div>
        <hr>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="user_password" required>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
        </div>

    </form>
	<?php
} else
	header("Location:{$_SERVER["HTTP_REFERER"]}?notAllowed&");
?>