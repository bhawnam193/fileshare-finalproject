<?php
session_start();
include_once '../buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsgrp();
    $obj->grpownregcod=$_SESSION["cod"];
    $obj->grpcrtdat= date('y-m-d');
    $obj->grpnam=$_POST["txtgrpnam"];
   
    $obj->save_rec();
}
?>
<html>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Share</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form name="frmgrp" action="frmgrp.php" method="POST">
<div id="main_header">
  <div id="header">
    <ul>
      <li><a href="http://www.free-css.com/" class="home">home</a></li>
      <li><a href="http://www.free-css.com/" class="user" title="user">user</a></li>
      <li><a href="http://www.free-css.com/" class="contact">contact</a></li>
    </ul>
<!--    <ul class="free">
      <li><a class="call">800-121-4545 759-121-5454</a></li>
    </ul>-->
    <img src="../images/logo.gif" alt="appleweb" width="205" height="65" title="appleweb" />
    <ul class="navi">
        <li><a href="frmdoc.php">My Documents</a></li>
      <li><a href="frmdocshr.php">Shared Documents</a></li>
      <li><a href="frmseldoc.php">Sell Documents</a></li>
      <li><a href="frmpurdoc.php">Purchase Documents</a></li>
       <li><a href="frmmypur.php">Documents Purchased</a></li>
       <li><a href="frmgrp.php">Groups</a></li>
    </ul>
  </div>
</div>
        <div id="main_body">
  <div id="body">
 <br class="balnk" />
  </div>
</div>
<!--    <form name="frmgrp" action="frmgrp.php" method="post">-->
        <h1 class="heading">Groups</h1>
        <table>
            <tr>
                <th>Create New Group</th>
            </tr>
            <tr>
                <td>Group Name</td>
                <td><input type="text" name="txtgrpnam"/></td>
            </tr>
            <tr><td></td></tr>
            <td><input type="Submit" name="btnsub" value="submit"/></td>
            <td><input type="Reset" name="btncan" value="Cancel"/></td>
        </table>   
        <?php 
        $obj=new clsgrp();
        $arr=$obj->disp_rec($_SESSION["cod"]);
        if(count($arr)>0)
        {
            echo "<table><tr><th>Group Name</th>";
            echo "<th>Created Date</th>";
            echo "<th>Members</th></tr>";
        }
        for($i=0;$i<count($arr);$i++)
        {
             echo "<tr>";
         
            echo "<td>".$arr[$i][3]."</td>";
            echo "<td>".$arr[$i][2]."</td>";
            echo "<td>".$arr[$i][4]."</td>";
            echo "<td><a href=frmgrpmem.php?gcod=".$arr[$i][0].">Join Members</a></td>";
            echo "</tr>";
        }
        ?>
    </form>
</body>
</html>