<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Change Password</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <link href="{{url("css/new.css")}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <style>
             .card{
                border: none;
                border-radius: 20px;
            }
            .card-header{
               border-bottom:none;
                background: none; 
            }
            
        </style>
    </head>
    <body class="sb-nav-fixed">
     
      @include('layout.navbar')
      @include('layout.sidenavbar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Change Password</h1>
                       
                       {{-- notifikasi sukses --}}
                       @if ($sukses = Session::get('succsess'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                       <strong>{{ $sukses }}</strong>
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>
                       @endif                                                                                                
                       
                       <div class="shadow p-3 mb-5 bg-white rounded">
                        <div class="card mb-4">
                            <div class="card-header">
                                
                            </div>
                            
                            <div class="card-body">
                                <form action="{{ route('update.password') }}" method="POST">
                                    @csrf
                                  
                                    <div class=" form-group mb-3">
                                       
                                        <label for="old_password"><strong>Old Password</strong></label>
                                        <input id="password" type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" required>
                                        <input type="checkbox" onclick="myFunction()">Show Password
                                        @error('old_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                
                                    <div class="form-group mb-3">
                                        <label for="new_password"><strong>New Password</strong></label>
                                        <input id="password" type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                                        <input type="checkbox" onclick="myFunction()">Show Password
                                        @error('new_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="new_password_confirmation"><strong>Confirm New Password</strong></label>
                                        <input id="password" type="password" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror"  required>
                                        <input type="checkbox" onclick="myFunction()">Show Password
                                        @error('new_password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-md btn-primary mr-2">
                                        <i class="fa-solid fa-floppy-disk"></i> Simpan
                                    </button>

                                </form>
                            </div>
                        </div>
                     </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2024</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script>
            function myFunction() {
              var x = document.getElementById("password");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
            </script>
        
        <script src="{{url("js/scripts.js")}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
    </body>
</html>
