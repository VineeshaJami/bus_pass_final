<?php
$Email = $_POST['email'];
$Password = $_POST['password'];
$customer_type=$_POST["customer_type"];

if (isset($_POST['login'])) {
 	
 	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "login";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

    else {
        if($customer_type=="student")
        {
     $SELECT = "SELECT Email From customer Where Email = ? Limit 1";
     $SELEC = "SELECT Password From customer Where Password = ? Limit 1";
        }
        else
        {
            $SELECT = "SELECT Email From admin1 Where Email = ? Limit 1";
     $SELEC = "SELECT Password From admin1 Where Password = ? Limit 1";
        }
     //Prepare statement
     

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     
     $stm = $conn->prepare($SELEC);
     $stm->bind_param("s", $Password);
     $stm->execute();
     $stm->bind_result($Password);
     $stm->store_result();
     $rnm = $stm->num_rows;



     if ($rnum==0||$rnm==0) {
      $stmt->close();
      $stm->close();
      echo "<script> alert('Please Enter Valid Username or Password') </script>";
     }
     else { 
         
        if($customer_type=="student")
        {
        header('location: dashboard.html');
        }
        else
        {
            header('location: pass info.html');
        }
     }
     
     $conn->close();
    }
} 

else {
 echo "All field are required";
 die();
}
?>