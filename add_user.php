<!DOCTYPE html>
<html>
<body>
<?php 
include 'display.php';
//form data

$p_name=$_POST['u_name'];
$p_id=$_POST['u_id'];

//connection DSN
$host = "pluto.hood.edu";
$dbname = "lmt18db";
$user = "lmt18";
$pass = "password";


try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
        #use prepared statment with named placeholders :first, :last, :title, :age, :yos, :salary, :email.
        $sql = "insert into user (userName, userId) values(:u_name, :u_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':u_name', $u_name);
        $stmt->bindParam(':u_id', $u_id);

        if($stmt->execute()){
                $rows_affected = $stmt->rowCount();
                echo "<h2>".$rows_affected." new user added sucessfully!</h2>";
                display("SELECT userName, userId FROM user;");
        }
        else
        {
                echo "Insertion failed: (" . $conn->errno . ") " . $conn->error;
        }

        $conn = null;
}
catch(PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>

</body>
</html>