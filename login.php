<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <style>
    html, body, .full {
      height: 100%;
    }
    body {
      margin-top: 20px;
      background: #f6f9fc;
    }

    .account-block {
      padding: 0;
      background-image: url("assets/bgimage.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      height: 100%;
      position: relative;
    }

    .account-block .overlay {
      -webkit-box-flex: 1;
      -ms-flex: 1;
      flex: 1;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .account-block .account-testimonial {
      text-align: center;
      color: #fff;
      position: absolute;
      margin: 0 auto;
      padding: 0 1.75rem;
      bottom: 3rem;
      left: 0;
      right: 0;
    }

    .text-theme {
      color: #5369f8 !important;
    }

    .btn-theme {
      background-color: #5369f8;
      border-color: #5369f8;
      color: #fff;
    }
    .newRow {
  width: 100%;
  display: table;
}
.newRow .col-xl-10 {
  display: table-cell;
  vertical-align: middle;
  float: none
}
  </style>
</head>

<body class="w3-theme-l5">
  <div id="main-wrapper" class="container full">
    <div class="row full justify-content-center align-items-center newRow">
      <div class="col-xl-10">
        <div class="card border-1">
          <div class="card-body p-0">
            <div class="row no-gutters">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="mb-5">
                    <h3 class="h4 font-weight-bold  ">Login</h3>
                  </div>

                  <h6 class="h5 mb-0">Welcome back!</h6>
                  <p class="text-muted mt-2 mb-5">Enter your email address and password to access admin panel.</p>

                  <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group mb-5">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <button type="submit" class="w3-button w3-theme-d2">Login</button>
                    <!-- <a href="#l" class="forgot-link float-right text-primary">Forgot password?</a> -->
                  </form>
                </div>
              </div>

              <div class="col-lg-6 d-none d-lg-inline-block">
                <div class="account-block rounded-right">
                  <div class="overlay rounded-right"></div>
                  <div class="account-testimonial">
                    <h1 class="text-white mb-4">Cinema in a Nutshell</h1>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->

        <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="signup.php" class="text-primary ml-1">sign up</a></p>

        <!-- end row -->

      </div>
      <!-- end col -->
    </div>
    <!-- Row -->
  </div>
  </div>
  </div>
</body>

</html>
