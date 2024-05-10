<?php
//update categories
if (isset($_POST["submitUpd"])) {
	$cat_title = $_POST["cat_title"];
	$cat_id = $_GET["update"];
	$query = "UPDATE categories SET cat_title = '$cat_title' WHERE cat_id = $cat_id ";
	$update_category_query = mysqli_query($connection, $query);
	if (!$update_category_query)
		die("updating process has been failed" . mysqli_error($connection));
}

//          display selected category to update
if (isset($_GET["update"])) {
	if (bindec($_SESSION["user_role"]) & 0b100) {
		$cat_id = $_GET["update"];
		$query = "SELECT * FROM categories ";
		$query .= "WHERE cat_id = ?";
		$stmt = mysqli_prepare($connection, $query);
		mysqli_stmt_bind_param($stmt, "i", $cat_id);
		mysqli_stmt_execute($stmt);
		$select_categories = mysqli_stmt_get_result($stmt);
		mysqli_stmt_close($stmt);

		if (!$select_categories)
			die("displaying process has been failed" . mysqli_error($connection));
		while ($row = mysqli_fetch_assoc($select_categories))
			$cat_title = $row["cat_title"];
		?>
        <form action="" method="post">
            <div class="form-group">
                <label for="cat-title">Edit Category</label>
                <input type="text" class="form-control" name="cat_title"
                       value="<?php if (isset($_GET["update"])) echo $cat_title; ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submitUpd" value="Edit Category">
            </div>
        </form>

		<?php
	} else
		header("Location:$_SERVER[HTTP_REFERER]?delete=10");
}
?>