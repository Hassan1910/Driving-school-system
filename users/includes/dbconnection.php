<?php
$con = mysqli_connect("localhost", "root", "", "phplicts_cdsms");
if (mysqli_connect_errno()) {
  echo "Connection Fail" . mysqli_connect_error();
}
