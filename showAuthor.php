<?php
    include ("check.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Manage Author | LMS</title>
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
            <h4 style="margin-top:0%;margin-bottom:0px"><i class="fa fa-puzzle-piece animated fadeInDown" aria-hidden="true"></i> Manage Author</h4>
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
                    <a href="/lms2/addAuth" class="btn-sm btn btn-info no-print"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Author</a>
                </li>
                <li class="list-inline-item">
                            <?php
                                $sql="SELECT * FROM author_data";
                                if ($result1=mysqli_query($db,$sql))
                                  {
                                  // Return the number of rows in result set
                                  $rowcount=mysqli_num_rows($result1);
                                  printf("Total Authors Found : %d\n",$rowcount);
                                  // Free result set
                                  mysqli_free_result($result1);
                                  }
                            ?>
                </li>
            </ul>
        </div>
    </div>
</div> 
<!-- Action Menu -->
 
<!--  Main Content  -->
<div class="container animated fadeInUp">
        <div class="col-md-12" style="margin-top:0%;padding:0px">  
           <div class="container-fluid">
               <div class="row">
                    <div class="col-md-12 table-responsive" style="padding:0%;background-color:white;margin:0px">
                        <?php
                            $ses_sql =mysqli_query($db,"SELECT 
                            Author_Name, Author_Id FROM author_data ORDER BY AUTHOR_TIME DESC");
                            if (mysqli_num_rows($ses_sql) > 0) {

                                 echo "<table class='table table-hover table-striped' id='page_printer' style='background-color:#fafa;'>

                                            <tr style='background-color:#4a148c;color:white'>
                                                <td>Author Id</td>
                                                <td>Author Name</td>
                                                <td><center>Edit</center></td>
                                                <td><center>Delete</center></td>
                                            </tr>";
                                // output data of each row
                                while($row = mysqli_fetch_assoc($ses_sql)) {

                                    echo "<tr >
                                            <td style='color:#1C2331;margin:0px'>".$row["Author_Id"]."</td>
                                            <td style='color:#1C2331;margin:0px'>".$row["Author_Name"]."</td>

                                            <td  style='margin:0px'><center><a href='/lms2/editAuthor/$row[Author_Id]' class='btn btn-warning btn-sm' style='margin:0px'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</a></center></td>

                                            <td  style='margin:0px'><center><a href='/lms2/delete_auth/$row[Author_Id]'  class='btn btn-danger btn-sm' style='margin:0px'  onclick='pop()'><i class='fa fa-remove' aria-hidden='true'></i> Delete</a></center></td>
                                            ";
                                }
                            } else {
                                echo "No Data Found";
                            }
                            echo "</table>";
                        ?>
                    </div>
               </div> 
           </div>            
        </div>                
</div>
<!--  Main Content  -->

<!--  footer  -->
    <?php include "footer.php"; ?>
<!--  footer  -->
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