  <?php
  include_once('../server.php');
  include_once('../classes/Register.php');
  
  $userdata = new DB_con();
  $register = new Register($userdata->dbcon);


  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $re_password = md5($_POST['re-password']);
    $phone = $_POST['phone'];

    $sql = $register->Register($username, $name, $password, $re_password, $phone);
    
    if ($sql) {
      echo "<script>alert('Registor Successful!');</script>";
      echo "<script>window.location.href='../index.php'</script>";
    } else {
      echo "<script>alert('Something went wrong! Please try again.');</script>";
      echo "<script>window.location.href='register.php'</script>";
    }
  }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  </head>

  <body>

    <!-- Top content -->
    <div class="top-content">

      <div class="inner-bg">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text">
              <h1>Register Form</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3 form-box">
              <div class="form-top">
                <div class="form-top-left">
                  <h3>Register to our site</h3>
                </div>
                <!-- <div class="form-top-right">
                <i class="fa fa-lock"></i>
              </div> -->
              </div>
              <div class="form-bottom">
                <form method="POST">

                  <div class="form-group">
                    <label class="sr-only" for="username">Username</label>
                    <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="username" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input type="text" name="name" placeholder="Name..." class="form-username form-control" id="name" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <input type="password" name="password" placeholder="Password..." class="form-username form-control" id="password" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="re-password">Confirm Password</label>
                    <input type="password" name="re-password" placeholder="Confirm Password..." class="form-username form-control" id="re-password" required>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="phone">Phone Number</label>
                    <input type="text" name="phone" placeholder="Phone Number..." class="form-username form-control" id="phone" required>
                  </div>
                  <div class="p-t-10">
                    <button class="btn btn--pill btn--green" type="submit" name="submit">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3 social-login">
              <h3>...or <a href="login.php">Login...</a></h3>
            </div>
          </div>
        </div>
      </div>

    </div>


    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

  </body>

  </html>