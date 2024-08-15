<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cdsmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $apid = $_GET['viewid'];
        $remark = $_POST['remark'];
        $status = $_POST['status'];
        $depositfee = $_POST['depositfee'];

        $query = mysqli_query($con, "insert into tblpaymenthistory(ApplicationID,PaymentAmount,Remark,PaymentStatus) value('$apid','$depositfee','$remark','$status')");
        $query .= mysqli_query($con, "update tblapplication set Status='$status',Remark='$remark' where ID='$apid'");
        if ($query) {
            echo "<script>alert('All remarks have been updated.');</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CDSMS View Payments</title>
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
    <!-- Left Panel -->
    <?php include_once('includes/sidebar.php'); ?>

    <div id="right-panel" class="right-panel">
        <!-- Header -->
        <?php include_once('includes/header.php'); ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Payments</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="view-payments-details.php">View Payments</a></li>
                            <li class="active">Payments</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- .card -->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>View</strong><small> Payments</small></div>
                            <div class="card-body card-block">
                                <?php
                                $cid = $_GET['viewid'];
                                $ret = mysqli_query($con, "SELECT tblregusers.ID,tblregusers.FirstName,tblregusers.LastName,tblregusers.MobileNumber as umobno,tblregusers.Email as uemail,tblpackages.PackageName,tblpackages.PackageDec,tblpackages.PackageDuration,tblpackages.PackagePrice,tblpackages.PackageDate,tblapplication.ID as aapid, tblapplication.PackID,tblapplication.Status as astatus,tblapplication.RegNumber,tblapplication.UserId,tblapplication.TakenFor,tblapplication.RegDate,tblapplication.FullName,tblapplication.Email,tblapplication.MobileNumber,tblapplication.Gender,tblapplication.Age,tblapplication.LicenceNumber,tblapplication.UploadLicence,tblapplication.Address,tblapplication.AlternateNumber,tblapplication.TrainingDate,tblapplication.TrainingTiming,tblapplication.RegDate FROM tblapplication JOIN tblpackages ON tblpackages.ID=tblapplication.PackID JOIN tblregusers ON tblregusers.ID=tblapplication.UserId WHERE tblapplication.ID='$cid'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>

                                <button onclick="printReceipt()">Print Receipt</button>
                                <!--<a href="download-receipt.php?viewid=<?php echo $cid; ?>" target="_blank">Download Receipt</a> -->

                                <div id="receipt">
                                    <table border="1" class="table table-bordered mg-b-0">
                                        <tr>
                                            <th>Registration Number</th>
                                            <td colspan="4" style="font-size:20px;color: blue;text-align: center;">
                                                <?php echo $row['RegNumber']; ?>
                                            </td>
                                        </tr>
                                        <?php if ($row['TakenFor'] == "Family Member") : ?>
                                        <tr>
                                            <th>Family Member Full Name</th>
                                            <td colspan="4"><?php echo $row['FullName']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Family Member Email</th>
                                            <td><?php echo $row['Email']; ?></td>
                                            <th>Family Member Mobile Number</th>
                                            <td><?php echo $row['MobileNumber']; ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if ($row['TakenFor'] == "Myself") : ?>
                                        <tr>
                                            <th>Full Name</th>
                                            <td colspan="4"><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $row['uemail']; ?></td>
                                            <th>Mobile Number</th>
                                            <td><?php echo $row['umobno']; ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <th>Package Name</th>
                                            <td><?php echo $row['PackageName']; ?></td>
                                            <th>Package Duration</th>
                                            <td><?php echo $row['PackageDuration']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Package Price</th>
                                            <td colspan="3"><?php echo $packprice = $row['PackagePrice']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td><?php echo $row['Gender']; ?></td>
                                            <th>Age</th>
                                            <td><?php echo $row['Age']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Licence Number</th>
                                            <td><?php echo $row['LicenceNumber']; ?></td>
                                            <th>Licence Image</th>
                                            <td><img src="../users/licimagesimages/<?php echo $row['UploadLicence']; ?>" width="200" height="150"></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td><?php echo $row['Address']; ?></td>
                                            <th>Alternate Number</th>
                                            <td><?php echo $row['AlternateNumber']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Training Start Date</th>
                                            <td><?php echo $row['TrainingDate']; ?></td>
                                            <th>Training Timing</th>
                                            <td><?php echo $row['TrainingTiming']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td colspan="3"><?php echo ($row['astatus'] == "") ? "Pending" : $row['astatus']; ?></td>
                                        </tr>
                                    </table>

                                    <!-- Payment History -->
                                    <?php
                                    $ret1 = mysqli_query($con, "SELECT * FROM tblpaymenthistory WHERE ApplicationID='$cid'");
                                    $num = mysqli_num_rows($ret1);
                                    ?>

                                    <table border="1" class="table table-bordered mg-b-0">
                                        <tr>
                                            <th colspan="5" style="text-align:center;color:blue; font-size:20px;">Payment History</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Remarks</th>
                                            <th>Amount Deposit</th>
                                            <th>Status</th>
                                            <th>Payment Date</th>
                                        </tr>
                                        <?php
                                        if ($num > 0) {
                                            $cnt = 1;
                                            while ($result = mysqli_fetch_array($ret1)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $result['Remark']; ?></td>
                                            <td><?php echo $tamt = $result['PaymentAmount']; ?></td>
                                            <td><?php echo $result['PaymentStatus']; ?></td>
                                            <td><?php echo $result['PaymentDate']; ?></td>
                                        </tr>
                                        <?php
                                                $cnt++;
                                            }
                                        } else {
                                        ?>
                                        <tr>
                                            <th colspan="5" style="text-align:center; color:red;">No Transaction Yet</th>
                                        </tr>
                                        <?php
                                        }
                                        $gtotal += $tamt;
                                        ?>
                                        <tr>
                                            <th colspan="2" style="text-align:center">Total</th>
                                            <td><?php echo $gtotal; ?></td>
                                            <td colspan="2"></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- .animated -->
                </div>
                <!-- .content -->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
    function printReceipt() {
        var receiptContent = document.getElementById('receipt').innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = receiptContent;

        window.print();

        document.body.innerHTML = originalContent;
        window.location.reload(); // Reload the page to restore original content
    }
    </script>
</body>

</html>
