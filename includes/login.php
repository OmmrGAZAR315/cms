<?php
ob_start();
session_start();
include "db.php";
include "../admin/admin_functions.php";

if (isset($_POST["login"])) {
	$username = mysqli_real_escape_string($connection, $_POST["username"]);
	$password = mysqli_real_escape_string($connection, $_POST["password"]);
	$query = "SELECT * FROM users WHERE user_name = '$username' ";
	$selectUser = mysqli_query($connection, $query);
	if ($row = mysqli_fetch_assoc($selectUser)) {
		$db_id = $row["user_id"];
		$db_username = $row["user_name"];
		$db_password = $row["user_password"];
		$db_firstName = $row["user_firstName"];
		$db_lastName = $row["user_lastName"];
		$db_role = $row["user_role"];
		$db_user_email = $row["user_email"];
		$db_user_image = $row["user_image"];
	}
}
//$password = crypt($password, $db_password);

//if ($username === $db_username && $password === $db_password) {
if (password_verify($password, $db_password)) {
	$_SESSION['userID'] = $db_id;
	$_SESSION['userName'] = $db_username;
	$_SESSION['password'] = $db_password;
	$_SESSION['firstName'] = $db_firstName;
	$_SESSION['lastName'] = $db_lastName;
	$_SESSION['user_email'] = $db_user_email;
	$_SESSION['image'] = $db_user_image;
	$_SESSION['user_role'] = $db_role;
	if (bindec($db_role) & 0b100)
		header("Location:../admin/admin_index");
	else {
		$visited = visitedUser();

		echo "<script>history.go(-{$visited})</script>";
	}

} elseif (!isset($_GET['visited']))
	header("Location:../blog_List?wrongPass");
else {
	if (str_contains($_SERVER['HTTP_REFERER'], "&wrongPas")) {
		 $_SERVER['HTTP_REFERER'] = str_replace("&wrongPas", '', $_SERVER['HTTP_REFERER']);
	}
	$num = (int)substr($_SERVER['HTTP_REFERER'], -1) + 1;
	 $prevWebsite = substr($_SERVER['HTTP_REFERER'], 0, strlen($_SERVER['HTTP_REFERER']) - 1);
	header("Location:$prevWebsite$num&wrongPas");

}