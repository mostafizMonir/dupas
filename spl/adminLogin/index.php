<?php

  $errorMessage="";
  $errorNo=0;

  include("../dbconnect.php");

  session_start();
  

  if(empty($_SESSION['admin_id']) && empty($_COOKIE['admin_id']))
  {

    header("Location: /spl/adminLogin.php");


  }
  
  
  
  
  if(isset($_POST['log_out']))
  {

    setcookie("admin_id","",time()-86400,'/');
    setcookie("password","",time()- 86400,'/');
    session_unset();
    session_destroy();
    $_SESSION = array();
    header("Location: /spl/adminLogin.php");


  }

  $tempQuery="
  
  SELECT * FROM `signedfaculty`
  WHERE status=0;
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $pending=mysqli_num_rows($result);

  $tempQuery="
  
  SELECT * FROM `signedfaculty`
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $signedUp=mysqli_num_rows($result);

  $tempQuery="
  
  SELECT * FROM `emails`
  WHERE send_date<=CURRENT_DATE()
  AND send_date>=CURRENT_DATE()-7; 
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $sentLetters=mysqli_num_rows($result);

  $tempQuery11="
  
  SELECT * FROM `emails`
  WHERE reply=1
  AND send_date<=CURRENT_DATE()
  AND send_date>=CURRENT_DATE()-7
  ;
  
  
  ";

  $result11=mysqli_query($link,$tempQuery11);
  $Replied_1week=mysqli_num_rows($result11);


  $tempQuery11="
  
  SELECT * FROM `emails`
  WHERE reply=0
  AND send_date<=CURRENT_DATE()
  AND send_date>=CURRENT_DATE()-7
  ;
  
  
  ";

  $result11=mysqli_query($link,$tempQuery11);
  $notReplied_1week=mysqli_num_rows($result11);

  
  
  

  $tempQuery11="
  
  SELECT * FROM `emails`
  WHERE reply=0;
  
  
  ";

  $result11=mysqli_query($link,$tempQuery11);
  $notReplied=mysqli_num_rows($result11);

  $reply_percentage=(int)(($Replied_1week/($notReplied_1week+$Replied_1week))*100);

  if($notReplied>0)
  {
    $errorNo++;
    $errorMessage=$errorMessage."<strong class='text-success'>($errorNo)</strong> You have <strong class=text-danger> ".$notReplied. "</strong> letter(s) which you haven't got a reply yet.Please,click the <a href='tables.php' class='btn btn-danger text-center' style='font-size:13px;'>Got Reply</a> button after getting replies.<br><br> ";
  }

  $tempQuery111="
  
  SELECT deadline FROM `emails`
  WHERE deadline=CURRENT_DATE()+2;
  
  
  ";

  $result111=mysqli_query($link,$tempQuery111);
  $reachingDeadline=mysqli_num_rows($result111);

  if($reachingDeadline>0)
  {
    $errorNo++;
    $errorMessage=$errorMessage."<div class='text-danger'><strong class='text-success'>($errorNo)</strong> You have <strong class=text-primary> ".$reachingDeadline. "</strong> letter(s) appraoching deadline in <strong class=text-primary>Two</strong> days.Please contact the concerned faculty as soon as possible. Please,click the <a href='tables.php' class='btn btn-danger text-center' style='font-size:13px;'>Got Reply</a> button if you have got replies.<br><br></div> ";
  }

  $tempQuery1111="
  
      SELECT deadline FROM `emails` 
      WHERE deadline<CURRENT_DATE();
      
      
      ";

    $result1111=mysqli_query($link,$tempQuery1111);
    $reachedDeadline=mysqli_num_rows($result1111);

    if($reachedDeadline>0)
    {
      $errorNo++;
      $errorMessage=$errorMessage."<div class='text-danger'><strong class='text-success'>($errorNo)</strong><strong> You have <strong class=text-primary> ".$reachedDeadline. "</strong> letter(s) which have passsed Deadlies. Check <a href='tables.php'>Letters</a> and contact the concerned faculty.<br></strong> ";
    

    }

    $tempQuery="
  
  SELECT * FROM `emails`
  WHERE send_date=CURRENT_DATE()-6
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $row7=mysqli_num_rows($result);


    $tempQuery="
  
  SELECT * FROM `emails`
  WHERE send_date=CURRENT_DATE()-5
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $row6=mysqli_num_rows($result);

  $tempQuery="
  
  SELECT * FROM `emails`
  WHERE send_date=CURRENT_DATE()-4
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $row5=mysqli_num_rows($result);

  $tempQuery="
  
  SELECT * FROM `emails`
  WHERE send_date=CURRENT_DATE()-3
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $row4=mysqli_num_rows($result);

  $tempQuery="
  
  SELECT * FROM `emails`
  WHERE send_date=CURRENT_DATE()-2
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $row3=mysqli_num_rows($result);

  $tempQuery="
  
  SELECT * FROM `emails`
  WHERE send_date=CURRENT_DATE()-1
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $row2=mysqli_num_rows($result);

  $tempQuery="
  
  SELECT * FROM `emails`
  WHERE send_date=CURRENT_DATE()
  
  
  ";

  $result=mysqli_query($link,$tempQuery);
  $row1=mysqli_num_rows($result);

  $tempQuery11="
  
  SELECT * FROM `emails`
  WHERE deadline<CURRENT_DATE
  AND send_date<=CURRENT_DATE()
  AND send_date>=CURRENT_DATE()-7
  ;
  
  
  ";

  $result11=mysqli_query($link,$tempQuery11);
  $deadline_1week=mysqli_num_rows($result11);









