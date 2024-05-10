<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index">Home</a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="blog_List">Blog List</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
				<?php
				$query = "SELECT * FROM categories";
				$select_all_categories_query = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
					$cat_title = $row["cat_title"];
					$cat_id = $row["cat_id"];

					$category_class = '';
					$pageName = basename($_SERVER["PHP_SELF"]);
					if (isset($_GET["pid"]) && $_GET["pid"] == $cat_id)
						$category_class = 'active';


					echo "<li class='$category_class'><a href='category?pid=$cat_id'>$cat_title</a> </li>";
				} ?>
                <li><a href="admin/admin_index">Admin</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="about">About</a></li>
				<?php
				if (isset($_SESSION["user_role"]) && bindec($_SESSION["user_role"]) & 0b100) {
					if (isset($_GET["pid"])) {
						echo "<li><a href='admin/admin_posts?source=edit&update={$_GET['pid']}' style='background-color: green; color: white'>Edit Post</a></li>";
					}
				}
				?>
            </ul>
            <ul class="nav navbar-right top-nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user">
							<?php
							if (isset($_SESSION["firstName"]))
								echo "{$_SESSION['firstName']} {$_SESSION['lastName']}";
							else echo "Guest"; ?>
                        </i>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-fw fa-user"></i> <?php
								if (isset($_SESSION["firstName"]))
									echo "<a href='admin/admin_profile'>Profile</a>";
								else {
									$visited = visitedUser();
									switch ($_SERVER["PHP_SELF"]) {
										case ('/cms/login.php') :
											echo "<a href='registration?visited=$visited'>Sign Up</a>";
											break;
										case ('forgot.php'):
										case('/cms/registration.php'):
											echo "<a href='login?visited=$visited'>Sign In</a>";
											break;
										default:
											echo "<a href='login?visited=$visited'>Sign In</a>";
											echo "<li class='divider'></li>";
											echo "<li><a href='registration?visited=$visited'>Sign Up</a></li>"; ?>
										<?php }
								}
								?>

                            </a>
                        </li>
						<?php if (isset($_SESSION["firstName"])): ?>
                            <li class="divider"></li>
                            <li><a href="includes/logout.php"><i
                                            class="fa fa-fw fa-power-off"></i>Log Out</a>
                            </li>
						<?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>        <!-- /.navbar-collapse -->    </div>    <!-- /.container --></nav>