<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Style Css External-->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!--Cotainer-->
    <div class="container">
      <div class="box">
        <div class="row contentForm">
          <!--Div Tulisan Selamat datang-->
          <div class="col-sm-12 col-md-6 col-lg-6">
            <h2>SELAMAT DATANG DI SISTEM WASIR SOFTWARE KASIR</h2>
          </div>
          <!--Form Registrasi-->
          <div class="col-sm-12 col-md-6 col-lg-6">
            <form action="{{ route('register-proses') }}" method="post">
              @csrf
              <h4 class="text-center">Registration</h4>
              <hr />
              <!--Form Input Username-->
              <div class="mb-4">
                <input
                  type="NamaAkun"
                  class="form-control"
                  id="exampleInputNamaAkun"
                  placeholder="Nama Akun"
                  name="name"
                  required
                />
              </div>
              <!--Form Input Email-->
              <div class="mb-4">
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Email"
                  name="email"
                  required
                />
              </div>
              <!--Form Input Password-->
              <div class="mb-4">
                <input
                  type="password"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Password"
                  name="password"
                  required
                />
              </div>
              <!--Form Input Confirm Password-->
              <div class="mb-4">
                <input
                  type="password"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Confirm Your Password"
                  name="password"
                  required
                />
              </div>
              <!--Checkox Remember Me-->
              <div class="mb-3 form-check">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="exampleCheck1"
                />
                <label class="form-check-label" for="exampleCheck1">
                  Remember Me
                </label>
              </div>
              <!--Button Register-->
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-sm">
                  Register
                </button>
              </div>
              <br />
              <!--Link To Page Login-->
              <p class="login">
                Next a member?<a href="{{route('login')}}">Log In</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
