<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management System - Login</title>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            position: relative;
            background-image: url('{{ asset('assests/image/login.jpg') }}');
            background-size: cover;
            background-position: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.5) 100%);
        }

        .login-container {
            position: relative;
            z-index: 1;
            color: white;
            animation: fadeIn 0.8s ease-out forwards;
        }

        .login-logo {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .login-logo img {
            width: 110px;
            height: 110px;
            object-fit: cover;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .login-logo img:hover {
            transform: scale(1.05);
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .card-header {
            border-bottom: 2px solid #f8f9fa;
            padding-bottom: 15px;
            margin-bottom: 25px;
            text-align: center;
            background: transparent;
        }

        .card-header h4 {
            font-size: 24px;
            color: #343a40;
            font-weight: 600;
            margin: 0;
        }

        .form-group label {
            font-weight: 600;
            color: #495057;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-control {
            height: 45px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding-left: 15px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .btn-primary {
            height: 45px;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            background: linear-gradient(to right, #007bff, #0069d9);
            border: none;
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.25);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 123, 255, 0.3);
            background: linear-gradient(to right, #0069d9, #007bff);
        }

        .simple-footer {
            text-align: center;
            padding-top: 20px;
            font-size: 14px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .alert-danger {
            border-radius: 8px;
            font-size: 13px;
        }
    </style>
</head>

<body>
<div class="overlay">
    <div id="app" class="login-container">
        <section class="section">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                            <div class="login-logo">
                                <img src="{{ asset('assests/image/logo.jpeg') }}" alt="logo" class="rounded-circle">
                            </div>
                            <div class="login-card">
                                <div class="card-header">
                                    <h4>Welcome Back</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.login.post') }}" method="post">
                                    @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <div class="input-icon">
                                                <input id="email" type="email" class="form-control" name="email" value=""
                                                    tabindex="1" required placeholder="Enter your email address">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                            <div class="input-icon">
                                                <input id="password" type="password" class="form-control" name="password"
                                                    tabindex="2" required placeholder="Enter your password">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                        
                                        <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Login <i class="fas fa-sign-in-alt ml-1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                            <div class="mt-4 simple-footer text-white">
                                <p>Copyright &copy; HRM System 2024 | All rights reserved</p>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>