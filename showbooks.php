<?php
    include ("check.php");
error_reporting(0);
$query ="SELECT 
			 B.B_ID,
             B.B_NAME,
             B.BC_ID,
             B_STAUS,
             BC.BC_ID,
             B_ISBN,
             B.AUTHOR_ID,
             BC.BC_NAME,
             auth.AUTHOR_ID,
             auth.AUTHOR_NAME
			 FROM book_cat AS BC,book_data AS B,author_data as auth
             WHERE B.BC_ID=BC.BC_ID and B.AUTHOR_ID=auth.AUTHOR_ID
             ORDER BY B_TIME DESC;
             
             ";
	//Get results
	$result = $db->query($query) or die($db->error.__LINE__);


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

mysqli_close($db);
?>

  
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="/lms2/img/fav.png" type="image/x-icon" />
   
    
    <title>Show Books</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="/lms2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="/lms2/css/mdb.min.css" rel="stylesheet">

    <script>
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        })
    </script>
<!--    
========================================
-->
    
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-puzzle-piece animated fadeInDown" aria-hidden="true"></i> Manage Category</h4>
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
                    <a href="/lms2/addBook" class="btn-sm btn btn-info no-print"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Book</a>
                </li>
                <li class="list-inline-item">
                    Total Number of Result :<?php echo $rowcount; ?>
                </li>
            </ul>
        </div>
    </div>
</div> 
<!-- Action Menu -->

<!-- Main Content -->
<div class="container animated slideInUp " style="margin-bottom:1%">
    <div class="row">
        <div class="container">
            <div class="col-md-12 table-responsive" style="padding:0%;background-color:;margin:0px;">
                    <table class="table table-striped table-hover">
                    <tr style="background-color:#4a148c;color:white;padding:0px">
                        <th >BOOK Name</th>
                        <th >AUTHOR</th>
                        <th >CATEGORY</th>
                        <th >ISBN</th>
                        <th >STATUS</th>
                        <TH style="no-print"></TH>
                        <TH STYLE="no-print"></TH>
                    </tr>
                        <?php 
                            //Check if at least one row is found
                            if($result->num_rows > 0) {
                            //Loop through results
                            while($row = $result->fetch_assoc()){
                                //Display customer info
                                $output ='<tr>';
                                $output .='<td style="padding:.5%">'.$row['B_NAME'].'</td>';
                                $output .='<td style="padding:.5%">'.$row['AUTHOR_NAME'].'</td>';
                                $output .='<td style="padding:.5%">'.$row['BC_NAME'].'</td>';
                                $output .='<td style="padding:.5%">'.$row['B_ISBN'].'</td>';
                                $output .='<td style="padding:.5%">'.$row['B_STAUS'].'</td>';
                                $output .='<td style="padding:.5%" class="no-print"><a style="margin:0px" href="/lms2/editBook/'.$row['B_ID'].'" class="btn btn-warning btn-sm no-print"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>';
                                $output .='<td style="padding:.5%" class="no-print"><a style="margin:0px" href="/lms2/delete_book/'.$row['B_ID'].'" class="btn btn-danger btn-sm style="no-print"" onClick="pop()"><i class="fa fa-remove" aria-hidden="true"></i> Delete</a></td>';
                                $output .='</tr>';

                                //Echo output
                                echo $output;
                            }
} else {
                            echo "Sorry, no Books were found";
                        }
                        ?>
                    </table>
            </div>
        </div> 
    </div>
</div>
<!-- Main Content -->
    
<!-- Footer   -->
    <?php include ("footer.php"); ?>
<!-- Footer   -->
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