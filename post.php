<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>


<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<?php

if (isset($_POST['likeUnlike'])) {
	$likeUnlike = $_POST['likeUnlike'];
	$post_id = $_GET["pid"];
	$userID = $_SESSION['userID'];
	$liked = $_POST['liked'];

	//Updating
	$query = "UPDATE posts SET post_likes = post_likes+$likeUnlike WHERE post_id = $post_id";
	mysqli_query($connection, $query);

	if ($liked) {
		$query = "DELETE FROM likes WHERE like_user_id=$userID AND like_post_id=$post_id";
		echo "done";
	} else {
		$query = "INSERT INTO likes(like_user_id,like_post_id) VALUES($userID,$post_id)";
		echo "deleted";
	}
	$stmt = mysqli_query($connection, $query);
}

?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- display selected post -->
			<?php if (isset($_GET["pid"])) {
				$post_id = $_GET["pid"];
				$userID = $_SESSION['userID'] ?? 0;


				$query = "UPDATE posts SET post_views_count = post_views_count +1 ";
				$query .= "WHERE post_id = $post_id ";
				$increment_views_query = mysqli_query($connection, $query);

				$query = "SELECT * FROM likes WHERE like_post_id =$post_id AND like_user_id=$userID";
				$selectedLike = mysqli_query($connection, $query);
				$liked = mysqli_num_rows($selectedLike) > 0 ? 1 : 0;


				$query = "SELECT * FROM posts WHERE post_id = $post_id";
				$select_all_posts_query = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
					$post_title = $row["post_title"];
					$post_author = $row["post_author"];
					$post_date = $row["post_date"];
					$post_image = $row["post_image"];
					$post_content = $row["post_content"];
					$post_likes = $row["post_likes"];
				}
				?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="post_author?author=<?php echo $post_author ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>
			<?php } ?>
            <div class="row">
				<?php if (UserLoginIn()): ?>
					<?php if (!$liked): ?>
                        <p class=" pull-right" style="font-size: 25px"><a class="like" href="">
                                <span class="glyphicon glyphicon-thumbs-up"
                                      data-toggle="tooltip"
                                      data-placement="top"
                                      title="Want to like it?"
                                ></span> Like</a>
                        </p>
					<?php else: ?>
                        <p class=" pull-right" style="font-size: 25px"><a class="dislike" href="">
                                <span class="glyphicon glyphicon-thumbs-down"
                                      data-toggle="tooltip"
                                      data-placement="top"
                                      title="I liked this before"
                                ></span> Dislike</a>
                        </p>
					<?php endif; ?>
				<?php else: ?>
                <h4 class=" pull-right"><br>you need to login to like
                    <a style="text-decoration: underline" href="login?visited=<?php echo $visited; ?>">Login</a>

					<?php endif; ?>
            </div>
            <div class="row">
                <p class="pull-right" style="font-size: 25px">Likes: <?php echo $post_likes ?></p>
            </div>
            <div class="clearfix"></div>
            <!-- submitComment -->
			<?php
			if (isset($_POST["submitComment"])) {
				$comment_author = $_POST["author"];
				$comment_email = $_POST["email"];
				$comment_content = $_POST["getComment"];
				$post_date = date("d-M-Y h:i:s");
				$insert_Comment_query = "INSERT INTO comments (comment_post_id,comment_user_id,comment_author,comment_email,comment_status,comment_content,comment_date)";
				$insert_Comment_query .= "VALUES ($post_id,{$_SESSION['userID']},'$comment_author','$comment_email','Unapproved','$comment_content','$post_date' ) ";
				mysqli_query($connection, $insert_Comment_query);

			}
			?>
            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
				<?php if (isset($_POST['submitComment']))
					echo "<p>Your Message has been submitted and waiting approval</p>";
				?>
                <h4><b>Leave a Comment:</b></h4>
                <form role="form" method="post">

                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input class="form-control" name="author" required></input>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" required></input>
                    </div>
                    <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea class="form-control" id="summernote" name="getComment" rows="3"
                                  required></textarea>
                    </div>
					<?php if (UserLoginIn()): ?>
                        <button type="submit" name="submitComment" class="btn btn-primary">Submit</button>
					<?php else: ?>
                    <h4><br>you need to login to comment
                        <a style="text-decoration: underline" href="login?visited=<?php echo $visited; ?>">Login</a>
						<?php endif; ?>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
			<?php
			$query = " SELECT * FROM comments ";
			$query .= " INNER JOIN users ON comments.comment_user_id = users.user_id";
			$query .= " WHERE comment_post_id = $post_id AND comment_status = 'Approved' ORDER BY comment_id DESC ";
			$post_comments = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($post_comments)) {
				$comment_author = $row['comment_author'];
				$comment_content = $row['comment_content'];
				$comment_date = $row['comment_date'];
				$user_image = $row['user_image'];
				?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img width='60' height='90' class="media-object" src="images/<?php echo $user_image ?>"
                             alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
							<?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
						<?php echo $comment_content; ?>
                    </div>
                </div>


			<?php } ?>


        </div>


        <!-- Blog Sidebar Widgets Column -->
		<?php include "includes/sideBar.php" ?>


    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
	<?php include "includes/footer.php" ?>
    <script>
        $(document).ready(function () {
            $("[data-toggle='tooltip']").tooltip();
            $('.like').click(function () {
                $.ajax({
                    url: "post?pid=<?php echo $post_id;?>",
                    type: 'post',
                    data: {
                        'likeUnlike': 1,
                        'liked':<?php echo $liked ?>
                    }
                });
            });
            $('.dislike').click(function () {
                $.ajax({
                    url: "post?pid=<?php echo $post_id;?>",
                    type: 'post',
                    data: {
                        'likeUnlike': -1,
                        'liked':<?php echo $liked ?>
                    }
                });
            });
        });
    </script>
