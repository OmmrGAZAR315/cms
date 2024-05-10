<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php
if (isset($_SESSION["user_role"]) && bindec($_SESSION["user_role"]) & 0b100) {
	?>
    <!-- Page Content -->
    <div class="container">

        <div class="form-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">SQL</h2>
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                    <textarea name="sqlCommands" id="" cols="70" rows="10"></textarea>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="submit" class="btn btn-lg btn-primary btn-block"
                                                   value="Commands"
                                                   type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php

	if (isset($_POST["sqlCommands"])) {
		$query = $_POST["sqlCommands"];
		$sqlFetechs = mysqli_query($connection, $query);
		while ($All = mysqli_fetch_assoc($sqlFetechs)) {
			print_r($All);
			echo "<br><br><br>";
		}
	}


	?>
    <hr>

	<?php include "includes/footer.php"; ?>

    </div> <!-- /.container -->

<?php } else
	header("Location:index");
?>