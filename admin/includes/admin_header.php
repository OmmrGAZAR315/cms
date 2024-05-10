<?php
ob_start();
session_start();
include "../includes/db.php";
include "admin_functions.php";
if (isset($_SESSION["user_role"])) {
	if (bindec($_SESSION["user_role"]) & 0b010) {
		$query = "SELECT * FROM users WHERE user_name = '{$_SESSION['userName']}'";
		$validationProcess = mysqli_query($connection, $query);
		if ($row = mysqli_fetch_assoc($validationProcess)) {
			updateSessionData();
		}
	} elseif ($_SERVER["PHP_SELF"] != "/cms/admin/admin_posts.php"
		&& $_SERVER["PHP_SELF"] != "/cms/admin/admin_comments.php"
		&& $_SERVER["PHP_SELF"] != "/cms/admin/admin_profile.php"
		&& $_SERVER["PHP_SELF"] != "/cms/admin/admin_user_data.php"
		&& $_SERVER["PHP_SELF"] != "/cms/admin/admin_users.php"
		&& $_SERVER["PHP_SELF"] != "/cms/admin/admin_categories.php"
	) {
        die("/PersonalBlogWebsite/admin/admin_user_data.php"!=$_SERVER["PHP_SELF"]);
		header("Location:admin_user_data");
	}
} else
	header("Location:../index");
ob_end_flush();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-CMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/summernote.css">


    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link href="css/style.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        function countDownHIM(refresher) {
            document.getElementById("countDownME").innerHTML = "(" + refresher + ")";
            console.log(refresher);
            if (refresher > 0) {
                setTimeout(function () {
                    countDownHIM(refresher - 1);
                }, 1330);
            }
        }
    </script>

</head>

<body>