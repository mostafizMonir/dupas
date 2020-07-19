<?php

include("dbconnect.php");


?>




<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <!-- <link rel="stylesheet" href="navbar.css"> -->
    <!-- <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <link href="fa/css/all.css" rel="stylesheet">

    <title>Postal Automation System</title>


    <style>

        body{

            background:none;
        }
     


    </style>
  </head>
  <body>

            <div>

                <nav class="navbar fixed-top navbar-expand-lg" style="color:white;background:none;">
                
                
                
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: black;">
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
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                </nav>


            </div>
  
            <div class="container">

                    <div class="card text-center mx-auto" style="margin-top:30%; height:20em; background:none; border:none;">
                
                    <div class="card-body" style="color:white; display:inline-block;">
                        
                       <div class="display-2"> Postal Automation System <div>
                           <div class="text-muted"style="font-size: 25px; margin-top:15px;">
                                Room No:306,Registrar Building,University of Dhaka.
                           </div>
                        
                        

                    </div>
                    </div>

            </div>

            <div class="footer-copyright text-center" style="margin-top:30vh ; color:white;">© 2020 Copyright:
                <a href="https://du.ac.bd"> University of Dhaka</a>
            </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>        
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>