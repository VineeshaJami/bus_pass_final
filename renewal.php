<script>
    console.log(<?= json_encode($foo); ?>);
</script>
<?php

$roll_no = $_POST['roll_no'];
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
     $expiry="SELECT expiry FROM information WHERE roll_no=$roll_no";
     var_dump($expiry);
     $date2 = strtotime($date);
     $expiry2 = strtotime($expiry);
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
      $UPDATE = "UPDATE information SET expiry='$expiry', date='$date' WHERE roll_no='$roll_no'";
      if (mysqli_query($conn,$UPDATE)) {
            header('location: payment std.html');
         } 
      else {
         echo '<script type="text/javascript">alert("Enter correct start date")</script>';
         header('location: renewal.html');
         }
     }
     $stmt->close();
     $conn->close();
    }
 

else {
 echo "All field are required";
 die();
}
?>