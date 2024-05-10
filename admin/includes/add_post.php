<?php
if (isset($_POST['create_post'])) {
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category_id = $_POST['post_category'];
	$post_status = empty($_POST['post_status']) ? 'Unpublished' :
		$_POST['post_status'];
	$post_image = $_FILES['image']['name'];
	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_date = date("d-M-Y h:i:s");

	if (!file_exists("../images/$post_image")) {
		$post_image_temp = $_FILES['image']['tmp_name'];
		move_uploaded_file($post_image_temp, "../images/$post_image");
	}
	$query = "INSERT INTO posts(post_title,post_author,post_category_id,post_user_id,post_status,post_image,post_tags,post_content,post_date,post_likes)";
	$query .= "VALUES('$post_title','$post_author','$post_category_id',
	{$_SESSION['userID']},'$post_status','$post_image','$post_tags','$post_content','$post_date',0)";

	$selectedPost = mysqli_query($connection, $query);

	$query = "SELECT LAST_INSERT_ID() ";
	$selected_LAST_Post = mysqli_query($connection, $query);
	if ($row = mysqli_fetch_assoc($selected_LAST_Post)) {
		$post_id = $row["LAST_INSERT_ID()"];
		echo "<span class='bg-success'>Post added: <a href='../post?pid=$post_id'>View Post</a>";
		echo " or <a href='admin_posts'>View All Posts</a></span>";
	}
}
?>

<form action="" style="margin: 0 20%" method="post" enctype="multipart/form-data">
    <div class="form-group">

        <label for="title">Post Title</label>
            <input required type="text" class="form-control" name="title">
    </div>
    <div>
        <hr>
        <select name="post_category">
			<?php
			$query = "SELECT * FROM categories ";
			$select_categories = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($select_categories))
				echo "<option value='{$row['cat_id']}'>{$row['cat_title']}</option>";
			?>
        </select>
    </div>
    <hr>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input required type="text" class="form-control" name="author">
    </div>
    <hr>
	<?php if (bindec($_SESSION["user_role"]) & 0b100): ?>
        <div class="form-group">
            <select name="post_status">
                <option value="Unpublished" hidden>Post Status</option>
                <option value="Published">Published</option>
                <option value="Unpublished">Unpublished</option>
            </select>
        </div>
	<?php endif; ?>
    <hr>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input required type="file" name="image">
    </div>
    <hr>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input required type="text" class="form-control" name="post_tags">
    </div>
    <hr>
    <div class="form-group">
        <label for="post_tags">Post Content</label>
        <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10"
        ></textarea>
    </div>

    <div class="form-group">
        <input required class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>