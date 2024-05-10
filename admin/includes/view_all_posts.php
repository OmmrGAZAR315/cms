<?php
$ntAllowed = false;
if (isset($_POST['checkBoxArray'])) {
	foreach ($_POST["checkBoxArray"] as $post_id) {
		if (bindec($_SESSION["user_role"]) & 0b100) {
			switch ($_POST["bulk_options"]) {
				case "Published":
				case "Unpublished":
					$query = "UPDATE posts SET post_status = '{$_POST['bulk_options']}' ";
					$query .= "WHERE post_id = $post_id";
					break;
				case "delete":
					$query = "DELETE FROM posts WHERE post_id = $post_id";
					break;
				case "clone":
					$query = "SELECT * FROM posts  WHERE post_id = $post_id ";
					$selected_posts = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($selected_posts)) {
						$post_title = $row["post_title"];
						$post_user_id = $row["post_user_id"];
						$post_author = $row["post_author"];
						$post_category_id = $row["post_category_id"];
						$post_status = $row["post_status"];
						$post_image = $row["post_image"];
						$post_tags = $row["post_tags"];
						$post_content = $row["post_content"];
						$post_date = date("d-M-Y h:i:s");

						$query = "INSERT INTO posts(post_title,post_author,post_category_id,post_user_id,post_status,post_image,post_tags,post_content,post_date)";
						$query .= "VALUES('$post_title','$post_author',$post_category_id,$post_user_id,'$post_status','$post_image','$post_tags','$post_content','$post_date')";
					}
			}
			mysqli_query($connection, $query);
			header("Location:admin_posts");
		} elseif (bindec($_SESSION['user_role']) & 0b010 && $_POST["bulk_options"] == 'delete') {
			$query = "DELETE FROM posts WHERE post_id = $post_id AND ";
			$query .= "post_user_id = {$_SESSION["userID"]} ";
			$deletedPosts = mysqli_prepare($connection, $query);
			mysqli_stmt_execute($deletedPosts);
			if (mysqli_stmt_affected_rows($deletedPosts) == 0)
				$ntAllowed = true;
			mysqli_stmt_close($deletedPosts);
		} else
			$ntAllowed = true;
	}
}
if (isset($_GET["notAllowed"]) || $ntAllowed)
	ownerOnly(1, 3, "admin_posts");

?>
<form action="" method="post">
    <table class="table table-bordered table-hover">
        <div id="bulkOptionContainer" style="padding: 0;" class="col-xs-4">
            <select name="bulk_options" class="form-control">
				<?php if (bindec($_SESSION["user_role"]) & 0b010): ?>
                    <option value="">Select Options</option>
                    <option value="Published">Publish</option>
                    <option value="Unpublished">UnPublish</option>
                    <option value="clone">Clone</option>
				<?php endif; ?>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit"
                   onClick="javascript: return confirm('Are you sure want to apply '); "
                   name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="admin_posts?source=add_post">Add New</a>
        </div>
        <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>ID</th>
            <th>Author</th>
            <th>User Name</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Views</th>
            <th>Likes</th>
            <th>Date</th>
            <th>View Post</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
		<?php
		if (bindec($_SESSION["user_role"]) & 0b010)
			$query = "SELECT * FROM posts ";
		else
			$query = "SELECT * FROM posts WHERE post_user_id = {$_SESSION['userID']} ";

		$query .= "ORDER BY post_id DESC ";
		$select_posts = mysqli_query($connection, $query);
		if (mysqli_num_rows($select_posts) == 0)
			echo "</table><h3 class='text-center bg-warning'>No Posts</h3>";
		else {
			while ($row = mysqli_fetch_assoc($select_posts)) {
				$post_id = $row["post_id"];
				$post_author = $row["post_author"];
				$post_title = $row["post_title"];
				$post_category_id = $row["post_category_id"];
				$post_status = $row["post_status"];
				$post_image = $row["post_image"];
				$post_tags = $row["post_tags"];
				$post_views_count = $row["post_views_count"];
				$post_date = $row["post_date"];
				$post_likes = $row["post_likes"];

				$post_user_id = $row["post_user_id"] ?? 0;
				$query = "SELECT user_firstName FROM users WHERE user_id = $post_user_id ";
				$selected_user = mysqli_query($connection, $query);
				if (mysqli_num_rows($selected_user) == 0)
					$user_firstName = 'NA';
				else $user_firstName = mysqli_fetch_assoc($selected_user)['user_firstName'];

				echo "<tr>";
				echo "<td><input class='checkboxes' type='checkbox' name='checkBoxArray[]' value=" . $post_id . "></td>";
				echo "<td class='bg-info'>$post_id</td>";
				echo "<td>$post_author</td>";
				echo "<td>$user_firstName</td>";
				echo "<td>$post_title</td>";

				$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
				$foreignKey = mysqli_query($connection, $query);
				if (mysqli_num_rows($foreignKey) == 0)
					echo "<td>-</td>";
				if ($row = mysqli_fetch_assoc($foreignKey)) {
					$cat_title = $row['cat_title'];
					echo "<td>" . (empty($cat_title) ? "-" : $cat_title) . "</td>";
				}
				if ($post_status == 'Published')
					echo "<td class='bg-success'>$post_status";
				else
					echo "<td class='bg-warning'>$post_status";

				if (bindec($_SESSION["user_role"]) & 0b100)
					$checker = array(
						"pub=$post_id",
						"unpub=$post_id",
					);
				else $checker = array('notAllowed', 'notAllowed');

				echo "<a class='btn btn-success' href='admin_posts?$checker[0]'>Publish</a><br><br>
                    <a class='btn btn-danger' href='admin_posts?$checker[1]' >Unpublish</a>
                    </td>";
				echo "<td><img src='../images/$post_image' width='100px'></td>";
				echo "<td>$post_tags</td>";

				$query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'Approved' ";
				$comment_nums = mysqli_query($connection, $query);
				$post_comments_count = mysqli_num_rows($comment_nums);


				echo "<td><a href='admin_comments?source=viewAll&pid=$post_id'>$post_comments_count</a></td>";
				echo "<td class='text-center'>$post_views_count<br><br><a class='btn btn-default' href='admin_posts?restV=$post_id'>Reset</a></td>";
				echo "<td class='text-center'>$post_likes<br><br><a class='btn btn-default' href='admin_posts?restL=$post_id'>Reset</a></td>";
				echo "<td>$post_date</td>";
				echo "<td><a class='btn btn-primary' href='../post?pid=$post_id'>View Post</a></td>";
				echo "<td><a class='btn btn-info' href='admin_posts?source=edit&update=$post_id'>Edit</a></td>";
				echo "<td><a onClick=\"javascript: return confirm('Are you sure want to delete'); \" class='btn btn-danger' href='admin_posts?delete=$post_id'>Delete</a></td>";
				echo "</td>";
				echo "</tr>";
			}
			deletePosts();
			pubPosts();
			ResetViews();
			ResetLikes();
		}
		?>
        </tbody>
    </table>
</form>