<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index">Home</a>
    </div>

    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="#">Users Online: <?php echo userOnline(); ?></a></li>
        <li><a href="admin_index">CMS Admin</a></li>

		<?php
		global $connection;
		$query = "SELECT * FROM users WHERE user_id = {$_SESSION['userID']}";
		$selectedUser = mysqli_query($connection, $query);
		if ($row = mysqli_fetch_assoc($selectedUser)) {
			$_SESSION['userID'] = $row["user_id"];
			$_SESSION['userName'] = $row["user_name"];
			$_SESSION['password'] = $row['user_password'];
			$_SESSION['firstName'] = $row["user_firstName"];
			$_SESSION['lastName'] = $row["user_lastName"];
			$_SESSION['user_email'] = $row["user_email"];
			$_SESSION['image'] = $row["user_image"];
			$_SESSION['user_role'] = $row["user_role"];
		} ?>


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user" style=" margin-right: 5px;"></i>
				<?php
				echo $_SESSION["firstName"] . " " . $_SESSION["lastName"];
				?> <b
                        class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="admin_profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="admin_user_data"><i class="fa fa-fw fa-dashboard"></i> My Data</a>
            </li>
			<?php if (bindec($_SESSION["user_role"]) & 0b10): ?>
                <li>
                    <a href="admin_index"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
			<?php endif; ?>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i
                            class="fa fa-fw fa-arrows-v"></i> Posts <i
                            class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts_dropdown" class="collapse">
                    <li>
                        <a href="admin_posts">View All Posts</a>
                    </li>
                    <li>
                        <a href="admin_posts?source=add_post">Add Posts</a>
                    </li>
                </ul>
            </li>
			<?php if (bindec($_SESSION["user_role"]) & 0b10): ?>
                <li>
                    <a href="admin_categories"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                </li>
			<?php endif; ?>
            <li>
                <a href="admin_comments"><i class="fa fa-fw fa-file"></i> Comments</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i
                            class="fa fa-fw fa-arrows-v"></i> Users <i
                            class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="admin_users">View All Users</a>
                    </li>
                    <li>
                        <a href="admin_users?source=add_user">Add User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="admin_profile"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav> <!-- navbar navbar-inverse navbar-fixed-top -->
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
				<?php if ($_SERVER['PHP_SELF'] == '/cms/admin/admin_posts.php' && isset($_GET['source']) && $_GET['source'] == 'edit'): ?>
                <h1 class="page-header text-center">
                    Edit your post
					<?php elseif ($_SERVER['PHP_SELF'] == '/cms/admin/admin_posts.php' && isset($_GET['source']) && $_GET['source'] == "add_post"): ?>
                    <h1 class="page-header text-center">
                        Add a post
						<?php elseif ($_SERVER['PHP_SELF'] == '/cms/admin/admin_posts.php'): ?>
                        <h1 class="page-header">
							<?php if (bindec($_SESSION['user_role']) & 0b010): ?>
                                All Posts
							<?php elseif (bindec($_SESSION['user_role']) & 0b01): ?>
                                all your posts
							<?php endif; ?>
							<?php elseif ($_SERVER['PHP_SELF'] == '/cms/admin/admin_users.php' && isset($_GET['source']) && $_GET['source'] == 'add_user'): ?>
                            <h1 class="page-header text-center">
                                Add a user
								<?php elseif ($_SERVER['PHP_SELF'] == '/cms/admin/admin_users.php' && isset($_GET['source']) && $_GET['source'] == "edit_user"): ?>
                                <h1 class="page-header text-center">
                                    Edit User
									<?php elseif ($_SERVER['PHP_SELF'] == '/cms/admin/admin_users.php'): ?>
                                    <h1 class="page-header">
                                        All Users
										<?php elseif ($_SERVER['PHP_SELF'] == '/cms/admin/admin_profile.php'): ?>
                                        <h1 class="page-header text-center">
                                            Edit Profile
											<?php elseif ($_SERVER['PHP_SELF'] == '/cms/admin/admin_categories.php'): ?>
                                            <h1 class="page-header">
                                                Categories
												<?php else: ?>
                                                <h1 class="page-header">
                                                    Welcome to your DashBoard
                                                    <small><?php
														echo $_SESSION["firstName"] . " " . $_SESSION["lastName"];
														?> </small>
													<?php endif; ?>

                                                </h1>
            </div>
        </div>