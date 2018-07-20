<!--Navbar-->
<nav class="navbar navbar-dark purple darken-4">
    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container">

        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx2">
            <!--Navbar Brand-->
            <a class="navbar-brand" href="#">LMS</a>
            <!--Links-->
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/lms2/home"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                </li>
<!--
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-building" aria-hidden="true"></i> Modules </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="/lms2/showcat"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Category</a>
                        <a class="dropdown-item" href="/lms2/addCat"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category </a>
                        <div class="dropdown-divider"></div>
                        
                         <a class="dropdown-item" href="/lms2/showAuthor"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Author</a>
                        <a class="dropdown-item" href="/lms2/addAuth"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Author </a>
                        
                         <div class="dropdown-divider"></div>
                        
                         <a class="dropdown-item" href="/lms2/showbooks"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Books</a>
                        <a class="dropdown-item" href="/lms2/addBook"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Books </a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book" aria-hidden="true"></i> Issue </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <a class="dropdown-item" href="/lms2/showissue"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Books Issued</a>
                        <a class="dropdown-item" href="/lms2/issue"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Book Issue </a>
                    </div>
                </li>
                
                <li class="nav-item dropdown hidden-sm-up">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $login_user; ?> </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="/lms2/profile"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Profile</a>
                            <a class="dropdown-item" href="/lms2/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/lms2/about"><i class="fa fa-connectdevelop" aria-hidden="true"></i> About Us </a>
                        </div>
                </li>
                
            </ul>
            
            
            
            
<div class="dropdown pull-xs-right hidden-xs-down"> 
    <ul class="nav navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $login_user; ?> </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="/lms2/profile"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Profile</a>
                <a class="dropdown-item" href="/lms2/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/lms2/about"><i class="fa fa-connectdevelop" aria-hidden="true"></i> About Us </a>
            </div>
        </li>
    </ul>          
</div>
        <!--/.Collapse content-->

    </div>
   
</nav>
<!--/.Navbar-->
          