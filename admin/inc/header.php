<?php 
    include '../lib/Session.php';
    Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php 
    $db = new Database();
    $fm = new Format();
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title> Admin</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
<link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
<!-- BEGIN: load jquery -->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
<script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
<script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- END: load jquery -->
<script type="text/javascript" src="js/table/table.js"></script>
<script src="js/setup.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
setupLeftMenu();
setSidebarHeight();
});
</script>

</head>
<body>
<div class="container_12">
<div class="grid_12 header-repeat">
<div id="branding">
    <div class="floatleft logo">
        <img src="img/livelogo.png" alt="Logo" />
	</div>
	<div class="floatleft middle">
		<h1>Coffee Houser Adda</h1>
		<p>www.promahmudul.com</p>
	</div>
    <div class="floatright">
        <div class="floatleft">
            <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
<?php 
    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        Session::destroy();
    }
?>
        <div class="floatleft marginleft10">
            <ul class="inline-ul floatleft">
                <li>Hello <?php echo Session::get('username'); ?></li>
                <li><a href="?action=logout">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="clear">
    </div>
</div>
</div>
<div class="clear">
</div>
<div class="grid_12">
<ul class="nav main">
    <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
    <li class="ic-dashboard"><a href="theme.php"><span>Theme</span></a> </li>
    <li class="ic-form-style"><a href="profile.php"><span>User Profile</span></a></li>
	<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
	<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox
  <?php 
    $query = "SELECT * FROM tbl_contact WHERE status = '0' ORDER BY id DESC";
    $msg = $db->select($query);
    if ($msg) {
      $count = mysqli_num_rows($msg);
      echo "(".$count.")";
    } else{
      echo "(0)";
    }
  ?>
  </span></a></li>
<?php if (Session::get('userRole') == '0') { ?>
  <li class="ic-charts"><a href="adduser.php"><span>Add User</span></a></li>
<?php } ?>
    
    <li class="ic-charts"><a href="userlist.php"><span>User List</span></a></li>
<!--     <li class="ic-charts"><a href="postlist.php"><span>Visit Website</span></a></li> -->
</ul>
</div>
<div class="clear">
</div>
