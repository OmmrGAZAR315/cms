<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
	<?php include "includes/admin_navigation.php"; ?>

    <!-- /.row -->
	<?php
	/////////////////////POSTS///////////////////////
	$query = "SELECT COUNT(case
                WHEN post_status ='Published' AND post_user_id = '{$_SESSION['userID']}'
                    THEN post_id
            END) AS published_num,

            COUNT(case
                WHEN post_status = 'Unpublished' AND post_user_id = '{$_SESSION['userID']}'
                    THEN post_id
            END) AS unpublished_num FROM posts";

	$selectedPosts = mysqli_query($connection, $query);
	if ($row = mysqli_fetch_assoc($selectedPosts)) {
		$number_of_pub_posts = $row['published_num'];
		$number_of_unpub_posts = $row['unpublished_num'];
	}
	//////////////COMMENTS/////////////////////////////
	$query = "SELECT COUNT(case
                WHEN comment_status ='Approved' AND comment_user_id={$_SESSION['userID']} THEN comment_id
            END) AS approved_num,

            COUNT(case
                WHEN comment_status = 'Unapproved' AND comment_user_id={$_SESSION['userID']} THEN comment_id
            END) AS unapproved_num FROM comments";

	$selectedPosts = mysqli_query($connection, $query);
	if ($row = mysqli_fetch_assoc($selectedPosts)) {
		$number_of_Appr_comments = $row['approved_num'];
		$number_of_UnAppr_comments = $row['unapproved_num'];
	}
	////////////////////////CATEGORIES///////////////////////////////
	$query = "SELECT COUNT(cat_id) AS number_of_categories FROM categories";
	$selectedCategories = mysqli_query($connection, $query);
	if ($row = mysqli_fetch_assoc($selectedCategories))
		$number_of_categories = $row['number_of_categories'];
	?>

    <!-- /.row -->

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <a class="panel-primary" href="admin_posts">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php
									echo $number_of_pub_posts + $number_of_unpub_posts;
									?></div>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                <a class="panel-green" href="admin_comments">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'>
									<?php
									echo $number_of_Appr_comments + $number_of_UnAppr_comments;
									?>
                                </div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-red">
                <a class="panel-red" href="admin_categories">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'>
									<?php
									echo $number_of_categories;
									?>
                                </div>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Data', 'Count'],
					<?php
					$elementText = ["Active Posts", "Unpublished Posts", "Approved Comments", "Unapproved Comments",  "Categories"];
					$elementCount = [$number_of_pub_posts, $number_of_unpub_posts, $number_of_Appr_comments, $number_of_UnAppr_comments, $number_of_categories];
					for ($i = 0; $i < count($elementText); $i++)
						echo "['$elementText[$i]', $elementCount[$i] ],";
					?>
                ]);

                var options = {
                    chart: {
                        title: '',
                        subtitle: '',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        <div id="columnchart_material" style="width:auto; height: 53vh;"></div>


    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>


