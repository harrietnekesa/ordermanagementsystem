<?php
$host="localhost";
$dbusername="root";
$dbpass="1234";
$dbname="order";

$conn=mysqli_connect($host,$dbusername,$dbpass,$dbname)or die(mysqli_connect_error());


?>


<html>
<head>

<link rel="stylesheet" href="order.css">

</head>
<body>

<h1> WELCOME TO SWEET HOTEL</h1>
<div id="div">
<div id="div1">
<h1>NEW ORDER<h1>

<?php

if(isset($_POST["go"])){
	$names=$_POST["names"];
	$location=$_POST["location"];
	$food=$_POST["food"];
	$amount=$_POST["amount"];
$s="insert into customers(id,names,location,food,amount)values('','$names','$location','$food','$amount')";
$q=mysqli_query($conn,$s)or die(mysqli_error($conn));
echo "<div style='width:100%; height:5%; background-color:#ADFF2F; border-radius:5px; font-size:18px;'>ORDER PLACED</div>";

}
?>

<form method="POST" id="form">
	CUSTOMER NAME:<input type="text" name="names"><br>
	LOCATION:<input type="text" name="location"><br>
	FOOD TYPE:<input type="text" name="food"><br>
	AMOUNT:<input type="text" name="amount"><br>
	
	<br><button input type="submit" name="go">SUBMIT ORDER</button></br>


</form>

</div>
<div id="div2">
	<h2>AVAILABLE ORDERS</h2>




<table border=1 id="table">
	<tr id="tr"><th>CUSTOMER NAME</th> <th>LOCATION</th> <th>FOOD TYPE</th> <th>AMOUNT</th> <th>PRINT</th></tr>
	


<?php
$f="select* from customers";
$q=mysqli_query($conn,$f)or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($q)){
$y='"'.$row['id'].'"';
echo "<tr id='tr2'><td>".$row['names']."</td> <td>".$row['location']."</td> <td>".$row['food']."</td> <td>".$row['amount']."</td> <td><button onclick='openReceipt(".$y.");'>PRINT</button></td></tr>";
}
?>
</table>


</div>

</div>

<script>
function openReceipt(d){
window.open("receipt.php?id="+d,"__top","");
}
</script>
</body>





</html>
