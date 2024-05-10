<?php
function insertCategories()
{
	global $connection;
	if (isset($_POST["submit"])) {
		if (bindec($_SESSION["user_role"]) & 0b100) {
			if (empty($_POST["cat_title"]))
				echo "<h3 class='text-danger text-capitalize' > this filed should not be empty</h3>";
			else {
				$cat_title = $_POST['cat_title'];
				$query = "INSERT INTO categories (cat_title)";
				$query .= "VALUES ('$cat_title') ";
				$create_category_query = mysqli_query($connection, $query);
				if (!$create_category_query)
					die("insertion has been failed" . mysqli_error($connection));
			}
		} else
			ownerOnly(2, 3, 'admin_categories');
	}
}

function readAllCategories()
{
	global $connection;
	$query = "SELECT * FROM categories";
	$select_categories = mysqli_query($connection, $query);
	if (!$select_categories)
		die("displaying process has been failed" . mysqli_error($connection));
	$ownerAction = array("notAllowed", "notAllowed");
	while ($row = mysqli_fetch_assoc($select_categories)) {
		$cat_id = $row["cat_id"];
		$cat_title = $row["cat_title"];
		echo "<tr>";
		echo "<td>$cat_id</td>";
		echo "<td>$cat_title";
		if (bindec($_SESSION['user_role']) & 0b100)
			$ownerAction = array("update=$cat_id", "delete=$cat_id");
		echo "<a href='admin_categories?$ownerAction[0]'><i class='fas fa-edit' style='margin-left:15px; float:right;'></i></a>";
		echo "<a href='admin_categories?$ownerAction[1]'><i class='fas fa-trash text-danger' style=' float:right;'></i></a></td>";
		echo "</td>";
		echo "</tr>";
	}
	if (isset($_GET["delete"])) {
		if (bindec($_SESSION["user_role"]) & 0b100) {
			$cat_id = $_GET["delete"];
			$query = "DELETE FROM categories WHERE cat_id = $cat_id ";
			mysqli_query($connection, $query);
			header("Location:admin_categories");
		} else ownerOnly(2, 3, "admin_categories");
	}
}


function deletePosts()
{
	global $connection;
	if (isset($_GET["delete"])) {
		$post_id = $_GET["delete"];
		$query = "DELETE FROM posts WHERE post_id = $post_id";
		if ($_SESSION['user_role'] == '0b011')
			$query .= " AND post_user_id = {$_SESSION['userID']} ";
		$deletePosts = mysqli_prepare($connection, $query);
		mysqli_stmt_execute($deletePosts);
		if (mysqli_stmt_affected_rows($deletePosts) == 0)
			header("Location:admin_posts?notAllowed&");
		else
			header("Location:admin_posts");

	}
}

function pubPosts()
{
	global $connection;
	if (isset($_GET["pub"]) || isset($_GET["unpub"])) {
		if (bindec($_SESSION['user_role']) & 0b100) {
			$post_id = $_GET["pub"] ?? $_GET["unpub"];
			$query = "UPDATE posts SET post_status='";
			$query .= isset($_GET['pub']) ? 'Published' : 'Unpublished';
			$query .= "' WHERE post_id = $post_id";
			mysqli_query($connection, $query);
			header("Location:admin_posts");
		} else
			header("Location:admin_posts?notAllowed&");
	}
}

function ResetViews()
{
	global $connection;
	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["restV"])) {
		if (bindec($_SESSION['user_role']) & 0b100) {
			$post_id = $_GET["restV"];
			$query = "UPDATE posts SET post_views_count = 0 ";
			$query .= "WHERE post_id = $post_id";
			mysqli_query($connection, $query);
			header("Location:admin_posts");
		} else ownerOnly(3, 3, "admin_posts", "don't play with me ya hebeby");
	}
}

function ResetLikes()
{
	global $connection;
	if (isset($_GET["restL"])) {
		if (bindec($_SESSION['user_role']) & 0b100) {
			$post_id = $_GET["restL"];
			$query = "UPDATE posts SET post_likes = 0 ";
			$query .= "WHERE post_id = $post_id";
			mysqli_query($connection, $query);

			$query = "DELETE FROM likes";
			mysqli_query($connection, $query);

			header("Location:admin_posts");
		} else ownerOnly(3, 3, "admin_posts", "don't play with me ya hebeby");
	}
}

function deleteComment()
{
	global $connection;
	if (isset($_GET["delete"])) {
		$comment_id = $_GET["delete"];
		$query = "DELETE FROM comments WHERE comment_id = $comment_id ";
		if ($_SESSION['user_role'] == '0b011')
			$query .= " AND comment_user_id = {$_SESSION['userID']} ";
		$deleteComments = mysqli_prepare($connection, $query);
		mysqli_stmt_execute($deleteComments);
		if (mysqli_stmt_affected_rows($deleteComments) == 0)
			header("Location:admin_comments?notAllowed&");
		else
			if (isset($_GET["source"]) && $_GET["source"] == 'viewAll')
				header("Location:admin_comments?source=viewAll&pid={$_GET['pid']}");
			else header("Location:admin_comments");
	}
}

function approveComment()
{
	global $connection;
	if (isset($_GET["approve"])) {
		if (bindec($_SESSION['user_role']) & 0b100) {
			$comment_id = $_GET["approve"];
			$query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $comment_id ";
			mysqli_query($connection, $query);
			header("Location:admin_comments");
		} else ownerOnly(3, 3, "admin_users", "don't play with me ya hebeby");
	}
}

