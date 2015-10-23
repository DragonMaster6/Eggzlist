<?php
/*
 * Programmer: Ben Matson, [INSERT NAME HERE]
 * Date Created: October 23, 2015
 * Purpose: this is the main page of the website. There will be a tracker and listings of eggs
 * 		as well as access to the login/user settings
*/
?>

<h1> This is a test </h1>
<hr>

<table>
	<tr>
		<th> Name </th>
		<th> Email </th>
		<th> Phone </th>
	</tr>
<?php
	foreach($data[users] as $user){
		
		echo '<tr>';
		echo '<td>'.$user->fname.' '.$user->lname.'</td>';
		echo '<td>'.$user->email.'</td>';
		echo '<td>'.$user->phone.'</td>';
		echo '</tr>';

	}
?>
</table>