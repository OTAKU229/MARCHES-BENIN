<?php
$hostame = "localhost";
$username = "root";
$password="";
$dbname="marchesBenin";

$connexion=mysqli_connect($hostame,$username,$password,$dbname);
if($connexion){
    echo"connexion reussie";
}
else{
    echo"connexion echoue";

}
?>