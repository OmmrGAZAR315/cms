<?php
$ntAllowed = false;
if (isset($_POST['checkBoxArray'])) {
	foreach ($_POST["checkBoxArray"] as $comment_id) {
		if (bindec($_SESSION["user_role"]) & 0b100) {
			switch ($_POST["bulk_options"]) {
				case "Approved":
				case "Unapproved":
					$query = "UPDATE comments SET comment_status = '{$_POST['bulk_options']}' ";
					$query .= "WHERE comment_id = $comment_id";
					break;
				case "delete":
					$query = "DELETE FROM comments WHERE comment_id = $comment_id";
					break;
				case "clone":
					$query = "SELECT * FROM comments  WHERE comment_id = $comment_id ";
					$selected_comments = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($selected_comments)) {
						$comment_post_id = $row["comment_post_id"];
						$comment_user_id = $row["comment_user_id"];
						$comment_author = $row["comment_author"];
						$comment_email = $row["comment_email"];
						$comment_status = $row["comment_status"];
						$comment_content = $row["comment_content"];
						$post_date = date("d-M-Y h:i:s");
						$query = "INSERT INTO comments (comment_post_id,comment_user_id,comment_author,comment_email,comment_status,comment_content,comment_date)";
						$query .= "VALUES ($comment_post_id,$comment_user_id,'$comment_author','$comment_email','$comment_status','$comment_content','$post_date' ) ";
					}
			}
			mysqli_query($connection, $query);
			header("Location:admin_comments");
		} elseif
		(bindec($_SESSION['user_role']) & 0b010 && $_POST["bulk_options"] == 'delete') {
			$query = "DELETE FROM comments WHERE comment_id = $comment_id AND ";
			$query .= "comment_user_id = {$_SESSION["userID"]} ";
			$deletedComments = mysqli_prepare($connection, $query);
			mysqli_stmt_execute($deletedComments);
			if (mysqli_stmt_affected_rows($deletedComments) == 0)
				$ntAllowed = true;
			mysqli_stmt_close($deletedComments);
		} else
			$ntAllowed = true;
	}
}
if (isset($_GET["notAllowed"]) || $ntAllowed)
	ownerOnly(1, 3, "admin_comments");
?>

<form action="" method="post">

    <table class="table table-bordered table-hover">
        <div id="bulkOptionContainer" style="padding: 0;" class="col-xs-4">
            <select name="bulk_options" class="form-control">
				<?php if (bindec($_SESSION["user_role"]) & 0b010): ?>
                    <option value="">Select Options</option>
                    <option value="Approved">Approve</option>
                    <option value="Unapproved">Unapprove</option>
                    <option value="clone">Clone</option>
				<?php endif; ?>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input onClick="javascript: return confirm('Are you sure want to apply'); " type="submit" name="submit"
                   class="btn btn-success" value="Apply">
        </div>
        <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
			<?php if (bindec($_SESSION["user_role"]) & 0b010): ?>
                <th>Approve</th>
                <th>Unapprove</th>
			<?php endif; ?>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
		<?php
		if (bindec($_SESSION["user_role"]) & 0b010)
			$query = "SELECT * FROM comments ";
		else
			$query = "SELECT * FROM comments WHERE comment_user_id = {$_SESSION['userID']} ";

		$query .= "ORDER BY comment_id DESC";
		$select_comments = mysqli_query($connection, $query);
		if (mysqli_num_rows($select_comments) == 0)
			echo "</table><h3 class='text-center bg-warning'>No Comments</h3>";
		else {
			while ($row = mysqli_fetch_assoc($select_comments)) {
				$comment_id = $row["comment_id"];
				$comment_post_id = $row["comment_post_id"];
				$comment_author = $row["comment_author"];
				$comment_email = $row["comment_email"];
				$comment_content = $row["comment_content"];
				$comment_status = $row["comment_status"];
				$comment_date = $row["comment_date"];
				echo "<tr>";
				echo "<td><input class='checkboxes' type='checkbox' name='checkBoxArray[]' value=" . $comment_id . "></td>";
				echo "<td>$comment_id</td>";
				echo "<td>$comment_author</td>";
				echo "<td>$comment_content</td>";
				echo "<td>$comment_email</td>";
				echo "<td>$comment_status</td>";

				$query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
				$foreignKey = mysqli_query($connection, $query);
				if ($row = mysqli_fetch_assoc($foreignKey)) {
					$post_title = $row['post_title'];
					echo "<td><a href='../post.php?pid=$comment_post_id'>$post_title</a></td>";
				} else
					echo "<td>deleted</td>";
				echo "<td>$comment_date</td>";
				if (bindec($_SESSION["user_role"]) & 0b100)
					$checker = array(
						"approve=$comment_id&apped=$comment_status",
						"unapprove=$comment_id&apped=$comment_status");
				else $checker = array('notAllowed', 'notAllowed');
				if (bindec($_SESSION["user_role"]) & 0b010) {
					echo "<td style='text-align: center;'><a href='admin_comments?$checker[0]'><i class='btn btn-success fas fa-check text-success' style=' font-size: 24px; '></i></a></td>";
					echo "<td style='text-align: center;'><a href='admin_comments?$checker[1]'><i class='btn btn-danger fas fa-times text-danger' style=' font-size: 24px;'></i></a></td>";
				}
				echo "<td style='text-align: center;'><a  onClick=\"javascript: return confirm('Are you sure want to delete'); \"href='admin_comments?delete=$comment_id&apped=$comment_status'><i class='btn fas fa-trash text-danger' style=' font-size: 20px;;'></i></a></td>";
				echo "</tr>";

			}
			deleteComment();
			unapproveComment();
			approveComment();
		}
		?>
        </tbody>
    </table>
</form>