<?php
include ("check.php");

error_reporting(0);
$query ="SELECT 
			 BC_NAME,
             BC_ID
			 FROM book_cat";
	//Get results
	$result = $db->query($query) or die($mysqli->error.__LINE__);

//query for author name
$query1 ="SELECT 
			 AUTHOR_NAME,
             AUTHOR_ID
			 FROM author_data";
	//Get results
	$result1 = $db->query($query1) or die($mysqli->error.__LINE__);

//================================================================================

$b=$_GET['id'];

//echo $b;
	//Create customer select query
	$query2 ="SELECT 
                B_NAME,
                B_EDITION,
                B_ISBN,
                BC_ID,
                AUTHOR_ID
                FROM 
                book_data
			    WHERE B_ID = $b";
    $result2 = $db->query($query2) or die($mysqli->error.__LINE__);
	if($result2 = $db->query($query2)){
		//Fetch object array
		while($row = $result2->fetch_assoc()) {
			$X = $row['B_NAME'];
            $Y = $row['B_EDITION'];
            $Z = $row['B_ISBN'];
            
            $p=$row['BC_ID'];
            $q=$row['AUTHOR_ID'];
           
		}
		//Free Result set
		$result2->close();
	}
?>


<?php
    error_reporting(0);
    //Getting Book Category
	$query3 ="SELECT 
                BC_NAME
                FROM 
                book_cat
			 WHERE BC_ID = $p";
    $result3 = $db->query($query3) or die($mysqli->error.__LINE__);
	if($result3 = $db->query($query3)){
		//Fetch object array
		while($row = $result3->fetch_assoc()) {
			$Book_cat_name = $row['BC_NAME'];
		}
		//Free Result set
		$result3->close();
	}


    //Getting Book Author
    $query4 ="SELECT 
                AUTHOR_NAME
                FROM 
                author_data
			 WHERE AUTHOR_ID = $q";
    $result4 = $db->query($query4) or die($mysqli->error.__LINE__);
	if($result4 = $db->query($query4)){
		//Fetch object array
		while($row = $result4->fetch_assoc()) {
			$Book_auth = $row['AUTHOR_NAME'];
		}
		//Free Result set
		$result4->close();
	}
?>

<!--Updation Script-->
<?php
error_reporting(0);
	if($_POST){
		//Assign GET Variable
		$id = $_GET['id'];
	    
		//Assign Variables
		$b_name =$_POST['b_name'];
        $b_isbn =$_POST['b_isbn'];
        $b_edition =$_POST['b_edition'];
        $bc_id =$_POST['bc_name'];
		$auth_name =$_POST['auth_name'];
        

        if (!empty($b_name) and !empty($b_isbn) and !empty($b_edition) and !empty($bc_id) and !empty($auth_name))
		{
            $query = "UPDATE book_data SET B_NAME='$b_name', B_ISBN='$b_isbn', B_EDITION='$b_edition', BC_ID='$bc_id',AUTHOR_ID='$auth_name' WHERE B_ID=$id";
            if (mysqli_query($db, $query)) {
                            $msg="Book Successfully Updated";
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
                          <a href='/lms2/editBook/".$id."'><button>Go Back</button></a> 
                          </div></center>";
                          echo "<center>";
                          die("<h3>Duplicated value Can not be Inserted</h3>");
                          echo "</center> ";
                    }
        }
        else
        {
                echo"<center><h2 style='margin-top:5%;color:#1a237e'>Error</h2></center>";
                echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
                <center> Error While Updating!! " // mysqli_error($db).
                    ."<br>
                <br><img src='img/error.png' width='10%'>
                <h2 style='color:#880e4f '>Your can not Update Null Value</h2>
                <a href='/lms2/editBook/".$id."'><button>Go Back</button></a> 
                </div></center>";
                    echo "<center>";
                    die("<h3>Empty Data Can not be Updated</h3>");
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
    
    <title>Edit Books | LMS</title>
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-edit animated fadeInDown" aria-hidden="true"></i> Edit Books</h4>
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
    
<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-12" style="">
           <div class="container z-depth-3"> 
                <div class="row" style="">
                     <div class="col-md-5 waves-effect z-depth-3" style="padding:0%;background-color:#0099CC;color:white">
                        <img src="/lms2/img/asd.jpg" class="img-fluid hidden-sm-down" width="100%">
                        <img src="/lms2/img/book.png" class="img-fluid hidden-md-up" width="100%">
                         <center class="fluid hidden-sm-down">
                            <br style="margin-bottom:.5%">
                            <p style="font-size:130%;margin-top:0px"><i class="fa fa-edit" style="" aria-hidden="true"></i> Edit Book </p>
                            <h5 class="h5-responsive hidden-sm-down" style="margin:1%">Library Management System</h5>
                            <br class="hidden-sm-down">
                            <hr class="hidden-sm-down">
                        </center>
                    </div>
                    
                    <div class="col-md-7" style="padding:0%;background-color:;margin:0px;padding-top:3%">
                        <form method="post" action="/lms2/editBook/<?php echo $b;?>"   style="background-color:;padding:4%">
                            <div class="container">
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:">
                                        <form-group>
                                            <label class="disabled" for="as">Book ID</label>
                                            <input type="text" id="as" value="<?php echo $b ?>" disabled name="b_id" >
                                        </form-group>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Book Name</label>
                                            <input type="text" value="<?php echo $X ?>" name="b_name">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Book Edition</label>
                                            <input type="text" value="<?php echo $Y ?>" name="b_edition">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Book ISBN Number</label>
                                            <input type="text" value="<?php echo $Z ?>" name="b_isbn">
                                        </form-group>
                                    </div>
                                </div>
                                
                                
                                  <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:1%">
                                        <form-group>
                                            <br>
                                            <label>Book Category</label><br>
                                            <select class="mdb-select" name="bc_name">
                                                <option value="<?php echo $p; ?>" selected><?php echo $Book_cat_name;?></option>
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
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:1%">
                                        <form-group>
                                            <br>
                                            <label>Author Name</label><br>
                                            <select class="mdb-select" name="auth_name">
                                                <option value="<?php echo $q; ?>" selected><?php echo $Book_auth  ?></option>
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
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                       <button class="btn btn-info" type="submit" style="margin-left:0px;margin-top:5%;" name="submit">Update Book</button>
                                    </div>
                                </div>
                                
                                 <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:1%;color:">
                                       <p style="font-size:80%;margin-bottom:.5%;color:#ff4444">* You can not Update Book Id. If you want to update Book Id then you need to grant Permission.</p>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </form>
                        
                    </div>
                    
               </div> 
               
               
           </div>
                
                  
        </div>
    </div>                  
</div>
    

<!--  Footer  -->
    <?php include"footer.php"; ?>
<!--  Footer  -->
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