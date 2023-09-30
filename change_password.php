<?php
include("session.php");
if(isset($_POST['updatepassword']))
{
    print_r($_POST);
    $email=$_SESSION['email'];
    $cur_password=md5($_POST['curr_password']);
    $sql="SELECT * FROM users WHERE email = '$email' && password='$cur_password'";
    $result= mysqli_query($con,$sql );
    $rows=mysqli_fetch_array($result);
   
    $new_password=$_POST['new_password'];
    $con_new_password=$_POST['confirm_new_password'];
    if($cur_password==$rows['password'] && $new_password==$con_new_password)
    {
        $query="UPDATE users set password='" . md5($new_password) . "' WHERE email='" . $email ."'";
        mysqli_query($con,$query);
        $message="Password changed successfully";
        echo $message;
        header("Location: logout.php");
    }
    else
    {
        $message="Password changed Unsuccessfully";
        echo $message;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Expense Manager - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="120">
                <h5><?php echo $username ?></h5>
                <p><?php echo $useremail ?></p>
            </div>
            <div class="sidebar-heading">Management</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action"><span data-feather="home"></span> Dashboard</a>
                <a href="add_expense.php" class="list-group-item list-group-item-action "><span data-feather="plus-square"></span> Add Expenses</a>
                <a href="manage_expense.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> Manage Expenses</a>
            </div>
            <div class="sidebar-heading">Settings </div>
            <div class="list-group list-group-flush">
                <a href="profile.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="user"></span> Profile</a>
                <a href="change_password.php" class="list-group-item list-group-item-action "><span data-feather="key"></span> Change Password</a>
                <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span> Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light  border-bottom">


                <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                    <span data-feather="menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">Your Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                    <h3 class="mt-4 text-center"> Hi!<?php echo $firstname; ?> You can change your password here</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md">
                        <form class="form" method="post"  >
                            <div class="form-group">
                                <div class="col">
                                    <label for="curr_password">Enter Current Password</label>
                                    <input type="password" class="form-control" name="curr_password" id="curr_password" placeholder="Current Password">
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label for="new_password">Enter New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label for="confirm_new_password">Confirm New Password</label>
                                    <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password">
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <br>
                                    <input type="submit" class="btn btn-primary btn-block" name="updatepassword" id="updatepassword" value="Update Password">
                                </div>
                               
                            </div>
                        </form>
                        </div>
                    </div>
                       


                        
                        

                    </div>
                    <!--/col-9-->
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace()
    </script>
    

</body>

</html>