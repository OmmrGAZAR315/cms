<?php //ob_start(); ?>
<?php include "includes/admin_header.php"; ?>
<div id="wrapper">
    <!-- Navigation -->
	<?php include "includes/admin_navigation.php"; ?>
	<?php
	if (isset($_GET["source"]))
		$source = $_GET["source"];
	else $source = null;
	switch ($source) {
		case "viewAll":
			include "includes/post_comments.php";
			break;
		default:
			include "includes/view_all_comments.php";
			break;
	}
	?>
    <!-- /.container-fluid -->
    <!-- /#page-wrapper -->
	<?php include "includes/admin_footer.php"; ?>
