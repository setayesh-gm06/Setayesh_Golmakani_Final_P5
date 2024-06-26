<?php
session_start(); 

if (isset($_POST['stdCode']) && !empty($_POST['stdCode']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $stdCode = $_POST['stdCode'];
    $password = $_POST['password']; 
} else {
    exit("برخی از فیلد‌ها مقدار دهی نشده‌اند");
}

$link = mysqli_connect("localhost", "root", "root", "school");

if (mysqli_connect_errno()) {
    exit("خطایی با شرح زیر رخ داده است: " . mysqli_connect_error());
}

$query = "SELECT * FROM student WHERE stdCode='$stdCode' AND password='$password'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);

if ($row) {
    $_SESSION["state_login"] = true;
    $_SESSION["stdCode"] = $row['stdCode'];
    $_SESSION["password"] = $row['password'];


    ?>

<script type="text/javascript">
<!--
location.replace("student_panel.php");	
-->
</script> 
   
<?php
   
    echo ("<p> با موفقیت وارد شدید </p>");
} else 
    echo ("<p>ورود انجام نشد </p>");


mysqli_close($link);
?>
