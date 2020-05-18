<?php
error_reporting(0);
session_start();

$user = array(
	'paper' => sha1('pass')
);
?>
<html>
<title>Meine Webseite</title>
<body>
<?php
if( !empty($_POST['user']) && !empty($_POST['password']) 
	&& is_string($_POST['user']) && is_string($_POST['password'])){
		$_SESSION['login'] = isset( $user[$_POST['user']] ) && sha1($_POST['password']) === $user[$_POST['user']];
}

if( $_SESSION['login'] === true ){
	if(empty($_GET['file']) || !is_string($_GET['file'])){
		echo "<ul>";
		foreach( array_diff(scandir('/php-code/deny/'), ['.','..']) as $file ){
			echo '<li><a href="/?file='. urlencode($file) .'">'. $file .'</a></li>';
		}
		echo "</ul>";
	}
	else{
		echo '<a href="/">Liste</a></li>';
		echo "<pre>";
		echo file_get_contents('/php-code/deny/' . preg_replace( '/[^A-Za-z0-9\.\-]/', '', $_GET['file'] ) );
		echo "</pre>";
	}
}
else{
?>

<form action="/" method="post">
	<input type="text" name="user">
	<input type="password" name="password">
	<input type="submit" value="Login">
</form>

<?php
}

?>

</body>
</html>
