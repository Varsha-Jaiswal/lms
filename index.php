<?php
error_reporting(0);
	include('login.php'); // Include Login Script

	if ((isset($_SESSION['email']) != '')) 
	{
		header('Location: /lms2/home');
	}	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="/lms2/img/fav.png" type="image/x-icon" />
    
    <title>Library Management System</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="/lms2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="/lms2/css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="/lms2/css/style.css" rel="stylesheet">

</head>

<body style="background-image: url('img/cv5.jpg');background-attachment:fixed;background-color:#f5f5f5 ">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding:0px;margin-top:3%;margin-bottom:6%">
                <img src="/lms2/img/lms2.png" class="img-fluid center-block">
            </div>
        </div>
    </div>
<!--    ==============================================================-->
     <div class="container">
        <div class="row">
          
            <div class="col-md-offset-4 col-md-4 z-depth-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" style="padding:0px;background-color:white;border-top-left-radius:.3em;border-top-right-radius:.3em;border-bottom-right-radius:.3em;border-bottom-left-radius:.3em;
">
                <div class="container-fluid" style="">
                    <div class="row">
                        <div class="col-md-12" style="padding:3%;background-color:#009CC;">
                            <center>
                            <p style="color:#0099CC;margin:0px;font-size:25px">Sign In</p><hr>
                            </center>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12" style="padding-top:0%">
                            <form method="post" style="margin-bottom:5%;padding:2%;padding-top:0px">
                                <input style="margin-top:0%" type="email" placeholder="someone@example.com" name="email">
                                <input style="margin-top:2%" type="password" placeholder="password" name="pass">
                                <button class="btn btn-block" type="submit" style="margin-left:0px;margin-top:5%;background-color:#0099CC" name="submit">Sign In</button>
                                <a href="#" >Forgot Password ?</a>
                                <div style="color:red"><?php echo $error; ?></div>
                            </form>
                        </div>
                    </div>
                    
                    
                    
                        <div class="row">
                            <div class="col-md-12" style="padding:2%;background-color:#0099CC;color:white;border-bottom-right-radius:.3em;border-bottom-left-radius:.3em;">
                                <a href="#" style="color:white;FONT-SIZE:14px" >Create an Account ?</a>
                            </div>
                        </div>
                    
                </div>
            </div>
           
        </div>
         
    </div>
 
    
    
    
    
    
    
    <footer style="margin-top:5%" class="hoverable">
    <center>
        &copy; Library Management System By Vrijraj Singh
    </center>
    </footer>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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