<?php
include ("check.php");
?>

<?php
error_reporting(0);
    //query for author name
    $query1 ="SELECT 
			 B_NAME,
             B_ID,
             B_ISBN
			 FROM book_data where B_STAUS=1 ORDER BY B_NAME ASC";
	//Get results
	$result1 = $db->query($query1) or die($mysqli->error.__LINE__); 
?>

<?php
	if($_POST){
        error_reporting(0);
		//Assign Variables
		$stu_id=$_POST['std_id'];
		$b_id =$_POST['b_id'];
        
//        echo $stu_id;
//        echo " asd ".$b_id;
        
        if (!empty($stu_id) and !empty($b_id)) {
            $sql="INSERT INTO `issue_data`(`USER_ID`, `BOOK_ID`) VALUES ($stu_id,$b_id)";
            if (mysqli_query($db, $sql)) {
                            
                        $sql="UPDATE book_data SET B_STAUS=0 WHERE B_ID=$b_id";
                            
                            if (mysqli_query($db, $sql)) {
                                    $msg="Book Successfully Issued";
                                    echo $msg;
                                    header('Location: /lms2/showissue/'.urlencode($msg).'');
                                    exit;
                            } 
                            else{
                                 //echo "Error updating record: " . mysqli_error($db);
                                  echo"<center><h1 style='margin-top:5%;color:#1a237e'>Error</h1></center>";
                                  echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
                                  <center> Error While Inserting!! <u>".mysqli_error($db)
                                    ."</u><br>
                                  <br><img src='/lms2/img/error.png' width='10%'>
                                  <h2 style='color:#880e4f '>Your can not Insert Duplicate Value</h2>
                                  <a href='/lms2/issue'><button>Go Back</button></a> 
                                  </div></center>";
                                    echo "<center>";
                                    die("<h3>Duplicated value Can not be Inserted</h3>");
                                    echo "</center> ";
                            }
            } 
            else{
                 //echo "Error updating record: " . mysqli_error($db);
                  echo"<center><h1 style='margin-top:5%;color:#1a237e'>Error</h1></center>";
                  echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
                  <center> Error While Inserting!! <u>".mysqli_error($db)
                    ."</u><br>
                  <br><img src='img/error.png' width='10%'>
                  <h2 style='color:#880e4f '>Your can not Insert Duplicate Value</h2>
                  <a href='issue'><button>Go Back</button></a> 
                  </div></center>";
                    echo "<center>";
                    die("<h3>Duplicated value Can not be Inserted</h3>");
                    echo "</center> ";
                }
        }
        else {
		      echo"<center><h1 style='margin-top:5%;color:#1a237e'>Error</h1></center>";
              echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
              <center> Error While Inserting!! ".mysqli_error($db)
                ."<br>
            <br><img src='/lms2/img/error.png' width='10%'>
            <h2 style='color:#880e4f '>Your can not Insert Null Value</h2>
            <a href='/lms2/issue'><button>Go Back</button></a> 
            </div></center>";
                echo "<center>";
                die("<h3>Empty Data Can not be Inserted</h3>");
                echo "</center> ";
            }	
	}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Issue Book | LMS</title>
    <link rel="shortcut icon" href="/lms2/img/fav.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/lms2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/lms2/css/mdb.min.css" rel="stylesheet">
</head>

<body style="">

<!-- Navbar -->
<?php require 'nav.php';?>
<!-- Navbar -->
 
<br>
<!-- Heading -->
<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-6" style="background-color:;">
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-calendar-plus-o animated fadeInDown" aria-hidden="true"></i> Issue Book</h4>
            <p style="font-size:11px;margin-top:0px">Overview & status, more. Home Page for Over all view. </p>
        </div>
        <div class="col-md-6 hidden-sm-down" style="background-color:;">
            <img src="/lms2/img/lms2.png" class="pull-xs-right img-fluid" width="30%">
        </div>
    </div>
    <hr style="margin:0.2%" class="no-print">
</div>
<!-- Heading -->
    
    <br>
<!-- Action Menu -->
<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-12" style="">
            <ul class="list-inline" style="margin:0px">
                <li class="list-inline-item">
                    <a href="/lms2/showissue" class="btn btn-default btn-sm" style="margin:0px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Manage Issued Books</a>
                </li>
            </ul>
        </div>
    </div>
    
</div> 
<!-- Action Menu -->
<br>
    
    
<!-- Main Content -->
<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-12" style="background-color:">
            <div class="container z-depth-3" style="background-color:#fafafa ">
                <div class="row">
                    
                    <div class="col-md-3 z-depth-2  waves-effect" style="padding:0px;background-color:#0099CC;color:white">
                        <img src="/lms2/img/issue.jpg" class="img-fluid" width="100%">
                        <center>
                            <br>
                            <h5 class="h5-responsive" style="margin:1%">Library Management System</h5>
                            <p>Issue Book</p>
                            <br>
                            <hr>
                        </center>
                    </div>
                    
                    <div class="col-md-9" style="background-color:#fafafa ">
                        <br>
                        <br>
                        <br class="hidden-xs-down">
                        <div class="container">
                            <form action="/lms2/issue" method="post" style="background-color:;padding:0%">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form-group>
                                                <label style="">Student Id </label>
                                                <input style="" type="number" placeholder="Enter Student Id" name="std_id">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <form-group>
                                            <br>
                                            <label>Book Category</label><br>
                                            <select class="mdb-select" name="b_id">
                                                <option value="" disabled selected>Choose your option</option>
                                                    <?php 
                                                        //Check if at least one row is found
                                                        if($result1->num_rows > 0) {
                                                        //Loop through results
                                                        while($row = $result1->fetch_assoc()){

                                                            $output='<option value='.$row['B_ID'].'>'.$row['B_NAME'].'</option>';
                                                                 echo $output;
                                                             }
                                                    } else {
                                                        echo "Sorry, no customers were found";
                                                    }
                                                    ?>
                                    
                                            </select>     
                                    </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn btn-info" type="submit" style="margin-left:0px;margin-top:5%;" name="submit">Save Book Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content -->

<!-- footer -->
    <?php include "footer.php"; ?>
<!-- footer -->
    <!-- SCRIPTS -->

    <!-- JQuery -->

    <script type="text/javascript">
        $(".button-collapse").sideNav();
    </script>
    <script type="text/javascript" src="/lms2/js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/lms2/js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/lms2/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/lms2/js/mdb.min.js"></script>


    
    <script>
function myFunction() {
    window.print();
}
</script> 
   
</body>
</html>