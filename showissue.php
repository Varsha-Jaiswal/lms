<?php
    include ("check.php");
error_reporting(0);
$query ="SELECT
        A.AUTHOR_ID,
        A.AUTHOR_NAME,

        B.BC_ID,
        B.BC_NAME,

        C.B_ID,
        C.B_NAME,
        C.BC_ID,
        C.AUTHOR_ID,
        C.B_ISBN,
        C.B_ISBN,

        D.ISSUE_ID,
        D.BOOK_ID,
        D.USER_ID,
        D.ISSUE_TIME


        FROM
        author_data AS A,
        book_cat AS B,
        book_data AS C,
        issue_data AS D

        WHERE

        D.BOOK_ID=C.B_ID AND C.BC_ID=B.BC_ID AND C.AUTHOR_ID=A.AUTHOR_ID
        ORDER BY ISSUE_TIME DESC
             ";
	//Get results
	$result = $db->query($query) or die($db->error.__LINE__);


//Counting number row
   $sql="SELECT * FROM issue_data";

if ($result1=mysqli_query($db,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result1);
 // printf("Result set has %d rows.\n",$rowcount);
  // Free result set
  mysqli_free_result($result1);
  }

mysqli_close($db);
?>

  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Manage Issue Books | LMS</title>
    <link rel="shortcut icon" href="/lms2/img/fav.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/lms2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/lms2/css/mdb.min.css" rel="stylesheet">
    <!-- Coustom JS    -->
    <script>
        function asd()
        {
        document.getElementById('hide-on').style.display='none';
            
        }
        function pop()
        {
            confirm("Are u want to Delete ?");
        }  
    </script>
    <!-- Coustom CSS    -->
    <style>
        @media print
        {    
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>

</head>

<body style="">

    <!-- Navbar -->
<?php require 'nav.php';?>
<!-- Navbar -->
    
<br>
<!-- Heading -->
<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-6" style="background-color:">
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-puzzle-piece animated fadeInDown" aria-hidden="true"></i> Manage Issued Books</h4>
            <p style="font-size:11px;margin-top:0px">Overview & status, more. Home Page for Over all view. </p>
        </div>
        <div class="col-md-6 hidden-sm-down" style="background-color:">
            <img src="/lms2/img/lms2.png" class="pull-xs-right img-fluid" width="30%">
        </div>
    </div>
    <hr style="margin:0.2%" class="no-print">
</div>
<!-- Heading -->

<!-- Get Notification Showing data -->
<div class="container animated flipInX">
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($_GET['msg'])){
			echo '<div id="hide-on" class="msg card no-print" style="background-color:#00C851;color:white;padding:.5%;opacity:0.8"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;'.$_GET['msg'].'   
           <button type="button" class="close" aria-label="Close" onclick="asd()">
  <span aria-hidden="true">&times;</span>
</button></div>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Get Notification Showing data -->

<!-- Action Menu -->
<div class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-12">
            <ul class="list-inline" style="margin:0px">
                <li class="list-inline-item">
                    <button onclick="myFunction()" class="btn btn-default btn-sm no-print" style="margin:0px;"><i class="fa fa-print" aria-hidden="true"></i> Print this page</button>
                </li>
                <li class="list-inline-item">
                    <a href="/lms2/issue" class="btn-sm btn btn-info no-print"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Issue Book</a>
                </li>
                <li class="list-inline-item">
                    Total Number of Result : <?php echo $rowcount; ?>
                </li>
            </ul>
        </div>
    </div>
</div> 
<!-- Action Menu -->

<!--Main Content -->
<div class="container animated slideInUp " style="margin-bottom:2%">
    <div class="row">
        <div class="container">
            <div class="col-md-12 table-responsive" style="padding:0%;background-color:;margin:0px;">
                            <table class="table table-striped table-bordered table-hover">
                            <tr style="background-color:#4a148c;color:white;padding:0px">
                                
                                <th >ISSUE ID</th>
                                <th >USER ID</th>
                                <th >BOOK Name</th>
                                <th >AUTHOR NAME</th>
                                <th >BOOK CATEGORY</th>
                                <TH class="no-print"></TH>
                                <TH class="no-print"></TH>
                            </tr>
                            <?php 
                                //Check if at least one row is found
                                if($result->num_rows > 0) {
                                //Loop through results
                                while($row = $result->fetch_assoc()){
                                    //Display customer info
                                    $output ='<tr>';
                                    $output .='<td style="padding:.5%">'.$row['ISSUE_ID'].'</td>';
                                    $output .='<td style="padding:.5%">'.$row['USER_ID'].'</td>';
                                    $output .='<td style="padding:.5%">'.$row['B_NAME'].'</td>';        
                                    $output .='<td style="padding:.5%">'.$row['AUTHOR_NAME'].'</td>';
                                    $output .='<td style="padding:.5%">'.$row['BC_NAME'].'</td>';
                                    
                                    $output .='<td style="padding:.5%" class="no-print"><a style="margin:0px" href="/lms2/editissue/'.$row['ISSUE_ID'].'" class="btn btn-warning btn-sm no-print">Edit</a></td>';
                                    $output .='<td style="padding:.5%" class="no-print"><a style="margin:0px" href="/lms2/delete_issued/'.$row['ISSUE_ID'].'/'.$row['B_ID'].'" onClick="pop()" class="btn btn-danger btn-sm no-print">Delete</a></td>';
                                    $output .='</tr>';

                                    //Echo output
                                    echo $output;
                                }
                            } else {
                                echo "Sorry, no customers were found";
                            }
                            ?>
                        </table>

                    </div>
        </div> 
    </div>
</div>
<!--Main Content -->    
  
    
<!-- Footer -->
    <?php include "footer.php"; ?>
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