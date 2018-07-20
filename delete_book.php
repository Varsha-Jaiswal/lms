<?php
include ("check.php");
error_reporting(0);
$a=$_GET["id"];

//$sql =mysqli_query($db,"DELETE FORM book_cat WHERE BOOK_CAT_ID=$a");
//
//if (mysqli_query($db, $sql)) {
//    echo "Record deleted successfully";
//} else {
//    echo "Error deleting record: " . mysqli_error($db);
//}

$sql = "DELETE FROM book_data WHERE B_ID=$a";

if (mysqli_query($db, $sql)) {
    $msg="Book has been Delected Successfully";
    echo "Record deleted successfully";
    header('Location: /lms2/showbooks/'.urlencode($msg).'');
    exit;
} else {
    echo"<center><h2 style='margin-top:5%;color:#1a237e'>Error</h2></center>";
    echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
    
   <center> Error deleting record!! " // mysqli_error($db)
        ."<br>
    <br><img src='/lms2/img/auth.png' width='10%'>
    <h2 style='color:#880e4f '>Your are not Authorized User so you need to Grant Permission</h2>
    <a href='/lms2/showbooks'><button>Go Back</button></a>
    </center>
    
    </div>";
}

?>
<html>
    <head>
    <title>Deleating Book...</title>
        <link rel="shortcut icon" href="/lms2/img/fav.png" type="image/x-icon" />
    </head>
    
    <body style="background-color:#eceff1 ">
        
        <footer><br><br><br><br><br><br><hr><center>&copy;Library Management System</center></footer>
    </body>
</html>


