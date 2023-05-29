<?php
// error_reporting(E_ALL);
require_once('dbconnection.php');
$userid = $_SESSION['bpmsuid'];
$sql = "SELECT * FROM multiple_saloons";
$sql_query = mysqli_query($con, $sql);
?>

<section class=" w3l-header-4 header-sticky">
    <header class="absolute-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <h1><a class="navbar-brand" href="index.php"> <!--<span class="fa fa-line-chart" aria-hidden="true"></span> -->
                        MSMS
                    </a></h1>
                <button class="navbar-toggler bg-gradient collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="services.php">Services</a>
                        </li> -->

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="add_salon.php">Add Saloon</a>
                        </li> -->



                        <!-- <li class="nav-item">
                            <a class="nav-link" href="salon1_services.php">Saloon-1</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="salon2_services.php">Saloon-2</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="salon3_services.php">Saloon-3</a>
                        </li> -->


                        <nav class="navbar navbar-inverse">
                            <ul class="nav navbar-nav">

                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;">Multiple Saloons <span class="caret"></span></a>

                                    <ul class="dropdown-menu">
                                        <?php
                                        while ($menu = mysqli_fetch_assoc($sql_query)) {



                                        ?>

                                            <li><a href="salon1_services.php?category=<?php echo $menu['name'] ?>" style="color: beige;"><?php echo  $menu['name'] ?></a></li>
                                            <!-- <li><a href="#">Page 1-2</a></li> -->
                                        <?php } ?>
                                    </ul>
                                </li>

                            </ul>

                        </nav>






                        <?php if (!isset($_SESSION['bpmsuid']) || strlen($_SESSION['bpmsuid'] == 0)) { ?>

                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Signup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/index.php">Admin</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                            <!-- <a class="nav-link" href="">Contact</a> -->
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="saloon panel/index.php">Saloon Panel</a>
                            <!-- <a class="nav-link" href="">Contact</a> -->
                        </li>
                        <?php if (strlen($userid > 0)) { ?>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="book-appointment.php">Book Salon</a>
                            </li> -->


                            <li class="nav-item">
                                <a class="nav-link" href="admin/index.php">Admin</a>
                            </li>





                            <ul class="nofitications-dropdown">
                                <?php
                                $ret1 = mysqli_query($con, "select tbluser.FirstName,tbluser.LastName,tblbook.ID as bid,tblbook.AptNumber from tblbook join tbluser on tbluser.ID=tblbook.UserID where tblbook.Status='Selected' ");
                                $num = mysqli_num_rows($ret1);

                                ?>
                                <li class="dropdown head-dpdn">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell" style="color: black; font-size: 24px;"></i><span class=" badge blue" style="font-size: 20px; color:black"><?php echo $num; ?></span></a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have <?php echo $num; ?> new notification</h3>
                                            </div>
                                        </li>
                                        <li>

                                            <div class="notification_desc">
                                                <?php if ($num > 0) {
                                                    while ($result = mysqli_fetch_array($ret1)) {
                                                ?>
                                                        <a class="dropdown-item" href="admin/view-appointment.php?viewid=<?php echo $result['bid']; ?>">Appointment request accepted of <?php echo $result['FirstName']; ?> <?php echo $result['LastName']; ?> (<?php echo $result['AptNumber']; ?>)</a>
                                                        <hr />
                                                    <?php }
                                                } else { ?>
                                                    <a class="dropdown-item" href="admin/all-appointment.php">No New Appointment Received</a>
                                                <?php } ?>

                                            </div>
                                            <div class="clearfix"></div>
                                            </a>
                                        </li>


                                        <li>
                                            <div class="notification_bottom">
                                                <a href="admin/new-appointment.php">See all notifications</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                            </ul>




                            <li class="nav-item">
                                <!-- <a class="nav-link" href="profile.php">Profile</a> -->
                                <a class="nav-link" href="">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>









                        <?php } ?>
                    </ul>

                </div>
        </div>

        </nav>
        </div>
    </header>
</section>