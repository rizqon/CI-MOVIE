<!DOCTYPE html>
<html>
<head>
	<title>UP Coming Movies</title>
</head>
<body>
<pre>
<?php
foreach ($movie['results'] as $row) {
	echo $row['original_title'] . '<br>';
	echo $row['backdrop_path'] . '<br>';
    echo $row['id'] . '<br>';
    echo $row['release_date'] . '<br>';
    echo $row['poster_path'] . '<br>';
    echo $row['popularity'] . '<br>';
    echo $row['title'] . '<br>';
    echo $row['vote_average'] . '<br>';
    echo $row['vote_count'] . '<br>';
    echo '-----------------------------------<br>'; 
}
?>
</pre>
<?php echo $pagination; ?>
</body>
</html>