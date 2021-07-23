<?php 
	require_once "autoload.php";
	$user = new User(); 
?>
<html>
	<h1>Index.php</h1>
	<?php 
		$user = DB::table('users')->get();
		echo "<pre>";
		print_r($user);
	 ?>
</html>