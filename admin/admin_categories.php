<?php //ob_start(); ?>
<?php include "includes/admin_header.php"; ?>
<div id="wrapper">
    <!-- Navigation -->
	<?php include "includes/admin_navigation.php"; ?>
    <div class="col-xs-6">
        <!-- INSERTing categories -->
		<?php if (isset($_GET["notAllowed"]))
			ownerOnly(2, 3, "admin_categories"); ?>
		<?php insertCategories(); ?>
		<?php if (bindec($_SESSION['user_role']) & 0b010): ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="cat-title">Add Category</label>
                    <input type="text" class="form-control" name="cat_title">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                </div>
            </form>
		<?php endif; ?>
        <!-- Edit Categories -->
		<?php include "includes/edit_categories.php" ?>
    </div>
    <div class="col-xs-6">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category Title</th>
            </tr>
            </thead>
            <tbody>
            <!-- READing categories -->
			<?php readAllCategories(); ?>
            </tbody>
        </table>
    </div>
    <!-- /.row -->
    <!-- /.container-fluid -->
    <!-- /#page-wrapper -->
	<?php include "includes/admin_footer.php"; ?>
