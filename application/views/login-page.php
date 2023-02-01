<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $this->config->item('site_name'); ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/logoipsum.png') ?>" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('./assets/css/components.css'); ?>">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="<?php echo base_url('./assets/img/logoipsum.png')?>" alt="logo" width="80" class="shadow-light rounded-circle mb-0 mt-0">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold"><?php echo $this->config->item('site_name'); ?></span></h4>
            <p class="text-muted">“Drinking water is essential to a healthy lifestyle.</p>
            <p>― Stephen Curry</p>
            <form method="POST" action="<?php echo base_url('login/action') ?>" autocomplete="off">
              <?php if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <?php
                      echo $this->session->flashdata("error");
                      unset($_SESSION["error"]);
                    ?>
                  </div>
                </div>
              <?php } ?>
              <div class="form-group">
                <label for="email">Username</label>
                <input type="text" class="form-control" name="username" required autofocus>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input type="password" class="form-control" name="password" required>
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              <br>
              <div class="mt-2">
              </div>
            </div>
          </div>
        </div>
        <?php
            date_default_timezone_set("Asia/Jakarta");
            echo $this->session->userdata("my_sess");
            $hour = date('H');
            if((int)($hour) >= 0){
              $greeting = "Goood Morning!";
            }
            if((int)($hour) >= 6){
              $greeting = "Goood Morning!";
            } 
            if((int)($hour) >= 12){
              $greeting = "Good Noon!";
            }
            if((int)($hour) >= 15){
              $greeting = "Good Afternoon!";
            }
            if((int)($hour) >= 18){
              $greeting = "Good Evening!";
            }
            if((int)($hour) >= 20){
              $greeting = "Good Night!";
            }
            ?>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?php echo base_url('./assets/img/unsplash/login-bg.jpg')?>">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold"><?php echo $greeting; ?></h1>
                <h5 class="font-weight-normal text-muted-transparent">Wonderfull, Indonesia</h5>
              </div>
              <!-- Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url('./assets/js/stisla.js'); ?>"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?php echo base_url('./assets/js/scripts.js') ?>"></script>
  <script src="<?php echo base_url('./assets/js/custom.js'); ?>"></script>

  <!-- Page Specific JS File -->
</body>
</html>
