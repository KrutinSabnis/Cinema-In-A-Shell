<html lang="en">
<head>
    <style>
        body {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
        }

        .btn-google {
        color: white !important;
        background-color: #ea4335;
        }

        .btn-facebook {
        color: white !important;
        background-color: #3b5998;
        }

    </style>
</head>

<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              <h5 class="card-title text-center mb-5 fw-light fs-5">Sign Up</h5>
              <form>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="username">
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" placeholder="email">
                  <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingConfPassword" placeholder="Confirm Password">
                  <label for="floatingConfPassword">Confirm Password</label>
                </div>
                
                <div class="form-floating mb-3">
                <label for="birthday">Date of Birth:</label>
                <input type="date" class="form-control" id="birthday" placeholder="Date of Birth">
                </div>
                
                <div>
                <input type="radio" id="Male" name="gender" value="Male">
    <label for="Male">Male</label><br>
    <input type="radio" id="Female" name="gender" value="Female">
    <label for="Female">Female</label><br>
    <input type="radio" id="Others" name="gender" value="Others">
    <label for="Others">Others</label>
                </div>
                <div class="d-grid">
                  <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                    Up</button>
                </div>
                <hr class="my-4">
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
