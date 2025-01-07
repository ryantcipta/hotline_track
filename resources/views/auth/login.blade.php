<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    {{-- Error Alert --}}
                                     @if(session('error'))
                                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         {{session('error')}}
                                         <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                     </div>
                                     @endif
                                     @if(session()->has('status'))
                                     <div class="alert alert-success">
                                         {{ session()->get('status')}}
                                     </div>
                                     @endif
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('auth.login')}}">
                                            @csrf
                                            @error('login_gagal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                                <span class="alert-inner--text"><strong>Warning!</strong>  {{ $message }}</span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('username') is-invalid @enderror" id="inputUsername" name="username" type="username" placeholder="Username" />
                                                <label for="inputUsername"> Username</label>
                                                @error('username')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword"> Password</label>
                                                @error('password')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                               
                                                <button type="submit" class="small btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>         
            </div>
           
        </div>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="{{url("js/scripts.js")}}"></script>
    </body>
</html>
