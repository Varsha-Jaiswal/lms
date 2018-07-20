<?php
include ("check.php");
error_reporting(0);
$b=$_GET['id'];

$query ="SELECT
       
        A.AUTHOR_NAME,
        
        B.BC_NAME,

        C.B_NAME,
        C.BC_ID,  
        C.B_ISBN,

        D.ISSUE_ID,
        D.BOOK_ID,
        D.USER_ID


        FROM
        author_data AS A,
        book_cat AS B,
        book_data AS C,
        issue_data AS D

        WHERE
        D.ISSUE_ID=$b AND
        D.BOOK_ID=C.B_ID AND C.BC_ID=B.BC_ID AND C.AUTHOR_ID=A.AUTHOR_ID
        ORDER BY ISSUE_TIME DESC
             ";
	 $result = $db->query($query) or die($mysqli->error.__LINE__);
	if($result = $db->query($query)){
		//Fetch object array
		while($row = $result->fetch_assoc()) {
			$USER_ID = $row['USER_ID'];
            $ISSUE_ID = $row['ISSUE_ID'];
            $BOOK_NAME = $row['B_NAME'];
            $AUTHOR=$row['AUTHOR_NAME'];
            $BC=$row['BC_NAME'];
            $BOOK_ISBN=$row['B_ISBN'];
           
		}
		//Free Result set
		$result->close();
	}
?>


<!--Updation Script-->
<?php
error_reporting(0);
	if($_POST){
		//Assign GET Variable
		$id = $_GET['id'];
	    
		//Assign Variables
		$user_id =$_POST['user_id'];
        
         if (!empty($user_id)) {
                //Create customer update
                $query = "UPDATE issue_data
                          SET
                          USER_ID='$user_id'
                          WHERE ISSUE_ID=$id";
                         if (mysqli_query($db, $query)) {
                                $msg="Book Successfully Updated";
                                header('Location: /lms2/showissue/'.urlencode($msg).'');
                                exit;
                            } else {
                                echo "Error updating record: " . mysqli_error($db);
                            }
    }
    else {
//        echo "<div class='container'>";
//        echo "<center>";
//        echo "<h1>Error</h1><hr>";
//        die("Please fill User Id");
//        echo "</div>";
//        echo "</center>";
        
         echo"<center><h2 style='margin-top:5%;color:#1a237e'>Error</h2></center>";
    echo "<div style='padding:2%;background-color:#0157;color:whe;margin-top:1%;width:80%;margin-left:auto;margin-right:auto'><hr>
    
   <center> Error While Updating!! " // mysqli_error($db)
        ."<br>
    <br><img src='/lms2/img/error.png' width='10%'>
    <h2 style='color:#880e4f '>Your can not Update Null Value</h2>
    <a href='/lms2/editissue/".$id."'><button>Go Back</button></a> 
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
    
    <title>Edit Issued Book | LMS</title>
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-edit animated fadeInDown" aria-hidden="true"></i> Edit Issued Book</h4>
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

    



<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-12" style="background-color:"> 
           <div class="container z-depth-3" style="background-color:#fafafa ">
                <div class="row">
                    <div class="col-md-4" style="padding:0px;background-color:#0099CC;color:white">
                        <img src="/lms2/img/asd.jpg" class="img-fluid hidden-sm-down" height="50%">
                        <img src="/lms2/img/lib.jpg" class="img-fluid hidden-md-up" height="50%">
                        <center>
                            <br>
                            <h5 class="h5-responsive" style="margin:1%">Library Management System</h5>
                            <br>
                            <hr>
                        </center>
                    </div>
                    <div class="col-md-8" style="padding:0%;background-color:;margin:0px;padding-top:3%">
                        
                        <form method="post" action="/lms2/editissue/<?php echo $b;?>"   style="background-color:;padding:4%">
                            <div class="container">
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:">
                                        <form-group>
                                            <label>Issue ID</label>
                                            <input type="text" class="disabled" disabled value="<?php echo $b ?>" name="b_id" >
                                        </form-group>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>User ID</label>
                                            <input type="text" value="<?php echo $USER_ID;?>" name="user_id">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Book Name</label>
                                            <input type="text" class="disabled" disabled  value="<?php echo $BOOK_NAME ?>" name="b_edition">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Book ISBN Number</label>
                                            <input type="text"  class="disabled" disabled  value="<?php echo $BOOK_ISBN ?>" name="b_isbn">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Book Castegory</label>
                                            <input type="text"  class="disabled" disabled value="<?php echo $BC;?>" name="b_isbn">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Book Author</label>
                                            <input type="text"  class="disabled" disabled  value="<?php echo $AUTHOR ?>" name="b_isbn">
                                        </form-group>
                                    </div>
                                </div>
                                
                                
                                
                                
                                 
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                       <button class="btn btn-info" type="submit" style="margin-left:0px;margin-top:5%;" name="submit">Update Issued Book</button>
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
    
<!--   footer -->
    <?php include "footer.php";?>
<!--   footer -->
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