<?php // ob_start(); ?>
<?php include "includes/admin_header.php"; ?>
<div id="wrapper">
    <!-- Navigation -->
	<?php include "includes/admin_navigation.php"; ?>
	<?php
	if (isset($_GET["source"])) {
		$source = $_GET["source"];
	} else $source = null;
	switch ($source) {
		case 'add_user':
			include "includes/add_user.php";
			break;
		case 'edit_user':
			include "includes/edit_user.php";
			break;

		default:
			include "includes/view_all_users.php";
			break;
	}
	?>
    <!-- /.container-fluid -->
    <!-- /#page-wrapper -->
	<?php include "includes/admin_footer.php"; ?>
