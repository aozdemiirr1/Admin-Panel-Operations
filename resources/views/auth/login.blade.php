<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Andis Dev | Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f2f2f2;
        }

        .login-box {
            width: 360px;
        }

        .login-box .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .login-box .card-body {
            padding: 40px;
        }

        .login-box .login-logo {
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
        }

        .login-box .login-logo a {
            color: #333;
        }

        .login-box .login-box-msg {
            font-size: 18px;
            text-align: center;
            margin-bottom: 30px;
        }

        .login-box .login-form input[type='email'],
        .login-box .login-form input[type='password'] {
            width: 245px;
            border: none;
            border-radius: 5px;
            padding: 15px 20px;
            margin-bottom: 20px;
            background-color: #007bff;
            box-shadow: none;
        }

        ::placeholder {
            color: #fff;
        }

        .login-box .login-form input[type='email']:focus,
        .login-box .login-form input[type='password']:focus {
            background-color: #e8e8e8;
        }

        .login-box .login-form .btn-primary {
            border: none;
            border-radius: 5px;
            padding: 15px 20px;
            background-color: #007bff;
            transition: background-color 0.3s ease;
            color: #fff;
        }

        .login-box .login-form .btn-primary:hover {
            background-color: #0056b3;
        }

        .login-box .register-link {
            text-align: center;
        }

        .login-box .register-link a {
            color: #007bff;
        }

        .login-box .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="card">
            <div class="card-body">
                <h1 class="login-box-msg">Admin Panel Sign In</h1>
                <form id="login-form" class="login-form" novalidate action="/login" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:flex; flex-direction:row; align-items:center; justify-content:space-between;">
                        <div class="col-8">
                            <div class="icheck-primary" style="display:flex; align-items:center; gap:5;">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                    <!-- <p class="register-link mb-0">
                        <a href="/register">Register a new membership</a>
                    </p> -->
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#login-form').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function (data) {
                        // Successful login
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Login success!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function () {
                            window.location.href = '{{ url("layout") }}';
                        }, 1500);
                    },
                    error: function (data) {
                        // Unsuccessful login
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Login failed!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
