<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <form action="search.php" method="post">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
            </div>
        </form> <!-- search form -->
        <!-- /.input-group -->
    </div>
	<?php if (!isset($_SESSION["userName"])) { ?>
        <div class="well">
            <form action="includes/login.php" method="post">
				<?php
				$visited = visitedUser();
				?>
                <h4><a href="login?visited=<?php echo $visited ?>">Login</a></h4>
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>
                <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                    <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Submit</button>
                </span>
                </div>
                <br>
				<?php
				$visited = visitedUser();
				?>
	            <?php
	            if (isset($_GET['wrongPass'])) {
		            echo "<h4 class='bg-danger  text-center text-uppercase'>invalid username & password</h4>";
		           echo "<br>";

	            }
	            ?>
                <a href="forgot?visited=<?php echo $visited; ?>&fg=<?php echo uniqid(true); ?>">Forgot Password?</a>


            </form> <!-- search form -->
            <!-- /.input-group -->
        </div>
	<?php } ?>
    <!-- Blog Categories Well -->
    <div class="well">
		<?php
		$query = "SELECT * FROM categories";
		$select_all_categories_query = mysqli_query($connection, $query);
		?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
					<?php
					while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
						$cat_title = $row["cat_title"];
						$cat_id = $row["cat_id"];
						echo "<li><a href=category?pid=$cat_id>$cat_title</a> </li>";
					}
					?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus
            laudantium odit aliquam repellat tempore quos aspernatur veroxs.</p>
    </div>
</div>