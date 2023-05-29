<?php
error_reporting(E_ALL);
require_once('dbconnection.php');
$userid = $_SESSION['bpmsuid'];
$sql = "SELECT * FROM multiple_saloons";
$sql_query = mysqli_query($con, $sql);
?>

<div class=" sidebar" role="navigation">
  <div class="navbar-collapse">
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <ul class="nav" id="side-menu">



        <li>
          <a href="all-appointment1.php"><i class="fa fa-check-square-o nav_icon"></i>Appointment<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li>
              <a href="all-appointment1.php">All Appointment</a>
            </li>
            <li>
              <a href="new-appointment.php">New Appointment</a>
            </li>
            <li>
              <a href="accepted-appointment.php">Accepted Appointment</a>
            </li>
            <li>
              <a href="rejected-appointment.php">Rejected Appointment</a>
            </li>
          </ul>


          <!-- //nav-second-level -->
        </li>


        <li>
          <a href="all-appointment1.php"><i class="fa fa-check-square-o nav_icon"></i>Saloons<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li>

              <?php
              while ($menu = mysqli_fetch_assoc($sql_query)) {



              ?>

            <li><a href="all-appointment1.php?categorys=<?php echo $menu['name'] ?>" style="color: beige;"><?php echo  $menu['name'] ?></a></li>
            <!-- <li><a href="#">Page 1-2</a></li> -->
          <?php } ?>
          <!-- <a href="all-appointment.php">All Appointment</a> -->
        </li>

      </ul>


      <!-- //nav-second-level -->
      </li>
      <li>
        <a href="add_salon.php">Add Salon</a>
      </li>
      <!-- 
      <li>
        <a href="add_salon22.php">Add Salon</a>
      </li> -->






      <!-- <li>
          <a href="readenq.php"><i class="fa fa-check-square-o nav_icon"></i>Enquiry<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li><a href="readenq.php">Read Enquiry</a></li>
            <li><a href="unreadenq.php">Unread Enquiry</a></li>

          </ul>
         
        </li>
        <li>
          <a href="customer-list.php" class="chart-nav"><i class="fa fa-users nav_icon"></i>Customer List</a>
        </li> -->
      <!-- <li>
          <a href="#"><i class="fa fa-check-square-o nav_icon"></i>Reports<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level collapse">
            <li><a href="bwdates-reports-ds.php"> B/w dates</a></li>

            <li><a href="sales-reports.php">Sales Reports</a></li>
          </ul>
         
        </li> -->

      <!-- <li>
          <a href="invoices.php" class="chart-nav"><i class="fa fa-file-text-o nav_icon"></i>Invoices</a>
        </li>
        <li>
          <a href="search-appointment.php" class="chart-nav"><i class="fa fa-search nav_icon"></i>Search Appointment</a>
        </li>
        <li>
          <a href="search-invoices.php" class="chart-nav"><i class="fa fa-search nav_icon"></i>Search Invoice</a>
        </li> -->


      </ul>
      <div class="clearfix"> </div>
      <!-- //sidebar-collapse -->
    </nav>
  </div>
</div>