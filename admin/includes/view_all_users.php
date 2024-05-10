<?php
if (isset($_POST['checkBoxArray'])) {
	if (bindec($_SESSION["user_role"]) & 0b100) {
		foreach ($_POST["checkBoxArray"] as $user_id) {
			switch ($_POST["bulk_options"]) {
				case "Owner":
				case "Admin":
				case "Subscriber":
					$query = "UPDATE users SET user_role = '{$_POST['bulk_options']}' ";
					$query .= "WHERE user_id = $user_id";
					break;
				case "delete":
					$query = "DELETE FROM users WHERE user_id = $user_id";
					break;
				case "clone":
					$query = "SELECT * FROM users  WHERE user_id = $user_id ";
					$selected_users = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($selected_users)) {
						$user_id = $row["user_id"];
						$user_name = $row["user_name"];
						$user_password = $row["user_password"];
						$user_firstName = $row["user_firstName"];
						$user_lastName = $row["user_lastName"];
						$user_email = $row["user_email"];
						$user_image = $row["user_image"];
						$user_role = $row["user_role"];
						$user_date = date("d-M-Y h:i:s");


						$query = "INSERT INTO users(user_name,user_password,user_firstName,user_lastName,user_email,user_role,user_image,user_date) ";
						$query .= "VALUES('$user_name','$user_password','$user_firstName','$user_lastName','$user_email','$user_role','$user_image','$user_date')";
					}
			}
			mysqli_query($connection, $query);
			updateSessionData();
			header("Location:admin_users");
		}
	} else
		ownerOnly(1, 3, "admin_users");
}
if (isset($_GET["notAllowed"]))
	ownerOnly(1, 3, "admin_users");

?>
<form action="" method="post">
    <table class="table table-bordered table-hover">
		<?php if (bindec($_SESSION['user_role']) & 0b010): ?>
            <div id="bulkOptionContainer" style="padding: 0;" class="col-xs-4">
                <select name="bulk_options" class="form-control">
                    <option value="">Select Options</option>
                    <option value="0b111">Owner</option>
                    <option value="0b011">Admin</option>
                    <option value="0b001">Subscriber</option>
                    <option value="clone">Clone</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a class="btn btn-primary" href="admin_users.php?source=add_user">Add New</a>
            </div>
		<?php endif; ?>
        <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>ID</th>
            <th class="text-center">Username</th>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Role</th>
			<?php if (bindec($_SESSION['user_role']) & 0b010): ?>
                <th class="text-center">Change User Role</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
			<?php endif; ?>
        </tr>
        </thead>
        <tbody>
		<?php
		$query = "SELECT * FROM users ";
		$query .= "ORDER BY user_id DESC ";
		$select_users = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($select_users)) {
			$user_id = $row["user_id"];
			$user_name = $row["user_name"];
			$user_password = $row["user_password"];
			$user_firstName = $row["user_firstName"];
			$user_lastName = $row["user_lastName"];
			$user_email = $row["user_email"];
			$user_image = $row["user_image"];
			$user_role = $row["user_role"];
			$user_date = $row["user_date"];
			echo "<tr>";
			echo "<td><input class='checkboxes' type='checkbox' name='checkBoxArray[]' value=" . $user_id . "></td>";
			echo "<td>$user_id</td>";
			echo "<td><img src='../images/$user_image' width='60' height='90' alt=''>";
            echo "&nbsp;&nbsp; $user_name</td>";
			echo "<td>$user_firstName</td>";
			echo "<td>$user_lastName</td>";
			echo "<td>$user_email</td>";
			if (bindec($user_role) & 0b100)
				$user_role = "Owner";
            elseif (bindec($user_role) & 0b010)
				$user_role = "Admin";
            elseif (bindec($user_role) & 0b001)
				$user_role = "Subscriber";


			echo "<td>$user_role</td>";
			if (bindec($_SESSION["user_role"]) & 0b100)
				$checker = array(
					"role=0b111&pid=$user_id",
					"role=0b011&pid=$user_id",
					"role=0b001&pid=$user_id",
					"source=edit_user&userID=$user_id",
					"delete=$user_id"
				);
			else $checker = array('notAllowed', 'notAllowed', 'notAllowed', 'notAllowed', 'notAllowed');
			if (bindec($_SESSION['user_role']) & 0b010) {
				echo "<td class='col-sm-3'>
        <div class='col-sm-4'>
        <a href='admin_users.php?$checker[0]'><i class='btn fas fa-user-tie' style=' color: black; font-size: 26px; '></i></a>
        <p><b>Owner</b></p>
        </div>";
				echo "<div class='col-sm-4'>
        <a href='admin_users.php?$checker[1]'><i class='btn fas fa-user-tie' style=' color: black; font-size: 26px; '></i></a>
        <p><b>Admin</b></p>
        </div>";
				echo "<div><a href='admin_users.php?$checker[2]'><i class='btn fas fa-user ' style='  color: black;font-size: 26px;'></i></a><p><b>Subscriber</b></p></td>
        </div>";
				echo "<td  class='text-center'>
        <a class='btn btn-info' href='admin_users.php?$checker[3]'>Edit</a></td>
        <td><a onClick=\"javascript: return confirm('Are you sure want to delete'); \" class='btn btn-danger' href='admin_users.php?$checker[4]'>Delete</a>
        </td>";
				echo "</tr>";
			}
		}
		deleteUser();
		Usr_role();

		?>
        </tbody>
    </table>
</form>
