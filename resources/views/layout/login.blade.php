<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('admins') }}/css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body>

    <header class="header-bg">
        <div class="text-center justify-content-between  ">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-3 justify-content-between text-end">
                    <img src="{{ asset('image/logo_cit.png') }}" style="width: 100px;" alt="" srcset="">
                </div>
                <div class="col-8 justify-content-between mt-4 text-start fs-4 fw-bold" style="color: #0400ff;">
                    TRƯỜNG CÔNG NGHỆ THÔNG TIN & TRUYỀN THÔNG
                </div>
            </div>
        </div>
    </header>

    <section class="vh-90 ">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                        
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 img-bg ">
                    <form  action="{{ route('handleLogin') }}" method="POST" >
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-bold mb-0 me-3">LOGIN</p>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mb-0">CICT</p>
                        </div>
                        @if (session('msg'))
                            <div class="alert alert-danger">{{session('msg')}}</div>
                            
                        @endif
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="email" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" />
                                @error('email')
                                <span class="text-danger mt-2">{{$message}}</span>
                                @enderror
                            {{-- <label class="form-label" for="form3Example3">Email address</label> --}}
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3 main-login">
                            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Enter password" />
                                @error('password')
                                    <span class="text-danger mt-2">{{$message}}</span>
                                    
                                @enderror
                            {{-- <label class="form-label" for="form3Example4">Password</label> --}}
                        </div>

                        



                        <div class="text-center mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-login "
                                style="width: 100px;">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="text-center justify-content-between py-4 px-4 px-xl-5 footer">
            <!-- Copyright -->
            <div class="text-f mb-2 mb-md-0">
              Trường Công nghệ thông tin & Truyền thông
              <br>
              Khu II - Đại học Cần Thơ, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.
              <br>
              Điện thoại: (84-292) 3832663 - (84-292) 3838474; Fax: (84-292) 3838474; Email: dhct@ctu.edu.vn.
            </div>
            <!-- Copyright -->
        </div>
    </section>

</body>

</html>
