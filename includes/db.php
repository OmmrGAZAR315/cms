<?php
ob_start();
const DB_HOST = "localhost";
const DB_USERNAME = "root";
const DB_PASS = "";
const DB_NAME = "cms_db";


$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
if (!$connection)
	die("Connection failed" . mysqli_error($connection));

/*
require "vendor\autoload.php";
$pics = [
	"20230209_063312.png",
	"sun.png",
	"Screenshot_20230117_092123.png",
	"NetflixIcon2016.jpg",
	"900x300-marvel-banner_800x800.jpg",
	"image_1.jpg",
	"GetCurrentWallpaper_1841624969.jpg"
];
$tags = ["C++", "Java", "Python", "Eslam"];
$cats = [10, 11, 12, 13];
$faker = \Faker\Factory::create();
for ($i = 0; $i < 40; $i++) {
	$dateTime = $faker->dateTime;
	$dateTime = $dateTime->format("d-M-Y h:i:s");
	$company = mysqli_real_escape_string($connection, $faker->company);
	$name = mysqli_real_escape_string($connection, $faker->name);
	$text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.

';
	$cat = $cats[$i % (count($cats) - 1)];
	$tag = $tags[$i % (count($tags) - 1)];
	$pic = $pics[$i % (count($pics) - 1)];
	$query = "INSERT INTO posts(post_title,post_author,post_date,post_category_id,post_tags,post_image,post_content) ";
	$query .= "VALUES('$company','$name','$dateTime',$cat,'$tag','$pic','$text' )";
	mysqli_query($connection, $query);
}
echo "done";
 */

?>

