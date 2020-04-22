
<?php
require_once "config.php";

$fullname = trim($_POST['fullname']);
$ID = trim($_POST['ID']);
$email = trim($_POST['e-mail']);
$password = $_POST['password'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "To be implemented."; 

} else echo "Something wrong happened, sorry...";

?>
