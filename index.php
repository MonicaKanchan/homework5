<?php

class dbconn
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


?>
