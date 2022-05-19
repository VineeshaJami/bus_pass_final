<!DOCTYPE html>
<html>
<head>
    <title> STUDENT PASS</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
		  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>

* {
    margin: 0;
    padding-top: 0;
}

body {
    background-image: url('busm.jpg');
    background-size: 100% 110%;
    width: 100%;
    height: 100vh;
}
.form-wrap {
    width: 450px;
    background: rgba(0,0,0,0.87);
    padding: 20px 20px;
    box-sizing: border-box;
    border-radius: 25px;

    position: fixed;
    left: 50%;
    top: 45%;
    transform: translate(-50%, -50%);
}


.form-wraps {
    width: 150px;
    background: rgb(0,0,0,0);
    padding: 40px 40px;

    position: fixed;
    left: 50%;
    top: 120%;
    transform: translate(-50%, -50%);
}
h1 {
    text-align: center;
    color: #fff;
    font-weight: normal;
    margin-bottom: 20px;
}
table{
border-collapse: none;

width: 80%;
color: white;
margin: 20px 30px;
font-family: monospace;
font-size: 20px;
text-align: center;
 } 
th {background-color: rgba(0,0,0,0.5);
color: white;    }
tr:{background-color: rgba(0,0,0,0.5);

}
a{
    text-decoration: none;
    font-size: 28px;
    color: hotpink;

}

input {
    width: 100%;
    background: none;
    border: 1px solid #fff;
    padding: 6px 15px;
    box-sizing: border-box;
    border-radius: 25px;
    margin-bottom: 20px;
    font-size: 16px;
    color: #fff;
}

    input[type="button"] {
        background: #bac675;
        border: 0;
        cursor: pointer;
        color: #3e3d3d;
    }

        input[type="button"]:hover {
            background: #a4b15c;
            transition: .6s;
        }
        ::placeholder {
    color: #fff;
}
</style>

<body>
<div class="form-wrap">

<table cellpadding="10px" style="font-size: 20px;
	font-family: 'Open Sans', sans-serif">
 <tr>
   <th style="color:hotpink; font-size:24px;">STUDENT PASS </th>
 </tr>
</table>
<?php

$rno = $_POST['roll_no'];

 $conn = mysqli_connect("localhost", "root", "", "login");
  // Check connection


  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);
  } 

 
  $sql = "SELECT id,name,father_name,dept,roll_no,year,amount,date,expiry FROM information where roll_no = '$rno' order by ID DESC LIMIT 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<table><tr><td>Name</td><td>" . $row["name"]. "</td></tr><tr><td>Father name</td><td>" . $row["father_name"] . "</td></tr><tr><td>Department</td><td>"
. $row["dept"]. "</td></tr><tr><td>Roll no</td><td>". $row["roll_no"]. "</td></tr><tr><td>Year</td><td>". $row["year"]."</td></tr><tr><td>Issue Date</td><td>". $row["date"]."</td></tr><tr><td>Expiry Date</td><td>". $row["expiry"]."</td></tr>";
   
        

        
}
echo "</table>";
} else { echo "<table>
 <tr>
   <th> **roll no is incorrect** </th>
 </tr>
</table>"; 
echo "
        

        <a class='btn btn-primary' href='pass info.html' role='button'>View Pass</a>
        <a class='btn btn-primary' href='dashboard.html' role='button'>Dashboard</a>";
}
echo "
        

        <a  href='pass info.html'  role='button'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Pass</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a  href='dashboard.html' role='button'>Dashboard</a>
";
$conn->close();

?>
</table>
</div>

</body>


</html>