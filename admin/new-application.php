<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['cdsmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_GET['action']) && isset($_GET['userid'])) {
        $userid = intval($_GET['userid']);
        $action = $_GET['action'];
        if ($action == 'approve') {
            $query = mysqli_query($con, "UPDATE tblregusers SET Status='active' WHERE ID='$userid'");
        } else if ($action == 'decline') {
            $query = mysqli_query($con, "UPDATE tblregusers SET Status='declined' WHERE ID='$userid'");
        }
        if ($query) {
            echo "<script>alert('User status updated successfully.'); window.location.href='new-application.php';</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.'); window.location.href='new-application.php';</script>";
        }
    }
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CDSMS User Management</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">
        <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>User Management</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li class="active">User Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">View New Applications</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Registration Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT ID, FirstName, LastName, MobileNumber, Email, Status, RegDate FROM tblregusers WHERE Status='pending'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['FirstName']; ?></td>
                                        <td><?php echo $row['LastName']; ?></td>
                                        <td><?php echo $row['MobileNumber']; ?></td>
                                        <td><?php echo $row['Email']; ?></td>
                                        <td><?php echo ucfirst($row['Status']); ?></td>
                                        <td><?php echo $row['RegDate']; ?></td>
                                        <td>
                                            <a href="new-application.php?action=approve&userid=<?php echo $row['ID']; ?>" class="btn btn-success">Approve</a>
                                            <a href="new-application.php?action=decline&userid=<?php echo $row['ID']; ?>" class="btn btn-danger">Decline</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $cnt = $cnt + 1;
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
<?php } ?>
