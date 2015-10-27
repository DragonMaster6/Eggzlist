<h1> I'm a seller! </h1>
<hr>

<?php
	echo "Hello I am Seller No.".$seller['sellerID']."<br>";
	echo "I have ".$seller['numChick']." chickens that produce ".$seller['eggrate']." eggs a week";
?>

<a href=<?php echo site_url(); ?> > Home </a>