<?php
    include ("check.php");
?>
<?php
    error_reporting(0);
    //Select Number Books
    //Counting number row
   $sql="SELECT * FROM book_data";

    if ($result1=mysqli_query($db,$sql))
      {
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result1);
     // printf("Result set has %d rows.\n",$rowcount);
      // Free result set
      mysqli_free_result($result1);
      }

    //=====================================
    
    //Select Issued Books
    //Counting number row
   $sql="SELECT * FROM issue_data";

    if ($result1=mysqli_query($db,$sql))
      {
      // Return the number of rows in result set
      $rowissue=mysqli_num_rows($result1);
     // printf("Result set has %d rows.\n",$rowcount);
      // Free result set
      mysqli_free_result($result1);
      }

  //=====================================

    //Select Books_cat
    //Counting number row
   $sql="SELECT * FROM book_cat";

    if ($result1=mysqli_query($db,$sql))
      {
      // Return the number of rows in result set
      $rowcat=mysqli_num_rows($result1);
     // printf("Result set has %d rows.\n",$rowcount);
      // Free result set
      mysqli_free_result($result1);
      } 

//=====================================

    //Select author _data
    //Counting number row
   $sql="SELECT * FROM author_data";

    if ($result1=mysqli_query($db,$sql))
      {
      // Return the number of rows in result set
      $rowauth=mysqli_num_rows($result1);
     // printf("Result set has %d rows.\n",$rowcount);
      // Free result set
      mysqli_free_result($result1);
      }
?>
  
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="/lms2/img/fav.png" type="image/x-icon" />
    <title>Home | LMS</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    

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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-home animated fadeInDown" aria-hidden="true"></i> Dashboard</h4>
            <p style="font-size:11px;margin-top:0px">Overview & status, more. Home Page for Over all view. </p>
        </div>
        <div class="col-md-6 hidden-sm-down" style="background-color:;">
            <img src="img/lms2.png" class="pull-xs-right img-fluid" width="30%">
        </div>
    </div>
</div>
<!-- Heading -->
          

    
    
    
    <div class="container animated fadeInUp">
        
        <div class="col-md-12" style="margin-top:0%;padding:0px">
<!--            <header style=""><p style="margin-bottom:0.5%"><i class="fa fa-user-secret" aria-hidden="true"></i> Hello <?php echo $login_user; ?></p></header>-->
            <hr style="margin-bottom:.5%">
            <section class="col-md-12" style="padding:0px;background-color:white">
                <br>
                <div class="row">
                    <div class="container">
                <!--First Tilr-->
                <!--  ==================================   -->
                 <div class="col-md-3" style="padding:0px;">
                    <div class="card waves-effect hm-white-slight" style="background-color:#0099CC ;margin:3%;padding:3%">
                        <section>
                            <header style="color:white"><h5>Total Books</h5></header>
                            <article><p style="color:white;font-size:28px;" class="center-block"> 
                               
                                <i class="fa fa-book pull-xs-left" aria-hidden="true" style="color:white;font-size:60px"></i>&nbsp; <?php echo $rowcount; ?></p>
                                <p class="pull-xs-right" style="color:white;font-size:16px;margin:0px"><a href="/lms2/showbooks" style="color:white">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
                        </section>
                    </div>
                </div>
                <!--  ==================================   -->                        
                <!--Secont tile                    -->
                <!--  ==================================   -->
               <div class="col-md-3" style="padding:0px;">
                    <div class="card waves-effect hm-white-slight" style="background-color:#0d47a1 ;margin:3%;padding:3%">
                        <section>
                            <header style="color:white"><h5>Total Category</h5></header>
                            <article><p style="color:white;font-size:28px;" class="center-block"> 
                               
                                <i class="fa fa-tasks pull-xs-left" aria-hidden="true" style="color:white;font-size:60px"></i>&nbsp; <?php echo $rowcat; ?></p>
                                <p class="pull-xs-right" style="color:white;font-size:16px;margin:0px"><a href="/lms2/showcat" style="color:white">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
                        </section>
                    </div>
                </div>
                <!--  ==================================   -->                   
                <!--                    Third Tils-->
                <!--  ==================================   -->
                <div class="col-md-3" style="padding:0px;">
                    <div class="card waves-effect hm-white-slight" style="background-color:#ff8f00;margin:3%;padding:3%">
                        <section>
                            <header style="color:white"><h5>Total Author</h5></header>
                            <article><p style="color:white;font-size:28px;" class="center-block"> 
                               
                                <i class="fa fa-user pull-xs-left" aria-hidden="true" style="color:white;font-size:60px"></i>&nbsp; <?php echo $rowauth; ?></p>
                                <p class="pull-xs-right" style="color:white;font-size:16px;margin:0px"><a href="/lms2/showAuthor" style="color:white">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
                        </section>
                    </div>
                </div>
                <!--  ==================================   -->
                <!--  Forth Tile   -->              
               <div class="col-md-3" style="padding:0px;">
                    <div class="card waves-effect hm-white-slight" style="background-color:#00b8d4 ;margin:3%;padding:3%">
                        <section>
                            <header style="color:white"><h5>Total Issued</h5></header>
                            <article><p style="color:white;font-size:28px;" class="center-block"> 
                               
                                <i class="fa fa-tags pull-xs-left" aria-hidden="true" style="color:white;font-size:60px"></i>&nbsp; <?php echo $rowissue; ?></p>
                                <p class="pull-xs-right" style="color:white;font-size:16px;margin:0px"><a href="/lms2/showissue" style="color:white">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
                        </section>
                    </div>
                </div>
                <!--  ==================================   -->
                </div>  </div>
<!--                   =============================================================================-->
<!--                   ======== Row Complete  ================================================-->
                
                <div class="row">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-12" style="padding:2%">
                                <hr>
                                <center><h5 class="h5-responsive">Library Management System</h5></center>
                                <hr>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12" style="padding:4%;padding-top:1%;padding-bottom:1%">
                                <center>
                                    <p> The main objective of the Library Management system project is discipline of the planning, organizing and managing the library tasks. Our project aims at making the task of library easy. Library Management is entering the records of new book and retrieving the details of book available in the library. We can issue book to the library member and maintain their records and can also checks how many book are issued and stock available in the library.</p>
                                </center>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12" style="padding:2%">
                                <hr>
                            </div>
                        </div>
                        
                    </div>   
                </div>  
            </section>
                    
        </div>
                        
        
    </div>
    
<!--   footer -->
        <?php include"footer.php";?>
<!--   footer -->
    <!-- SCRIPTS -->

    <!-- JQuery -->

    <script type="text/javascript">
        $(".button-collapse").sideNav();
    </script>
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>


</body>

</html>