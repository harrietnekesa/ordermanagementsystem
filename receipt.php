<html>
<head>
<title>receipt</title>
</head>

<body>

<?php
if(isset($_GET["id"])){
$id=$_GET["id"];

$host="localhost";
$dbusername="root";
$dbpass="1234";
$dbname="order";

$conn=mysqli_connect($host,$dbusername,$dbpass,$dbname)or die(mysqli_connect_error());
$e="select* from customers where id='$id'";
$q=mysqli_query($conn,$e)or die(mysqli_error($conn));
$row=mysqli_fetch_assoc($q);

echo "<h2>SWEET HOTEL ENTERPRISE</h2>";
echo "<h3>RECEIPT</h3><p>";
echo "customer names: ".$row['names'];
echo "<p>location: ".$row['location'];
echo "<p>food: ".$row['food'];
echo "<p>amount: ".$row['amount'];
echo "Thnak you";

}
?>

<script>
window.onload=function(){
window.print();
window.close();
};

</script>

</body>
</html>
