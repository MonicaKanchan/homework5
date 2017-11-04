<?php
$servername = "sql1.njit.edu";
$username = "mk758";
$password = "MxLEzvEVX";
$dbname="mk758";
try
{
$conn = new PDO("mysql:host=$servername;dbname=mk758", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully". "<br>" ;
}
catch(PDOException $e)
{
echo "Connection failed: " . "<br>" . $e->getMessage();

}
?>
