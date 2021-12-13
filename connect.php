<?PHP

$dsn = "mysql:host=localhost;dbname=wl_market";
$user = "root";
$pass = "";
$option = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',

);
try {
	$con = new PDO($dsn, $user, $pass, $option);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

	echo 'connection failed : ';
	echo $e->getMessage();
}
