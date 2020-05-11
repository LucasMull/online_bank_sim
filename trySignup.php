
<?php
require_once "mysql/config.php";

$fullname = trim($_POST['fullname']);
$ID = trim($_POST['ID']);
$email = trim($_POST['e-mail']);
$password = $_POST['password'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mysqli->query("USE clients");
        $sql = "SELECT * FROM clients WHERE id = ?";
        if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("s", $param_id);
                $param_id = trim($_POST['cpf']);
                
                if($stmt->execute()){
                        $stmt->store_result();

                        if($stmt->num_rows != 0){
                                echo "Error, CPF already in use";
                                exit;
                        } else {
                                $stmt->close();
                                $sql = "INSERT INTO clients " .
                                       "VALUES (?,NULL,NULL,?)";
                                if($stmt = $mysqli->prepare($sql)){
                                        $stmt->bind_param("ss", $param_id, $param_fullname);
                                        $param_fullname = trim($_POST['fullname']);
                                        if( $stmt->execute() == FALSE ){
                                                echo "Error: ".$stmt->error;
                                                exit;
                                        }
                                }
                        }
                }
                $stmt->close();
                exit;
        } 
        $mysqli->close();
}
echo "Something wrong happened, sorry...";
exit;

?>
