<?php
$query = "SELECT * FROM posts WHERE post_id = {$_GET['update']} ";
$query .= " AND post_user_id = {$_SESSION['userID']} ";
$selectedPost = mysqli_query($connection, $query);
if (bindec($_SESSION["user_role"]) & 0b100 || mysqli_num_rows($selectedPost) != 0) {
	if (isset($_GET["update"])) {
		$post_id = $_GET['update'];
		$query = "SELECT * FROM posts WHERE post_id = $post_id";
		$selectedPost = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($selectedPost);

		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_category_id = $row['post_category_id'];
		$post_status = $row['post_status'];
		$post_image = $row['post_image'];
		$post_tags = $row['post_tags'];
		$post_content = $row['post_content'];
		$post_date = $row['post_date'];
	}

	if (isset($_POST['create_post'])) {
		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];

		$post_image_temp = '';
		if (isset($_POST['deleteImg']))
			$post_image = null;
        elseif (!empty($_FILES['image']['name'])) {
			$post_image = $_FILES['image']['name'];
			$post_image_temp = $_FILES['image']['tmp_name'];
		}


		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date("d-M-Y h:i:s");
		move_uploaded_file($post_image_temp, "../images/$post_image");
		$query = "UPDATE posts SET
                 post_title='$post_title',
                 post_author='$post_author',
                 post_category_id=$post_category_id,
                 post_status='$post_status',";
		if ($post_image == null)
			$query .= "post_image=NULL,";
		else
			$query .= "post_image='$post_image',";

		$query .= "post_tags='$post_tags',
                 post_content='$post_content',
                 post_date='$post_date' ";
		$query .= "WHERE post_id = $post_id";
		$post_query = mysqli_query($connection, $query);
		echo "Post Edited: <a href='../post?pid=$post_id'>View Post</a>";
		echo " or <a href='admin_posts'>View All Posts</a>";


	}

	?>

    <form style="margin: 0 20%" class=action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
        </div>
        <hr>
        <div>
            <label for="post categories">Post Categories &nbsp;</label>
            <select name="post_category">
				<?php
				$query = "SELECT * FROM categories";
				$select_category = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_assoc($select_category)) {

					if ($row["cat_id"] == $post_category_id)
						echo "<option selected value='{$row['cat_id']}'>{$row['cat_title']}</option>";
					else
						echo "<option value='{$row['cat_id']}'>{$row['cat_title']}</option>";
				}
				?>
            </select>
        </div>
        <hr>
        <div class="form-group">
            <label for="title">Post Author</label>
            <input type="text" class="form-control" name="author" value="<?php echo $post_author ?>">
        </div>
        <hr>
        <div class="form-group">
            <select name="post_status">
				<?php
				echo "<option value='$post_status'>$post_status</option>";
				if ($post_status == "Published")
					echo "<option value='Unpublished'>Unpublished</option>";
				else echo "<option value='Published'>Published</option>";

				?>
            </select>
        </div>
        <hr>
        <div class="form-group">
            <label for="post_image">Old Image</label>
            <br>
            <img src="../images/<?php echo $post_image; ?>" width="200" alt="image here">
            <br>
            <label for="">Delete
                <input type="radio" name="deleteImg"></label>
            <br>
        </div>
        <div class="form-group">
            <label for="post_image">Change Image</label>
            <input type="file" name="image">
        </div>
        <hr>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
        </div>
        <hr>
        <div class="form-group">
            <label for="post_tags">Post Content</label>
            <textarea class="form-control" id="summernote" name="post_content" cols="30"
                      rows="10"><?php echo $post_content ?></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
        </div>
    </form>
<?php } else
	header("Location:{$_SERVER["HTTP_REFERER"]}?notAllowed");
?>