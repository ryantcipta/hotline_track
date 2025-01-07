<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <link href="{{url("css/new.css")}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{url("css/style_card.css")}}">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
     
      @include('layout.navbar')
      @include('layout.sidenavbar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Profile</h1>
                       
                       {{-- notifikasi sukses --}}
                       @if ($sukses = Session::get('sukses'))
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
                                <form action="{{ route('profile.update', $users->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class=" form-group mb-3">
                                        <label for="name"><strong>Nama</strong></label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$users->name)}}"  required>
                                        <!-- pesan error untuk nama -->
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                
                                    <div class="form-group mb-3">
                                        <label for="username"><strong>Username</strong></label>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username',$users->username)}}"  required>
                                        <!-- pesan error untuk nama pengguna -->
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email"><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email',$users->email)}}"  required>
                                        <!-- pesan error untuk email -->
                                        @error('email')
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
        
        <script src="{{url("js/scripts.js")}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
    </body>
</html>
