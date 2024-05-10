<?php
ob_start();
session_start();
include "includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include "admin/admin_functions.php"; ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS</title>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="css/homeStyle.css" rel="stylesheet">


</head>

<body>
<!-- Navigation -->
<?php include "includes/navigation.php" ?>
<img src="Images/main.jpg" alt="chair" width="100%">
<h1 class="text-center">Welcome to personal blog</h1>
<div class="hero">
    <div class="hero-text">
        <h4>THE</h4>
        <h2>best dreams happens</h2>
        <h4>WHEN YOUR AWAKE</h4>
    </div>
</div>
<hr>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h2 style="text-align: center; text-decoration: underline"><i>My latest blogs</i></h2>
			<?php

			$query = "SELECT * FROM posts WHERE post_author = 'Omar ElGazzar' ";
			$query .= "AND post_status = 'Published' ";
			$query .= "ORDER BY post_id DESC ";
			$select_all_posts_query = mysqli_query($connection, $query);
			if (mysqli_num_rows($select_all_posts_query) == 0)
				echo "<h1 class='text-center text-danger'>NO POST SORRY</h1>";

			while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
				$post_id = $row["post_id"];
				$post_title = $row["post_title"];
				$post_author = $row["post_author"];
				$post_date = $row["post_date"];
				$post_image = $row["post_image"];
				$post_content = substr($row["post_content"], 0, 400);
				$post_status = $row["post_status"];

				?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post_author?author=<?php echo $post_author ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    All posts by <a href="#"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <a href="post?pid=<?php echo $post_id ?>">
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="" width="250px"
                         height="150"></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?pid=<?php echo $post_id ?>">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>

			<?php } ?>

        </div>


        <!-- Blog Sidebar Widgets Column -->


    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
	<?php include "includes/footer.php" ?>

