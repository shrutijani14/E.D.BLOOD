<?php
  
  error_reporting(0);

  include_once 'db.php';

  if(isset($_POST['chk'])=="")
  {
    ?>
<script>
    alert('At least one checkbox Must be Selected !!!');
    window.location.href = 'viewusers.php';
</script>
<?php
  }
  $chk = $_POST['chk'];
  $chkcount = count($chk);
  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">
    <meta name="description" content="">
    <title>Edit Users</title>



    <link rel="stylesheet" href="../assets/css/material.css">
    <link rel="stylesheet" href="../assets/css/tether.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/socicon.min.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/add.css" type="text/css">



</head>

<body>
    <section id="ext_menu-s">

        <nav class="navbar navbar-dropdown navbar-fixed-top">
            <div class="container">

                <div class="mbr-table">
                    <div class="mbr-table-cell">

                        <div class="navbar-brand">
                            <a href="../index.php" class="navbar-logo"><img src="../assets/images/logo.png"
                                    alt="Bloodbank Logo"></a>
                            <a class="navbar-caption" href="../index.php">E.D.BLOOD</a>
                        </div>

                    </div>
                    <div class="mbr-table-cell">

                        <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse"
                            data-target="#exCollapsingNavbar">
                            <div class="hamburger-icon"></div>
                        </button>

                        <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm"
                            id="exCollapsingNavbar">
                            <li class="nav-item"><a class="nav-link link" href="../about.php">ABOUT</a></li>
                        </ul>
                        <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse"
                            data-target="#exCollapsingNavbar">
                            <div class="close-icon"></div>
                        </button>

                    </div>
                </div>

            </div>
        </nav>

    </section>

    <section class="engine"><a rel="external" href="index">top site design software download</a></section>
    <section class="mbr-section mbr-after-navbar" id="msg-box3-v"
        style="background-color: rgb(242, 242, 242); padding-top: 120px; padding-bottom: 120px;">


        <div class="container">
            <form method="post" action="update_mul.php">
                <table class='table table-bordered'>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Blood Group</th>
                        <th>Last Donation Date</th>
                        <th>Number Of Donations</th>
                        <th>Last Donation Camp</th>
                    </tr>
                    <?php
for($i=0; $i<$chkcount; $i++)
{
  $id = $chk[$i];     
  $res=$MySQLi_CON->query("SELECT * FROM donarregister WHERE id=".$id);
  while($row=$res->fetch_array())
  {
    ?>
                    <tr>
                        <td>
                            <input type="hidden" name="id[]" value="<?php echo $row['id'];?>" />
                            <input type="text" name="fn[]" value="<?php echo $row['fname'];?>" class="form-control"
                                readonly />
                        </td>
                        <td>
                            <input type="text" name="ln[]" value="<?php echo $row['lname'];?>" class="form-control"
                                readonly />
                        </td>
                        <td>
                            <input type="email" name="em[]" value="<?php echo $row['email'];?>" class="form-control"
                                readonly />
                        </td>
                        <td>
                            <select name="bg[]" value="<?php echo $row['b_id'];?>" class="form-control">
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </td>
                        <td>
                            <input type="date" name="ld[]" value="<?php echo date('Y/m/d'); ?>" class="form-control" />
                        </td>
                        <td>
                            <input type="number_format" name="nd[]" value="<?php echo $row['number_of_donations'];?>"
                                class="form-control" />
                        </td>
                        <td>
                            <input type="text" name="lc[]" value="<?php echo $row['last_donation_camp'];?>"
                                class="form-control" />
                        </td>
                    </tr>
                    <?php 
  }     
}
?>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="savemul" class="btn btn-primary"><i
                                    class="glyphicon glyphicon-edit"></i> &nbsp; Update</button>&nbsp;
                            <a href="viewusers.php" class="btn btn-large btn-success"> <i
                                    class="glyphicon glyphicon-fast-backward"></i> &nbsp; Cancel</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </section>

    <section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-r"
        style="background-color: black; padding-top: 60px; padding-bottom: 30px;">

        <div class="container">
            <div class="row">
                <div class="mbr-footer-content col-xs-12 col-md-3">
                    <div><img src="../assets/images/logo.png"></div>
                </div>
                <div class="mbr-footer-content col-xs-12 col-md-3">
                    <p><strong>Address</strong><br>Atharva College Of Engineering
                        Atharva Educational Complex,
                        Malad Marve Road, Charkop Naka,
                        Malad (W), Mumbai ??? 400095, India<br></p>
                </div>
                <div class="mbr-footer-content col-xs-12 col-md-3">
                    <p><strong>Contacts</strong><br>
                        Email: bloodlatruist@gmail.com<br>
                        Phone: +91 9876543211<br></p>
                </div>


            </div>

    </section>

    <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2"
        style="background-color: black; padding-top: 1.75rem; padding-bottom: 1.75rem;">
        <div class="container">
            <p class="text-xs-center">&copy; <?php 
$copyYear = 2018; 
$curYear = date('Y'); 
echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
?> | <a class="text-white" href="../about.php">E.D.BLOOD</a></p>
        </div>
        </div>
    </footer>


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/tether.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/SmoothScroll.js"></script>
    <script src="../assets/js/jquery.viewportchecker.js"></script>
    <script src="../assets/dropdown/js/script.min.js"></script>
    <script src="../assets/js/jquery.touchSwipe.min.js"></script>
    <script src="../assets/js/script.js"></script>


    <input name="animation" type="hidden">
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i
                class="mbr-arrow-up-icon"></i></a></div>
</body>

</html>