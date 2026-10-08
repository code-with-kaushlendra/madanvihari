 <?php
  require('../include/connection.inc.php');
  require('../include/functions.inc.php');
  $msg = '';
  if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];
    $sql = "select * from admin where `username`='$username' and password='$password'";


    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
      $row = mysqli_fetch_assoc($res);
      if ($row['status'] == '0') {
        $msg = "Account deactivated";
      } else {
        $_SESSION['ADMIN_LOGIN'] = 'yes';
        $_SESSION['ADMIN_ID'] = $row['id'];
        $_SESSION['ADMIN_USERNAME'] = $username;
        $_SESSION['ADMIN_ROLE'] = $row['role'];
        header('location:index.php');
        die();
      }
    } else {
      $msg = "Please enter correct login details";
    }
  }
  ?>

 <!DOCTYPE html>
 <html dir="ltr">

 <head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />


   <title>Madan Bihari Admin </title>
   <!-- Favicon icon -->
   <link rel="icon" type="image/png" sizes="16x16" href="../../img/logo.webp" />
   <!-- Custom CSS -->
   <link
     rel="stylesheet"
     type="text/css"
     href="../assets/extra-libs/multicheck/multicheck.css" />
   <link
     href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
     rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="../assets/extra-libs/multicheck/multicheck.css" />
   <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
   <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
   <!-- Custom CSS -->
   <link href="../dist/css/style.min.css" rel="stylesheet" />
   <link href="../dist/css/new-style.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="../assets/extra-libs/multicheck/multicheck.css" />
   <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
   <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
   <link rel="stylesheet" href="../dist/css/updated.css">

 </head>
 <!-- <div class="page-wrapper"> -->

 <body class="login-body">

   <div class="login-container">

     <div class="login-card">

       <div class="text-center mb-4">
         <img src="../assets/images/logo.svg" alt="homepage" class="light-logo" style="background-color: white; margin-bottom: 5px; border-radius: 5px; transform: scale(1.5);" width="100">
         <h3 class="title">Admin Login</h3>
       </div>

       <form method="post">

         <div class="input-box">
           <i class="mdi mdi-account"></i>
           <input type="text" name="name" required>
           <label>Username</label>
         </div>

         <div class="input-box">
           <i class="mdi mdi-lock"></i>
           <input type="password" name="password" required>
           <label>Password</label>
         </div>

         <button type="submit" name="submit" class="login-btn">
           Login
         </button>

       </form>

       <div class="text-danger text-center mt-3">
         <?php echo $msg ?>
       </div>

     </div>

   </div>


 </body>

 </html>