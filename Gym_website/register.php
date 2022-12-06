<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>registration</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./Frontend/dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./Frontend/dashboard/assets/vendors/css/vendor.bundle.base.css">
    
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./Frontend/dashboard/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./Frontend/dashboard/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <!-- <img src="./Frontend/dashboard/assets/images/logo.svg"> -->
                    <h3>Exercise <span class="text-danger">Makes a Man</span> Healthy</h3>
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" action="registration_validation.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="user_name" value="<?php if(isset($_SESSION["name"])){echo $_SESSION["name"];}?>">
                  <?php if(isset($_SESSION["name_error"])):?>
                    <span class="text-danger"><?=$_SESSION["name_error"]?></span>
                    <?php endif;?>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="user_email" value="<?php if(isset($_SESSION["email"])){echo $_SESSION["email"];}?>">
                    <?php if(isset($_SESSION["email_error"])):?>
                      <span class="text-danger"><?=$_SESSION["email_error"]?></span>
                      <?php endif;?>
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="District" name="user_district" value="<?php if(isset($_SESSION["district"])){echo $_SESSION["district"];}?>">
                  <?php if(isset($_SESSION["district_error"])):?>
                    <span class="text-danger"><?=$_SESSION["district_error"]?></span>
                    <?php endif;?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="user_password">
                    <?php if(isset($_SESSION["password_error"])):?>
                      <span class="text-danger"><?=$_SESSION["password_error"]?></span>
                      <?php endif;?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" name="user_confirm__password">
                    <?php if(isset($_SESSION["confirm_password_error"])):?>
                      <span class="text-danger"><?=$_SESSION["confirm_password_error"]?></span>
                      <?php endif;?>
                  </div>
                  <div class="form-group">
                  <label for="formFileMultiple" class="form-label">Upload your photo</label>
                  <input class="form-control" type="file" id="formFileMultiple" name="user_photo">
                  <?php if(isset($_SESSION["photo_error"])):?>
                    <span class="text-danger"><?=$_SESSION["photo_error"]?></span>
                    <?php endif;?>
                </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <?php session_unset();?>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"> Registration</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./Frontend/dashboard/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./Frontend/dashboard/assets/js/off-canvas.js"></script>
    <script src="./Frontend/dashboard/assets/js/hoverable-collapse.js"></script>
    <script src="./Frontend/dashboard/assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>