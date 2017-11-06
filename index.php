<?php

class dbConn
{
protected static $conn;

private function __construct()
{
try
{
self::$conn = new PDO("mysql:host=sql1.njit.edu;dbname=mk758", "mk758", "MxLEzvEVX");
self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo "Connection failed: " ."<br>". $e->getMessage();

}
}

public static function getConnection()
{
if (!self::$conn)
{
new dbconn();
}

return self::$conn;
}
}

$conn = dbconn::getConnection();
echo "<b>Connected Successfully</b>"."<br>";

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$statement = $conn->prepare('select * from accounts where id<6');
$statement->execute();
$x = $statement->fetchAll();
echo "Total number of results are: ".count($x)."</br>";
echo "<table border=\"1\"><tr><th>id</th><th>email</th><th>fname</th><th>lname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>";
foreach($x as $temp)
{
echo "<tr><td>".$temp["id"]."</td><td>".$temp["email"]."</td><td>".$temp["fname"]."</td><td>".$temp["lname"]."</td><td>".$temp["phone"]."</td><td>".$temp["birthday"]."</td><td>".$temp["gender"]."</td><td>".$temp["password"]."</td></tr>";
}

//$results->setAttribute(PDOStatement::rowCount, PDOStatement::columnCount);

?>
