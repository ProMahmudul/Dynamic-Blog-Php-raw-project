<?php 
    include '../lib/Session.php';
    Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php 
    $db = new Database();
?>
<?php 
    if (!isset($_GET['delpage']) || $_GET['delpage'] == NULL) {
        echo "<script>window.location = 'index.php';</script>";
        // header("Location: catlist.php")
    } else{
        $pageid = $_GET['delpage'];

        $delquery = "DELETE FROM tbl_page WHERE id = '$pageid'";
        $delData = $db->delete($delquery);
        if ($delData) {
        	echo "<script>alert('Page Deleted Successfully.');</script>";
        	echo "<script>window.location = 'index.php';</script>";
        } else{
        	echo "<script>alert('Page not Deleted.');</script>";
        	echo "<script>window.location = 'index.php';</script>";
        }
    }
?>