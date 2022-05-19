<?php
$name = $_POST['name'];
$father_name = $_POST['fname'];
$dept = $_POST['dept'];
$roll_no = $_POST['roll_no'];
$year = $_POST['year'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$payment="";
if (isset($_POST['submit'])) {
 	
 	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "login";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

    else {
     if($amount=="1")
     {
        $dt = strtotime($date);
        $expiry=date("Y-m-d", strtotime("+1 month", $dt));
     }
     elseif($amount=="3")
     {
        $dt = strtotime($date);
        $expiry=date("Y-m-d", strtotime("+3 month", $dt));
     }
     elseif($amount=="6")
     {
        $dt = strtotime($date);
        $expiry= date("Y-m-d", strtotime("+6 month", $dt));
     }
     else
     {
        $dt = strtotime($date);
        $expiry= date("Y-m-d", strtotime("+12 month", $dt));
     }
     $INSERT = "INSERT INTO information(name,father_name,dept,roll_no,year,amount,date,payment,expiry) VALUES(?, ?, ? ,?, ? , ?, ?,?,?)";
    
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param('sssssssss',$name,$father_name,$dept,$roll_no,$year,$amount,$date,$payment,$expiry);
      $stmt->execute();
      header('location: payment std.html');
     }
     $stmt->close();
     $conn->close();
    }
 

else {
 echo "All field are required";
 die();
}
?>