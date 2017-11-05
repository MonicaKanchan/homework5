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
//$count = $statement->rowCount();
while($result = $statement->fetch(PDO::FETCH_OBJ ))
{
$results[] = $result;
}
print_r($results);
//print_r($count);

//$results->setAttribute(PDOStatement::rowCount, PDOStatement::columnCount);

?>
