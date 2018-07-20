<?php
include ("check.php");
$b=$_GET['id'];
error_reporting(0);
//echo $b;

$ses_sql =mysqli_query($db,"SELECT Author_Name FROM author_data WHERE Author_Id=$b");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$c=$row['Author_Name'];
//echo $c;
?>

 <?php
	if($_POST){
		//Assign GET Variable
		$id = $_GET['id'];
	
		//Assign Variables
		$auth_name =$_POST['auth_name'];
		
        
         if (!empty($auth_name))
         {
            $query = "UPDATE author_data SET AUTHOR_NAME='$auth_name' WHERE AUTHOR_ID=$id";
            if (mysqli_query($db, $query)) {
                            $msg="Author Name has been Updated";
                            header('Location: /lms2/showAuthor/'.urlencode($msg).'');
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
                          <a href='/lms2/editAuthor/".$id."'><button>Go Back</button></a> 
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
                <a href='/lms2/editAuthor/".$id."'><button>Go Back</button></a> 
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
    
    <title>Edit Author | LMS</title>
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-edit animated fadeInDown" aria-hidden="true"></i> Edit Book Category</h4>
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
                    <a href="showcat.php" class="btn btn-default btn-sm" style="margin:0px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Manage Author</a>
                </li>
            </ul>
        </div>
    </div>    
</div> 
<!-- Action Menu -->
<br>
          
<!-- Main Content -->
<div class="container animated slideInUp">
    <div class="row">
        <div class="col-md-12" style="margin-top:0%;">    
           <div class="container z-depth-3" style="background-color:#fafafa">
                <div class="row" style="">
                    
                    <div class="col-md-5 waves-effect z-depth-3" style="padding:0%;background-color:#0099CC;color:white">
                        <img src="/lms2/img/collegegirl2.png" class="img-fluid" width="100%">
                         <center>
                            <br style="margin-bottom:.5%">
                            <p style="font-size:130%;margin-top:0px"><i class="fa fa-edit" style="" aria-hidden="true"></i> Edit Book Category</p>
                            <h5 class="h5-responsive hidden-sm-down" style="margin:1%">Library Management System</h5>
                            <br class="hidden-sm-down">
                            <hr class="hidden-sm-down">
                        </center>
                    </div>
                    
                    <div class="col-md-7" style="padding:0%;background-color:;margin:0px;padding-top:3%">
                        
                        <form action="/lms2/editAuthor/<?php echo $b ?>" method="post" style="background-color:;padding:4%">
                            <div class="container">
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:">
                                        <form-group>
                                            <label class="disabled" for="as" >Author ID</label>
                                            <input type="text" id="as" value="<?php echo $b ?>" disabled name="auth_id" >
                                        </form-group>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                        <form-group>
                                            <label>Author Name</label>
                                            <input type="text" value="<?php echo $c ?>" name="auth_name">
                                        </form-group>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:2%">
                                       <button class="btn btn-info" type="submit" style="margin-left:0px;margin-top:5%;" name="submit">Save Book Category</button>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="background-color:;margin-top:1%;color:">
                                       <p style="font-size:80%;margin-bottom:.5%;color:#ff4444">* You cant not Update Author Id. If you want to update Author Id then you need to grant Permission.</p>
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
<!-- Main Content --> 
    
    
<!-- Footer -->
    <?php include"footer.php"; ?>
<!-- Footer -->
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