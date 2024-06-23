<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    </div>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Style css-->
    <link rel="stylesheet" href="css/style.css"></link>
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="row contentForm">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h2></h2>
                </div>
                <!--Div Form-->
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <form action="{{ route('login-proses') }}" method="post">
                        @csrf
                        <h4 class="text-center">User Login</h4>
                        <hr />
                        <!--Form username-->
                        <div>
                        <div class="mb-4">
                            <input type="NamaAkun" class="form-control" id="exampleInputNamaAkun" placeholder="Nama Akun" name="name" required />
                        </div>
                        @error('name')
                            <small>({'$massage'})</small>
                        @enderror
                        </div>
                        <!--Form Input Email-->
                        <div>
                        <div class="mb-4">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email" required />
                        </div>
                         @error('email')
                            <small>({'$massage'})</small>
                        @enderror
                        </div>
                        <!--Form Input Password-->
                        <div>
                        <div class="mb-4">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required />
                        </div>
                         @error('password')
                            <small>({'$massage'})</small>
                        @enderror
                        </div>
                        <!--Chekbok Remember Me-->
                        <div class="remember">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                            <label class="form-check-label" for="exampleCheck1">
                                Remember Me
                            </label>
                            <!--Forgor Password-->
                            <div>
                                <a href="https://getbootstrap.com/docs/5.3/forms/layout/">Forgot Password?</a>
                            </div>
                        </div>
                        <!--Button Login-->
                        <button type="submit" class="btn btn-primary btn-sm">
                            Login
                        </button>
                        <br /><br /><br /><br />
                        <div>
                            <!--Button Regis-->
                            <div class="d-flex justify-content-between">
                                <p>Don't have an Account</p>
                                <a class="btn btn-primary" href="{{route('register')}}" role="button">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         @if($massage = Session::get('success'))
        <script>
            Swal.fire({
            icon: 'success',
            title: 'success',
            text: 'Anda Berhasil Logout',
            })
        </script>
        @endif
         @if($massage = Session::get('failed'))
        <script>
            Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'Username, Email atau Password salah dan Jika anda belum memiliki akun silahkan Register',
            })
        </script>
        @endif
</body>

</html>