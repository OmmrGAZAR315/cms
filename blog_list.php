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
			$query = "SELECT * FROM posts ";
			$query .= "WHERE post_status = 'Published'";
			$posts_rows = mysqli_query($connection, $query);
			$post_counts = mysqli_num_rows($posts_rows);


			$pageMax = 4;
			$post_counts = ceil($post_counts / $pageMax);


			if (isset($_GET["page"]))
				$page = $_GET["page"];
			else $page = "";

			if ($page == "" || $page == 1)
				$page = 0;
			else
				$page = ($page * $pageMax) - $pageMax;


			$query = "SELECT * FROM posts ";
			$query .= "WHERE post_status = 'Published' ORDER BY post_id DESC LIMIT $page, $pageMax";
			$select_all_posts_query = mysqli_query($connection, $query);
			if (mysqli_num_rows($select_all_posts_query) == 0)
				echo "<h1 class='text-center text-danger'>NO POST SORRY</h1>";

			while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
				$post_id = $row["post_id"];
				$post_user_id = $row["post_user_id"];
				$post_title = $row["post_title"];
				$post_author = $row["post_author"];
				$post_date = $row["post_date"];
				$post_image = $row["post_image"];
				$post_content = substr($row["post_content"], 0, 400);
				$post_status = $row["post_status"];

				$ownerPost = '';
				$query = "SELECT user_role FROM users WHERE user_id = $post_user_id";
				$selectUser = mysqli_query($connection, $query);
				if (mysqli_num_rows($selectUser) >= 1) {
					if ($row = mysqli_fetch_assoc($selectUser))
						if (bindec($row['user_role']) & 0b100)
							$ownerPost = "an Owner's Post";
				}
				?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
				<?php echo "<h3>$ownerPost</h3>" ?>
                <h2>
                    <a href="post?pid=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="post_author?author=<?php echo $post_author; ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <a href="post?pid=<?php echo $post_id ?>">
                    <img class="img-responsive" src="images/<?php echo imgChecker($post_image); ?>" alt="" width="250px"
                         height="150"></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post?pid=<?php echo $post_id ?>">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
			<?php } ?>
        </div>


        <!-- Blog Sidebar Widgets Column -->
		<?php include "includes/sideBar.php" ?>


    </div>
    <!-- /.row -->

    <hr>
    <ul class='pager'>
		<?php
		for ($i = 1; $i <= $post_counts; $i++) {
			echo "<li><a href='index?page=$i'>$i</a></li>";

		}
		?>
    </ul>

    <!-- Footer -->
	<?php include "includes/footer.php" ?>