?>


















<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href=" ../favicon.ico" type="image/x-icon">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

       <!-- Nav Item - Tables -->
       <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Letters</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user-tie"></i>
          <span>Manage Faculties</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">You can:</h6>
            <a class="collapse-item" href="verify.php"><i class="fas fa-user-check"></i>
          <span> Verify Faculties</span></a>
          <a class="collapse-item" href="updateFaculty.php"><i class="fas fa-user-edit"></i>
          <span> Update Faculties</span></a>
          <a class="collapse-item" href="enrollFaculty.php"><i class="fas fa-user-edit"></i>
          <span> Add New Faculties</span></a>
           
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
          <i class="fas fa-user-tie"></i>
          <span>Manage Staff</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">You can:</h6>
            <a class="collapse-item" href="createStaff.php"><i class="fas fa-user-check"></i>
          <span> Create Staff Account</span></a>
          <a class="collapse-item" href="updateStaff.php"><i class="fas fa-user-edit"></i>
          <span> Update Staff Account</span></a>
          </div>
        </div>
      </li>

        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse3">
          <i class="fas fa-user-tie"></i>
          <span>Send Email</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">You can:</h6>
            <a class="collapse-item" href="../email/mpdf/Template1.php"><i class="fas fa-user-check"></i>
          <span>Exam Committee</span></a>
          <a class="collapse-item" href="../email/email2/template2-view.php"><i class="fas fa-user-edit"></i>
          <span > Question Set</span></a>
              <a class="collapse-item" href="../email/mpdf/Template3.php"><i class="fas fa-user-edit"></i>
          <span> Script Scrutinizers</span></a>
              <a class="collapse-item" href="../email/mpdf/Template4.php"><i class="fas fa-user-edit"></i>
          <span> Viva Board Members</span></a>
              <a class="collapse-item" href="../email/mpdf/Template5.php"><i class="fas fa-user-edit"></i>
          <span> Result Finaliser</span></a>
          </div>
        </div>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

            <!-- Nav Item - Alerts -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="admin.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a id="logoutAdmin" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Bigger Notification-->

          <!-- Content Row -->
          <div class="row">

            <!-- Signed Up Faculty -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Signed up Faculties</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $signedUp; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Verification(s)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sent Letters (last 7 days)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$sentLetters"; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-envelope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Replies Got(last 7 days)</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $reply_percentage."%"; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo $reply_percentage.'%'; ?>" aria-valuenow="<?php echo $reply_percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div> 
          
          <?php if(!empty($errorMessage)) { ?>
          
          <div>
            

          <div class="card shadow mb-4 col-md-12">
              <div class="card-header py-3">
                
                <h6 class="m-0 font-weight-bold text-danger text-center">Alert!</h6>
              </div>
              <div class="card-body text-center text-primary">
                <?php echo $errorMessage ?>
              </div>
            </div>


          </div>
        
          
        <?php }; ?>

            

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Letter Stats(Last 7 Days)</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Letters Overview(Last 7 Days)</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small" style="font-size: 10px;">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Sent Letter(s)
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Repliable Letter(s)
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Replie(s) Got
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Deadline Reached
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

              

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>© 2020 Copyright:
                <a href="https://du.ac.bd"> University of Dhaka</a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <form method="POST"> 
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="log_out">Logout</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/chart-bar-demo.js"></script> -->
  <script>

                  // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
          // *     example: number_format(1234.56, 2, ',', ' ');
          // *     return: '1 234,56'
          number = (number + '').replace(',', '').replace(' ', '');
          var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
              var k = Math.pow(10, prec);
              return '' + Math.round(n * k) / k;
            };
          // Fix for IE parseFloat(0.55).toFixed(0) = 0;
          s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
          if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
          }
          if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
          }
          return s.join(dec);
        }

        // Bar Chart Example
        var ctx = document.getElementById("myBarChart");
        var myBarChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ["<?php echo date("Y/m/d") ?>", "<?php echo date('Y-m-d', strtotime("-1 days")); ?>", "<?php echo date('Y-m-d', strtotime("-2 days")); ?>", "<?php echo date('Y-m-d', strtotime("-3 days")); ?>", "<?php echo date('Y-m-d', strtotime("-4 days")); ?>", "<?php echo date('Y-m-d', strtotime("-5 days")); ?>","<?php echo date('Y-m-d', strtotime("-6 days")); ?>"],
            datasets: [{
              label: "Letter(s) Sent",
              backgroundColor: "#4e73df",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#4e73df",
              data: [<?php echo $row1.','.$row2.','.$row3.','.$row4.','.$row5.','.$row6.','.$row7; ?>],
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 7
                },
                maxBarThickness: 20,
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: 100,
                  maxTicksLimit: 20,
                  padding: 10,
                  
                  
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: false
            },
            tooltips: {
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
              
            },
          }
        });





  </script>

  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Sent Letters", "Repliable Letters", "Replies Got","Deadlines Reached"],
    datasets: [{
      data: [<?php echo $sentLetters.','.($Replied_1week+$notReplied_1week).','.$Replied_1week.','.$deadline_1week; ?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#ff0000'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#CA3F21'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

  </script>

</body>

</html>
