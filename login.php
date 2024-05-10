<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<!-- Navigation -->

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                            <h3><i class="fa fa-user fa-4x"></i></h3>
                            <h2 class="text-center">Login</h2>
                            <div class="panel-body">


                                <form action="includes/login.php?visited=<?php echo $_GET['visited']; ?>"
                                      id="login-form"
                                      role="form" autocomplete="off"
                                      class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-user color-blue"></i></span>

                                            <input name="username" type="text" class="form-control" required
                                                   placeholder="Enter Username">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-lock color-blue"></i></span>
                                            <input name="password" type="password" class="form-control" required
                                                   placeholder="Enter Password">
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <input name="login" class="btn btn-lg btn-primary btn-block" value="Login"
                                               type="submit">
                                    </div>
									<?php
									$visited = visitedUser();
									?>
	                                <?php
	                                if (isset($_GET['wrongPas'])) {
		                                echo "<h4 class='bg-danger  text-center text-uppercase'>invalid <br> username & password</h4>";
	                                }
	                                ?>


                                    <a href="forgot?visited=<?php echo $visited ?>&fg=<?php echo uniqid(true); ?>">
                                        Forgot Password?
                                    </a>
                                    <h5>Don't have an account?
                                        <a style="text-decoration:underline "
                                           href="registration?visited=<?php echo $visited ?>">Sign Up</a></h5>

                                </form>

                            </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

	<?php include "includes/footer.php"; ?>

</div> <!-- /.container -->
