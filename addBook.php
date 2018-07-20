<?php
include ("check.php");
error_reporting(0);
//query for Book Category
$query ="SELECT 
			 BC_NAME,
             BC_ID
			 FROM book_cat ORDER BY BC_NAME";
	//Get results
	$result = $db->query($query) or die($mysqli->error.__LINE__);

//query for author name
$query1 ="SELECT 
			 AUTHOR_NAME,
             AUTHOR_ID
			 FROM author_data ORDER BY AUTHOR_NAME ASC";
	//Get results
	$result1 = $db->query($query1) or die($mysqli->error.__LINE__);


?>
<?php
	if($_POST){
        error_reporting(0);
		//Assign Variables
		$b_name =$_POST['b_name'];
		$b_isbn =$_POST['b_isbn'];
        $b_edition =$_POST['b_edition'];
		$bc_id =$_POST['bc_name'];
		$auth_name =$_POST['auth_name'];
		
	
        if (!empty($b_name) and !empty($b_isbn) and !empty($b_edition) and !empty($bc_id) and !empty($auth_name)) {
		//Create customer update
		$query="INSERT INTO `book_data`(`B_NAME`, `BC_ID`, `B_ISBN`, `B_EDITION`, `AUTHOR_ID`,`B_STAUS`) VALUES ('$b_name',$bc_id,$b_isbn,$b_edition,$auth_name,1)";
                 if (mysqli_query($db, $query)) {
                            $msg="New Category Successfully Added";
                            echo $msg;
                            header('Location: /lms2/showbooks/'.urlencode($msg).'');
                            exit;
                } 
                else{
                         //echo "Error updating record: " . mysqli_error($db);
                          echo"<center><h1 style='margin-top:5%;color:#1a237e'>Error</h1></center>";
                          echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
                          <center> Error While Inserting!! <u>".mysqli_error($db)
                            ."</u><br>
                          <br><img src='img/error.png' width='10%'>
                          <h2 style='color:#880e4f '>Your can not Insert Duplicate Value</h2>
                          <a href='/lms2/addBook'><button>Go Back</button></a> 
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
            <br><img src='img/error.png' width='10%'>
            <h2 style='color:#880e4f '>Your can not Insert Null Value</h2>
            <a href='/lms2/addBook'><button>Go Back</button></a> 
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
    
    <title>Add Book | LMS</title>
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-calendar-plus-o animated fadeInDown" aria-hidden="true"></i> Add Category</h4>
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
                    <a href="/lms2/showbooks" class="btn btn-default btn-sm" style="margin:0px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Manage Books</a>
                </li>
            </ul>
        </div>
    </div>
    
</div> 
<!-- Action Menu -->
<br>

    
<!-- Main Content -->
<div class="container animated fadeInUp">
    <div class="row" >
        <div class="col-md-12" style="background-color:">
            <div class="container z-depth-3" style="background-color:#fafafa ">
                <div class="row">
                    
                    <div class="col-md-5 z-depth-2  waves-effect" style="padding:0px;background-color:#0099CC;color:white">
                        <img src="/lms2/img/asd.jpg" class="img-fluid hidden-sm-down" height="50%">
                        <img src="/lms2/img/lib.jpg" class="img-fluid hidden-md-up" height="50%">
                        <center>
                            <br>
                            <h5 class="h5-responsive" style="margin:1%">Library Management System</h5>
                            <hr>
                        </center>
                    </div>
                    
                    <div class="col-md-7" style="background-color:#fafafa ">
                        <br>
                        <br>
                        <br class="hidden-xs-down">
                        <div class="container">
                            <form action="/lms2/addBook" method="post" style="background-color:;padding:0%">
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <form-group>
                                            <label style="">Book Name</label>
                                            <input style="" type="text" placeholder="Enter Book Name" name="b_name">
                                    </form-group>
                                </div>
                            </div>
                             
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <form-group>
                                            <label style="">Book ISBN</label>
                                            <input style="" type="number" placeholder="Enter Book ISBN" name="b_isbn">
                                    </form-group>
                                </div>
                            </div>
                              
                            <br>
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <form-group>
                                            <label style="">Book Edition</label>
                                            <input style="" type="number" placeholder="Enter Book Edition" name="b_edition">
                                    </form-group>
                                </div>
                            </div>
                              
                                
                            <div class="row">
                                <div class="col-md-12">
                                    <form-group>
                                            <br>
                                            <label>Book Category</label><br>
                                            <select class="mdb-select" name="bc_name">
                                                <option value="" disabled selected>Choose your option</option>
                                                    <?php 
                                                        //Check if at least one row is found
                                                        if($result->num_rows > 0) {
                                                        //Loop through results
                                                        while($row = $result->fetch_assoc()){

                                                            $output='<option value='.$row['BC_ID'].'>'.$row['BC_NAME'].'</option>';
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
                                     <form-group>
                                            <br>
                                            <label>Author Name</label><br>
                                            <select class="mdb-select" name="auth_name">
                                                <option value="" disabled selected>Choose your option</option>
                                                    <?php 
                                                        //Check if at least one row is found
                                                        if($result1->num_rows > 0) {
                                                        //Loop through results
                                                        while($row = $result1->fetch_assoc()){

                                                            $output='<option value='.$row['AUTHOR_ID'].'>'.$row['AUTHOR_NAME'].'</option>';
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
    <?php include"footer.php"; ?>
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