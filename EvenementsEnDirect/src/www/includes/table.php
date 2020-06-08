<?php
require_once("../includes/displayFunc.php");

session_start();

?>

<table>
    <tr>
      <th>Title</th>
      <th>Start Date</th>
      <th>Country</th>
      <th>State</th>
    </tr>
    <tr>
      <?php echo displayDashboard(true);?>
</table>

<table>
    <tr>
      <th>Title</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Country</th>
    </tr>
    <tr>
      <?php echo displayDashboard(false);?>
</table>

<style>
    table,td,tr,th
    {
        border:1px solid black ;
        text-align: center;
    }
</style>
