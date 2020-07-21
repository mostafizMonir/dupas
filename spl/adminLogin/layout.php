<?php

/*include("dbconnect.php");

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

if(isset($_GET['tid']))
{
    $tid=$_GET['tid'];
    $tempQuery2="
                                
                                UPDATE `signedfaculty`
                                SET status=1
                                WHERE teacher_id=$tid
                                LIMIT 1;
                                
                                ";



    mysqli_query($link,$tempQuery2);
    header('location:verify.php');





}*/






?>









<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">







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


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!--<footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
          <span>© 2020 Copyright:
                <a href="https://du.ac.bd"> University of Dhaka</a></span>
                </div>
            </div>
        </footer>-->
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
