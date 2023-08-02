
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--  Add our Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >

    <!--  Add our custom CSS  -->
    <link rel="stylesheet" href="./css/style.css">
    <title>View Student Record</title>
</head>

<body>

    <header>
        <!-- NAV -->
        <nav id="footer">
            <div class="navTop">
                <img src="img/logo.png" alt="" class="logo-img">

                <div>
                    <h3>Students Records</h3>
                    <div class="dropdown">
                        <button class="dropbtn">MENU</button>
                        <div class="dropdown-content">
                            <a href="index.php">Home</a>
                            <a href="view.php">View - Student Record</a>
                            <a href="add.php">Add - Student Record</a>
                            <a href="update.php">Update - Student Record</a>
                            <a href="delete.php">Remove - Student Record</a>
                        </div>
                    </div>
                </div>

                <div class="navItem">
                    <div class="search">
                        <input type="text" placeholder="Search a Student Record" class="searchInput">
                        <img src="img/search.png" width="20" height="20" alt="" class="searchIcon">
                    </div>
                    <div class="signin">
                        <a href="signin.php"><h4>Sign In</h4></a>
                        <a href="logout.php"><h4>Sign Out</h4></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>