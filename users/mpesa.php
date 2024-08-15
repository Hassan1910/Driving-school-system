<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../admin/includes/dbconnection.php');

if (strlen($_SESSION['cdsmsuid']) == 0) {
    header('location:logout.php');
}

$paymentSuccess = false; // Flag to check if the payment was successful
$errorMsg = ""; // Variable to store error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['Username'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];

    if ($con->connect_error) {
        $errorMsg = "Connection failed: " . $con->connect_error;
    } else {
        $query = "INSERT INTO mpesa_payments (username, phone, amount) VALUES (?, ?, ?)";
        $stmt = $con->prepare($query);

        if ($stmt) {
            $stmt->bind_param("ssd", $username, $phone, $amount);

            if ($stmt->execute()) {
                $paymentSuccess = true; // Set the flag to true on successful payment
            } else {
                $errorMsg = "Error executing query: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $errorMsg = "Error preparing query: " . $con->error;
        }
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CDSMS User Dashboard</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../admin/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/vendors/jqvmap/dist/jqvmap.min.css">

    <link rel="stylesheet" href="../admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <?php include_once('includes/header.php');?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Mpesa</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Mpesa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- M-Pesa Payment Form -->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>M-Pesa Payment</strong></div>
                            <div class="card-body card-block">
                                <?php if ($paymentSuccess): ?>
                                    <div class="alert alert-success" role="alert">
                                        Payment successfully done!
                                    </div>
                                <?php elseif ($errorMsg): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMsg; ?>
                                    </div>
                                <?php endif; ?>
                                <form action="" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="Username" class="form-control-label">Username</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="Username" name="Username" placeholder="Username" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="phone" class="form-control-label">Phone Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Enter your phone number" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="amount" class="form-control-label">Amount</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="amount" name="amount" placeholder="Enter amount" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9">
                                            <button type="submit" class="btn btn-primary btn-sm">Pay Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <script src="../admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../admin/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../admin/assets/js/main.js"></script>

    <script src="../admin/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../admin/assets/js/dashboard.js"></script>
    <script src="../admin/assets/js/widgets.js"></script>
    <script src="../admin/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
</body>
</html>
