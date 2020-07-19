<?php
    
    include("dbconnect.php");

    
    $sucess="";
    $error="";
    $errorFlag=0;

    if (isset($_POST['log_in'])) {
        
        
        $id=mysqli_real_escape_string($link,$_POST['staff_id']);
        $logPassword=md5(mysqli_real_escape_string($link,$_POST['password']));

        $idQuery="
        
            SELECT * FROM `staff`
            WHERE staff_id='$id';
        
        
        ";

        $passQuery="
        
            SELECT * FROM `staff`
            WHERE password='$logPassword' 
            
            AND staff_id='$id'

            ;
        
        
        ";

        $idAunthenticate=mysqli_query($link,$idQuery);
        $passwordAunthenticate=mysqli_query($link,$passQuery);

        $result1 = mysqli_num_rows($idAunthenticate);
        $result2=mysqli_num_rows($passwordAunthenticate);



        if($result1 == 1 && $result2 ==1 )
        {

            session_start();
            if($_POST['check'])
            {

                setcookie("staff_id","$id",time()+86400*30,"/");
                setcookie("password","$logPassword",time()+ 86400*30,"/");

            }
            
            
            
            $_SESSION['staff_id']=$id;
            $_SESSION['password']=$logPassword;
            header("Location:login.php");

        }

        else if( $result1 == 0){

            $error=$error. "The ID doesn't exist.<br>";

        }

        else if( $result2 == 0){

            $error=$error. "The password is wrong.Please try again.<br>";

        }



    }





?>






































<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="signup.css">
    <!-- <link rel="stylesheet" href="navbar.css"> -->
    <!-- <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> -->
    <link href="fa/css/all.css" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <title>Postal Automation System</title>


    <style>

        body{

            background: none;

        } 


    </style>
  </head>
  <body>

            <div>

                <nav class="navbar fixed-top navbar-expand-lg" style="color:white;background:none;">
                
                
                
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: black; background:none;">
                        <i class="fas fa-bars" style="color: white;"></i>
                </span>
                </button>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <a class="navbar-brand " href="index.php">
                    <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    University Of Dhaka
                </a>
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="facultySignup.php">Sign-Up</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="facultyLogin.php">Faculty</a>
                        <a class="dropdown-item" href="adminLogin.php">Admin</a>
                        <a class="dropdown-item" href="staffLogin.php">General Staff</a>
                        </div>
                    </li>
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                </div>
                </nav>


            </div>

            
            
            
            
            
            <div class="container">




<div class="container" style="margin-top:10rem;">


    <div class="error col-md-7 col-lg-6 ml-auto text-center">

    <?php


            if(!empty($error))
            {

                echo '
            
            <div class="alert alert-danger"><strong>'.$error.'</strong></div>
            
            ';

            }

            else if(!empty($sucess))
            {

                echo '
            
            <div class="alert alert-success"><strong>'.$sucess.'</strong></div>
            
            ';

            }


    ?>




    </div>
    <div class="row py-5 mt-4 align-items-center">
        
        <div class="col-md-5 pr-lg-5" style="margin-bottom: 1rem;">
            <img src="logo.png" alt="" class="img-fluid mb-3 d-none d-md-block" style="margin-left:6rem;">
            <div class="display-4 text-white text-center mb-3 mr-5 text-center" style="font-size:50px; margin-left:0.7em;">Login</div>
            <p class="white text-muted mb-0 mr-5 text-center" style="margin-left: 2.1em;">Only For General Staff</p>
        </div>

        <!-- Registration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="#" method="POST">
                <div class="row">


                    <!-- Admin ID -->
                    
                    <div class="input-group col-lg-8 mx-auto mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fas fa-id-badge text-muted"></i>
                            </span>
                        </div>
                        <input id="staffId" type="text" name="staff_id" placeholder="Staff ID" class="form-control bg-white border-left-0 border-md">
                    </div>

                    

                    

                    <!-- Password -->
                    <div class="input-group col-lg-8 mx-auto mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="form-group text-center col-lg-8 mx-auto mb-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check">
                        <label class="form-check-label text-white" for="exampleCheck1">Keep me logged in</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-5 mx-auto mb-0" style="margin-top: 5px;">
                        <button type="submit" class="btn btn-primary btn-block py-2" name="log_in">
                            <span class="font-weight-bold">Login</span>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
                


            </div>

                


            <div class="footer-copyright text-center" style="margin-top:30vh ; color:white;">© 2020 Copyright:
                <a href="https://du.ac.bd"> University of Dhaka</a>
            </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>