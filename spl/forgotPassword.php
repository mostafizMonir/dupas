<?php
    
    include("dbconnect.php");
    include("brandop.php");

    $obj = new OS_BR();

    function generateNewString($len = 10) {
		$token = "qwertyuiopasdfghjkll123456789";
		$token = str_shuffle($token);
		$token = substr($token, 0, $len);

		return $token;
    }
    


    
    $sucess="";
    $error="";
    $errorFlag=0;

    if (isset($_POST['reset'])) {

        $token=generateNewString();

        $token_expire=time()+86400;
        
        
        $email=mysqli_real_escape_string($link,$_POST['email']);
        $name="";

        $emailQuery="
        
            SELECT * FROM `signedfaculty`
            WHERE email='$email';
        
        
        ";

        $nameQuery="
        
            SELECT last_name FROM `signedfaculty`
            WHERE email='$email';
        
        
        ";

        $nameAuthenticate=mysqli_query($link,$nameQuery);

        $row=mysqli_fetch_array($nameAuthenticate);

        $name=$row['last_name'];

        $emailAunthenticate=mysqli_query($link,$emailQuery);

        $result1 = mysqli_num_rows($emailAunthenticate);



        if($result1 == 1)
        {

            session_start();
            
            $tempQuery="
            
            UPDATE `signedfaculty`
            SET token='$token',
            tokenExpire='$token_expire'
            WHERE email='$email'
            LIMIT 1;
            
            
            
            ";

            mysqli_query($link,$tempQuery);

            $to = $email; 
            $from = 'db28111997@gmail.com'; 
            $fromName = "ICT-Cell,University Of Dhaka"; 
             
            $subject = "Reset Password"; 
             
            $htmlContent = ' 
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
              <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta name="x-apple-disable-message-reformatting" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title></title>
                <style type="text/css" rel="stylesheet" media="all">
                /* Base ------------------------------ */
                
                @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&amp;display=swap");
                body {
                  width: 100% !important;
                  height: 100%;
                  margin: 0;
                  -webkit-text-size-adjust: none;
                }
                
                a {
                  color: #3869D4;
                }
                
                a img {
                  border: none;
                }
                
                td {
                  word-break: break-word;
                }
                
                .preheader {
                  display: none !important;
                  visibility: hidden;
                  mso-hide: all;
                  font-size: 1px;
                  line-height: 1px;
                  max-height: 0;
                  max-width: 0;
                  opacity: 0;
                  overflow: hidden;
                }
                /* Type ------------------------------ */
                
                body,
                td,
                th {
                  font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                }
                
                h1 {
                  margin-top: 0;
                  color: #333333;
                  font-size: 22px;
                  font-weight: bold;
                  text-align: left;
                }
                
                h2 {
                  margin-top: 0;
                  color: #333333;
                  font-size: 16px;
                  font-weight: bold;
                  text-align: left;
                }
                
                h3 {
                  margin-top: 0;
                  color: #333333;
                  font-size: 14px;
                  font-weight: bold;
                  text-align: left;
                }
                
                td,
                th {
                  font-size: 16px;
                }
                
                p,
                ul,
                ol,
                blockquote {
                  margin: .4em 0 1.1875em;
                  font-size: 16px;
                  line-height: 1.625;
                }
                
                p.sub {
                  font-size: 13px;
                }
                /* Utilities ------------------------------ */
                
                .align-right {
                  text-align: right;
                }
                
                .align-left {
                  text-align: left;
                }
                
                .align-center {
                  text-align: center;
                }
                /* Buttons ------------------------------ */
                
                .button {
                  background-color: #3869D4;
                  border-top: 10px solid #3869D4;
                  border-right: 18px solid #3869D4;
                  border-bottom: 10px solid #3869D4;
                  border-left: 18px solid #3869D4;
                  display: inline-block;
                  color: #FFF;
                  text-decoration: none;
                  border-radius: 3px;
                  box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                  -webkit-text-size-adjust: none;
                  box-sizing: border-box;
                }
                
                .button--green {
                  background-color: #22BC66;
                  border-top: 10px solid #22BC66;
                  border-right: 18px solid #22BC66;
                  border-bottom: 10px solid #22BC66;
                  border-left: 18px solid #22BC66;
                }
                
                .button--red {
                  background-color: #FF6136;
                  border-top: 10px solid #FF6136;
                  border-right: 18px solid #FF6136;
                  border-bottom: 10px solid #FF6136;
                  border-left: 18px solid #FF6136;
                }
                
                @media only screen and (max-width: 500px) {
                  .button {
                    width: 100% !important;
                    text-align: center !important;
                  }
                }
                /* Attribute list ------------------------------ */
                
                .attributes {
                  margin: 0 0 21px;
                }
                
                .attributes_content {
                  background-color: #F4F4F7;
                  padding: 16px;
                }
                
                .attributes_item {
                  padding: 0;
                }
                /* Related Items ------------------------------ */
                
                .related {
                  width: 100%;
                  margin: 0;
                  padding: 25px 0 0 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
                
                .related_item {
                  padding: 10px 0;
                  color: #CBCCCF;
                  font-size: 15px;
                  line-height: 18px;
                }
                
                .related_item-title {
                  display: block;
                  margin: .5em 0 0;
                }
                
                .related_item-thumb {
                  display: block;
                  padding-bottom: 10px;
                }
                
                .related_heading {
                  border-top: 1px solid #CBCCCF;
                  text-align: center;
                  padding: 25px 0 10px;
                }
                /* Discount Code ------------------------------ */
                
                .discount {
                  width: 100%;
                  margin: 0;
                  padding: 24px;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  background-color: #F4F4F7;
                  border: 2px dashed #CBCCCF;
                }
                
                .discount_heading {
                  text-align: center;
                }
                
                .discount_body {
                  text-align: center;
                  font-size: 15px;
                }
                /* Social Icons ------------------------------ */
                
                .social {
                  width: auto;
                }
                
                .social td {
                  padding: 0;
                  width: auto;
                }
                
                .social_icon {
                  height: 20px;
                  margin: 0 8px 10px 8px;
                  padding: 0;
                }
                /* Data table ------------------------------ */
                
                .purchase {
                  width: 100%;
                  margin: 0;
                  padding: 35px 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
                
                .purchase_content {
                  width: 100%;
                  margin: 0;
                  padding: 25px 0 0 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
                
                .purchase_item {
                  padding: 10px 0;
                  color: #51545E;
                  font-size: 15px;
                  line-height: 18px;
                }
                
                .purchase_heading {
                  padding-bottom: 8px;
                  border-bottom: 1px solid #EAEAEC;
                }
                
                .purchase_heading p {
                  margin: 0;
                  color: #85878E;
                  font-size: 12px;
                }
                
                .purchase_footer {
                  padding-top: 15px;
                  border-top: 1px solid #EAEAEC;
                }
                
                .purchase_total {
                  margin: 0;
                  text-align: right;
                  font-weight: bold;
                  color: #333333;
                }
                
                .purchase_total--label {
                  padding: 0 15px 0 0;
                }
                
                body {
                  background-color: #F2F4F6;
                  color: #51545E;
                }
                
                p {
                  color: #51545E;
                }
                
                .email-wrapper {
                  width: 100%;
                  margin: 0;
                  padding: 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  background-color: #F2F4F6;
                }
                
                .email-content {
                  width: 100%;
                  margin: 0;
                  padding: 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
                /* Masthead ----------------------- */
                
                .email-masthead {
                  padding: 25px 0;
                  text-align: center;
                }
                
                .email-masthead_logo {
                  width: 94px;
                }
                
                .email-masthead_name {
                  font-size: 16px;
                  font-weight: bold;
                  color: #A8AAAF;
                  text-decoration: none;
                  text-shadow: 0 1px 0 white;
                }
                /* Body ------------------------------ */
                
                .email-body {
                  width: 100%;
                  margin: 0;
                  padding: 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
                
                .email-body_inner {
                  width: 570px;
                  margin: 0 auto;
                  padding: 0;
                  -premailer-width: 570px;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  background-color: #FFFFFF;
                }
                
                .email-footer {
                  width: 570px;
                  margin: 0 auto;
                  padding: 0;
                  -premailer-width: 570px;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  text-align: center;
                }
                
                .email-footer p {
                  color: #A8AAAF;
                }
                
                .body-action {
                  width: 100%;
                  margin: 30px auto;
                  padding: 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  text-align: center;
                }
                
                .body-sub {
                  margin-top: 25px;
                  padding-top: 25px;
                  border-top: 1px solid #EAEAEC;
                }
                
                .content-cell {
                  padding: 45px;
                }
                /*Media Queries ------------------------------ */
                
                @media only screen and (max-width: 600px) {
                  .email-body_inner,
                  .email-footer {
                    width: 100% !important;
                  }
                }
                
                @media (prefers-color-scheme: dark) {
                  body,
                  .email-body,
                  .email-body_inner,
                  .email-content,
                  .email-wrapper,
                  .email-masthead,
                  .email-footer {
                    background-color: #333333 !important;
                    color: #FFF !important;
                  }
                  p,
                  ul,
                  ol,
                  blockquote,
                  h1,
                  h2,
                  h3 {
                    color: #FFF !important;
                  }
                  .attributes_content,
                  .discount {
                    background-color: #222 !important;
                  }
                  .email-masthead_name {
                    text-shadow: none !important;
                  }
                }
                </style>
                <!--[if mso]>
                <style type="text/css">
                  .f-fallback  {
                    font-family: Arial, sans-serif;
                  }
                </style>
              <![endif]-->
                <style type="text/css" rel="stylesheet" media="all">
                body {
                  width: 100% !important;
                  height: 100%;
                  margin: 0;
                  -webkit-text-size-adjust: none;
                }
                
                body {
                  font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                }
                
                body {
                  background-color: #F2F4F6;
                  color: #51545E;
                }
                </style>
              </head>
              <body style="width: 100% !important; height: 100%; -webkit-text-size-adjust: none; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; background-color: #F2F4F6; color: #51545E; margin: 0;" bgcolor="#F2F4F6">
                <span class="preheader" style="display: none !important; visibility: hidden; mso-hide: all; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; opacity: 0; overflow: hidden;">Use this link to reset your password. The link is only valid for 24 hours.</span>
                <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; background-color: #F2F4F6; margin: 0; padding: 0;" bgcolor="#F2F4F6">
                  <tr>
                    <td align="center" style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px;">
                      <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; margin: 0; padding: 0;">
                        <tr>
                          <td class="email-masthead" style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; padding: 25px 0;" align="center">
                            <a href="localhost:82/spl" class="f-fallback email-masthead_name" style="color: #A8AAAF; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
                            Postal Automation System,Office of the Registrar,University Of Dhaka.
                          </a>
                          </td>
                        </tr>
                        <!-- Email Body -->
                        <tr>
                          <td class="email-body" width="570" cellpadding="0" cellspacing="0" style="word-break: break-word; margin: 0; padding: 0; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0;">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="width: 570px; -premailer-width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; background-color: #FFFFFF; margin: 0 auto; padding: 0;" bgcolor="#FFFFFF">
                              <!-- Body content -->
                              <tr>
                                <td class="content-cell" style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; padding: 45px;">
                                  <div class="f-fallback">
                                    <h1 style="margin-top: 0; color: #333333; font-size: 22px; font-weight: bold; text-align: left;" align="left">Hi Mr/Mrs.'.$name.',</h1>
                                    <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">You recently requested to reset your password for your account. Use the button below to reset it. <strong>This password reset is only valid for the next 24 hours.</strong></p>
                                    <!-- Action -->
                                    <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; text-align: center; margin: 30px auto; padding: 0;">
                                      <tr>
                                        <td align="center" style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px;">
                                          <!-- Border based button
                       https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                            <tr>
                                              <td align="center" style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px;">
                                                <a href="http://27.147.231.233:82/spl/resetPassword.php?email='.$email.'&token='.$token.'" class="f-fallback button button--green" target="_blank" style="color: #FFF; border-color: #22bc66; border-style: solid; border-width: 10px 18px; background-color: #22BC66; display: inline-block; text-decoration: none; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); -webkit-text-size-adjust: none; box-sizing: border-box;">Reset your password</a>
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                    <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">For security, this request was received from a <a>'. $obj->showInfo("os") .'</a> device using <a>'. $obj->showInfo("browser").'</a>. If you did not request a password reset, please ignore this email or <a href="" style="color: #3869D4;">contact support</a> if you have questions.</p>
                                    <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">Thanks,
                                      <br />ICT Cell,University Of Dhaka.</p>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px;">
                            <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="width: 570px; -premailer-width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; text-align: center; margin: 0 auto; padding: 0;">
                              <tr>
                                <td class="content-cell" align="center" style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; padding: 45px;">
                                  <p class="f-fallback sub align-center" style="font-size: 13px; line-height: 1.625; text-align: center; color: #A8AAAF; margin: .4em 0 1.1875em;" align="center">© 2020 [Postal Automation System]. All rights reserved.</p>
                                  <p class="f-fallback sub align-center" style="font-size: 13px; line-height: 1.625; text-align: center; color: #A8AAAF; margin: .4em 0 1.1875em;" align="center">
                                    ICT Cell
                                    <br />Registrar Building
                                    <br />University Of Dhaka.
                                  </p>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </body>
            </html>'; 
             
            // Set content-type header for sending HTML email 
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
             
            // Additional headers 
            $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
             
            // Send email 
            if(mail($to, $subject, $htmlContent, $headers)){ 
                
                $sucess=$sucess."A recovery email has been sent to your provided mail account<br>";
           
            }

    

        }

        else if( $result1 == 0){

            $error=$error. "The email doesn't exist.<br>";

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
            <div class="display-4 text-white text-center mx-4 mb-3 mr-5 text-center" style="font-size:30px;">Recover Password</div>
            <p class="white text-muted mx-3 mb-0 mr-5 text-center">Only For Faculties</p>
        </div>

        <!-- Registration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="#" method="POST">
                <div class="row">


                    <!-- Email -->
                    
                    <div class="input-group col-lg-8 mx-auto mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                    </div>

                    

                    

                  
                    <!-- Submit Button -->
                    <div class="form-group col-lg-5 mx-auto mb-0" style="margin-top: 5px;">
                        <button type="submit" class="btn btn-primary btn-block py-2" name="reset">
                            <span class="font-weight-bold">Reset Password</span>
                        </button>
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    <!-- Login -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Want to<a href="facultyLogin.php" class="text-primary ml-2">Login!</a></p>
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