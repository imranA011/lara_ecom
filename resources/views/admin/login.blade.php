<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="h-100 bg-light" >
    <section class="h-100">
        <div class="container h-100">
            <div class="h-100 row justify-content-center align-items-center">
                <div class="col-md-5 mx-auto p-5" style="background:#ccc">
                    <h1 class="text-center mb-5">
                        <a href="{{ route('page.home') }}"> <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"> </a>
                    </h1>

                    <form action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg @error('user_mail') is-invalid @enderror" name="user_mail"  placeholder="Username Or Email">
                            </div>
                            @error('user_mail')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
                            </div>
                            @error('password')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                        @if(session('msg'))
                            <h4 class="alert alert-danger ">{{session('msg')}}</h4>
                        @endif
                        <div class="text-center">
                            <input type="submit" class="btn btn-light form-control form-control-lg" name="submit" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


