<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>


<!-- Navigation -->
<?php include "includes/navigation.php" ?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

			<?php
			if (isset($_POST["submit"])) {
				$search = $_POST["search"];
				$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
				$query .= "AND post_status = 'Published' ";
				$query .= "ORDER BY post_id DESC ";
				$search_query = mysqli_query($connection, $query);
				if (!$search_query)
					die("Search failed" . mysqli_error($connection));


				$count = mysqli_num_rows($search_query);
				if ($count == 0)
					echo "<h1 class='text-danger'> NO RESULT </h1>";
				else {
					while ($row = mysqli_fetch_assoc($search_query)) {
						$post_id = $row["post_id"];
						$post_title = $row["post_title"];
						$post_author = $row["post_author"];
						$post_date = $row["post_date"];
						$post_image = $row["post_image"];
						$post_content = substr($row["post_content"], 0, 400);
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
                            by <a href="index"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                        <hr>
            <a href="post?pid=<?php echo $post_id ?>">
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" width="250px"
                             height="150"></a>
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span
                                    class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
					<?php }
				}
			}
            ?>

        </div>


        <!-- Blog Sidebar Widgets Column -->
		<?php include "includes/sideBar.php" ?>


    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
	<?php include "includes/footer.php" ?>
