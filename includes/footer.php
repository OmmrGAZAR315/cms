<footer>
    <div class="row">
        <div class="col-lg-12">
			<?php
			if (isset($_SESSION["user_role"]) && bindec($_SESSION["user_role"]) & 0b100 && isset($_GET["page"]) && $_GET["page"] == $post_counts)
				echo "<a href='secretPageSQL'>Write SQL commands?</a>";
            elseif ($_SERVER['PHP_SELF'] == '/cms/contact.php' && bindec($_SESSION["user_role"]) & 0b100)
				echo "<a href='contactanyone'>Contact anyone</a>";
			else
				echo "<p>Copyright &copy; Your Website 2023</p>";
			?>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="/cms/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/cms/js/bootstrap.min.js"></script>

</body>

</html>
