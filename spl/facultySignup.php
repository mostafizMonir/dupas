<?php
    
    include("dbconnect.php");

    
    $sucess="";
    $error="";
    $errorFlag=0;

    if(isset($_POST['create']))
    {
        if($_POST['firstname_english'] == "")
        
        {

            $errorFlag++;
            $error=$error."You need to provide your name in English.<br>";

        }
    
        else if($_POST['firstname_bangla'] == "")
        
        {
            $errorFlag++;
            $error=$error."You need to provide your name in Bangla.<br>";

        }
        else if($_POST['teacher_id'] == ""  || !is_numeric( $_POST['teacher_id']) )
        
        {
            $errorFlag++;
            $error=$error."You need to provide your valid teacher ID.<br>";

        }


        else if($_POST['dept_name'] == "")
        
        {
            $errorFlag++;
            $error=$error."You need to provide your insitution/department name.<br>";

        }

        else if($_POST['designation'] == "")
        
        {
            $errorFlag++;
            $error=$error."You need to provide your Designation.<br>";

        }
        else if($_POST['email'] == "")
        
        {
            $errorFlag++;
            $error=$error."You need to provide your valid email address.<br>";

        }

        else if($_POST['phone'] == "")
        
        {
            $errorFlag++;
            $error=$error."You need to provide your active phone number.<br>";

        }

        else if($_POST['password'] == "")
        
        {
            $errorFlag++;
            $error=$error."You need to provide a password.<br>";

        }

        else if($_POST['passwordConfirmation'] == "")
        
        {
            $errorFlag++;
            $error=$error."You need to confirm your password.<br>";

        }

        else if($_POST['password'] != $_POST['passwordConfirmation'])
        {
            $errorFlag++;
            $error=$error."Your confirmed password didn't match.<br>";
        }

        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorFlag++;
            $error=$error."Invalid email address.<br>";
         }

        $email=mysqli_real_escape_string($link,$_POST['email']);
        $firstname=mysqli_real_escape_string($link,$_POST['firstname_english']);
        $lastname=mysqli_real_escape_string($link,$_POST['firstname_bangla']);
        $id=mysqli_real_escape_string($link,$_POST['teacher_id']);
        $dept=mysqli_real_escape_string($link,$_POST['dept_name']);
        $phone=mysqli_real_escape_string($link,$_POST['phone']);
        $password=md5(mysqli_real_escape_string($link,$_POST['password'])) ;
        $designation=mysqli_real_escape_string($link,$_POST['designation']);


        $tempQuery='SELECT * FROM `signedfaculty` WHERE email="'.$email.'"';
      
        $temp=mysqli_query($link,$tempQuery);
        
        if(mysqli_num_rows($temp) > 0)
        {
              $errorFlag++;
              $error=$error."This email is already taken <br>";
        }

        $tempQuery='SELECT * FROM `signedfaculty` WHERE teacher_id="'.$id.'"';
      
        $temp=mysqli_query($link,$tempQuery);
        
        if(mysqli_num_rows($temp) > 0)
        {
              $errorFlag++;
              $error=$error."You have already registered.Please login to update your informations.<br>";
        }




        if($errorFlag == 0)

        {
            $query="

            INSERT INTO `signedfaculty` (`teacher_id`, `nameEng`, `nameBang`, `dept`,`designation`, `email`, `phone`, `password`) VALUES ('$id', '$firstname', '$lastname', '$dept','$designation', '$email', '$phone', '$password')
            LIMIT 1
            
            ";

            $result=mysqli_query($link,$query);

            if($result)
            {
                $sucess=$sucess."Thanks!Your account has been successfully created.<br>";
            }
            
            



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
        
        <div class="col-md-5 pr-lg-5" style="margin-bottom: 6rem;">
            <img src="logo.png" alt="" class="img-fluid mb-3 d-none d-md-block" style="margin-left:6rem;">
            <div class="display-4 text-white text-center" style="font-size:50px;">Create an Account</div>
            <p class="white text-muted mb-0 mr-5 text-center" style="margin-left: 2.1em;">Only For Faculties.</p>
        </div>

        <!-- Registration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="#" method="POST">
                <div class="row">

                    <!-- First Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="firstName" type="text" name="firstname_english" placeholder="Name (English)" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- First Name(in Bangla) -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="firstName" type="text" name="firstname_bangla" placeholder="নাম (বাংলা) " class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Teacher ID -->
                    
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fas fa-id-badge text-muted"></i>
                            </span>
                        </div>
                        <input id="teacherId" type="text" name="teacher_id" placeholder="Teacher ID" class="form-control bg-white border-left-0 border-md">
                    </div>


                    <!-- Designation -->
                    
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fas fa-user-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="desig" name="designation" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                            <option value="" hidden selected>Designation</option>
                            <option value="প্রভাষক">Lecturer</option>
                            <option value="সহকারী অধ্যাপক">Assistant Professor</option>
                            <option value="সহযোগী অধ্যাপক">Associate Professor</option>
                            <option value="অধ্যাপক">Professor</option>
                        </select>
                    </div>

                    <!-- Institue/Dept -->
                    
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fas fa-university text-muted"></i>
                            </span>
                        </div>
                        <input id="dept" type="text" name="dept_name" placeholder="Department/Institute Name" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                        <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                            <option value="">+88</option>
                        </select>
                        <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                    </div>

                    

                    

                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                    </div>



                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2" name="create">
                            <span class="font-weight-bold">Create your account</span>
                        </button>
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Already Registered? <a href="facultyLogin.php" class="text-primary ml-2">Login</a></p>
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