<?php ob_start(); ?>
<?php include "includes/admin_header.php"; ?>
<div id="wrapper">
    <!-- Navigation -->
	<?php include "includes/admin_navigation.php"; ?>
	<?php
	if (isset($_GET["source"])) {
		$source = $_GET["source"];
	} else $source = null;
	switch ($source) {
		case 'add_post':
			include "includes/add_post.php";
			break;
		case 'edit':
			include "includes/edit_post.php";
			break;

		default:
			include "includes/view_all_posts.php";
			break;
	}
	?>
    <!-- /.container-fluid -->
    <!-- /#page-wrapper -->
	<?php include "includes/admin_footer.php"; ?>