function unapproveComment()
{
	global $connection;
	if (isset($_GET["unapprove"])) {
		if (bindec($_SESSION['user_role']) & 0b100) {
			$comment_id = $_GET["unapprove"];
			$query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $comment_id ";
			mysqli_query($connection, $query);
			header("Location:admin_comments");
		} else ownerOnly(3, 3, "admin_users", "don't play with me ya hebeby");
	}
}

function Usr_role()
{
	global $connection;
	if (isset($_GET["role"])) {
		if (bindec($_SESSION['user_role']) & 0b100) {
			$user_status = $_GET["role"];
			$user_id = $_GET["pid"];
			$query = "UPDATE users SET user_role = '$user_status' WHERE user_id = $user_id ";
			mysqli_query($connection, $query);
			header("Location:admin_users");
		} else ownerOnly(3, 3, "admin_users", "don't play with me ya hebeby");
	}
}

function subsUser()
{
	global $connection;
	if (isset($_GET["roleS"])) {
		$user_id = $_GET["roleS"];
		$query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $user_id ";
		$user_subs_query = mysqli_query($connection, $query);
		updateSessionData();
		header("Location:admin_users");
	}
}

function deleteUser()
{
	global $connection;
	if (isset($_GET["delete"])) {
		if (bindec($_SESSION['user_role']) & 0b100) {
			$user_id = $_GET["delete"];
			$query = "DELETE FROM users WHERE user_id = $user_id ";
			$user_delete_query = mysqli_query($connection, $query);
			updateSessionData();
			header("Location:admin_users");
		} else ownerOnly(3, 3, "admin_users", "don't play with me ya hebeby");
	}
}

function assigningUserDataPOST()
{
	global $user_name, $user_password, $user_firstName, $user_lastName, $user_image, $user_image_temp, $user_email, $user_role, $user_date, $pass_char, $user_password_old;

	$user_name = $_POST['username'];
	$user_password =
		substr($_POST['user_password'], 0, $pass_char) == substr($user_password_old, 0, $pass_char) ? null : $_POST['user_password'];

	if ($user_password != null) {
		$pass_char = strlen($user_password);
		$user_password = password_hash($user_password, PASSWORD_BCRYPT, array("cost" => 12));
	}

	$user_firstName = $_POST['user_firstName'];
	$user_lastName = $_POST['user_lastName'];

	if (isset($_POST['deleteImg']))
		$user_image = null;
	elseif (!empty($_FILES['image']['name'])) {
		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];
	} else {
		$user_image_temp = '';
		$user_image= "default.jpg";
	}

	move_uploaded_file($user_image_temp, "../images/$user_image");

	$user_email = $_POST['user_email'];
	$user_role = $_POST['user_role'];
	$user_date = date("d-M-Y h:i:s");

}

function updateSessionData($userID = null)
{
	if ($userID == null)
		$userID = $_SESSION['userID'];
	global $connection;
	$query = "SELECT * FROM users WHERE user_id = {$userID}";
	$selectedUser = mysqli_query($connection, $query);
	if ($row = mysqli_fetch_assoc($selectedUser)) {
		$_SESSION['userID'] = $row["user_id"];
		$_SESSION['userName'] = $row["user_name"];
		$_SESSION['password'] = $row['user_password'];
		$_SESSION['firstName'] = $row["user_firstName"];
		$_SESSION['lastName'] = $row["user_lastName"];
		$_SESSION['user_email'] = $row["user_email"];
		$_SESSION['image'] = $row["user_image"];
		$_SESSION['user_role'] = $row["user_role"];
		$_SESSION['pass_char'] = $row["pass_char"];
	} else {
		$_SESSION['userID'] = null;
		$_SESSION['userName'] = null;
		$_SESSION['password'] = null;
		$_SESSION['firstName'] = null;
		$_SESSION['lastName'] = null;
		$_SESSION['user_email'] = null;
		$_SESSION['image'] = null;
		$_SESSION['user_role'] = null;
		$_SESSION['pass_char'] = null;
	}
}

function userOnline()
{
	global $connection;
	if ($_SESSION["userID"] != null) {
		$session = $_SESSION["userID"];
		$time = time();
		$time_out = $time - 20;
		$query = "SELECT * FROM users_online WHERE users_session = '$session' ";
		$select_users_online = mysqli_query($connection, $query);
		$num = mysqli_num_rows($select_users_online);
		if ($num == null)
			mysqli_query($connection, "INSERT INTO users_online(users_session,users_time) VALUES('$session',$time)");
		else
			mysqli_query($connection, "UPDATE users_online SET users_time = $time WHERE users_session = '$session'");


		$query = "SELECT * FROM users_online WHERE users_time > $time_out ";
		$online_users = mysqli_query($connection, $query);
		return mysqli_num_rows($online_users);
	}
}

function ownerOnly($header, $refresher, $url, $msg = "Sorry you not allowed to do this action")
{
	echo "<h{$header} class='text-center bg-danger text-danger text-capitalize'>$msg<span  id='countDownME'> </span> </h{$header}>";
	echo "<script> countDownHIM(" . $refresher . "); </script>";
	header("Refresh:  " . $refresher + 0.3 . " ; url=" . $url . " ");

}

function imgChecker($post_image = '')
{
	if (empty($post_image))
		return "default.jpg";
	else return $post_image;
}

function visitedUser()
{
	if (isset($_GET['visited']))
		return $_GET['visited'] + 1;
	return 1;

}

function UserLoginIn()
{
	if (isset($_SESSION['userID']))
		return true;
	else {
		visitedUser();
		return false;
	}
}

?>