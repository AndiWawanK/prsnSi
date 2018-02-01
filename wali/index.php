<?php
require_once "../template/header.php";
if($_SESSION['status'] !== 'Y'){
  header('location: ../index.php');
}
?>



<?php require_once "../template/footer.php"; ?>
