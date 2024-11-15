<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit - Order</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <link href="{{url("css/new.css")}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      
        @include('layout.navbar')
        @include('layout.sidenavbar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Edit Order</h1>
                        
                      
                       
                        <div class="shadow-lg p-3 mb-5 bg-white rounded mb-4">
                            
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Error!</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
            
                            <form action="{{ route('order.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="no_pop_hotline" class="mb-2"><strong>No POP Hotline</strong></label>
                                    <input type="text" name="no_pop_hotline" class="form-control @error('no_pop_hotline') is-invalid @enderror" value="{{old('',$order->no_pop_hotline)}}"  required>
                                    <!-- pesan error untuk no pop hotline -->
                                    @error('no_pop_hotline')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tgl_order" class="mb-2"><strong>Tgl Order</strong></label>
                                    <input type="text" name="tgl_order" class="form-control @error('tgl_order') is-invalid @enderror" value="{{old('',$order->tgl_order)}}"  required>
                                    <!-- pesan error untuk nama pengirim -->
                                    @error('tgl_order')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_po_md" class="mb-2"><strong>No PO MD</strong></label>
                                    <input type="text" name="no_po_md" class="form-control @error('no_po_md') is-invalid @enderror" value="{{old('',$order->no_po_md)}}"  required>
                                    <!-- pesan error untuk nama pengirim -->
                                    @error('no_po_md')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tgl_proses_md" class="mb-2"><strong>Tgl Proses MD</strong></label>
                                    <input type="text" name="tgl_proses_md" class="form-control @error('tgl_proses_md') is-invalid @enderror" value="{{old('',$order->tgl_proses_md)}}"  required>
                                    <!-- pesan error untuk nama pengirim -->
                                    @error('tgl_proses_md')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tgl_order_ke_ahm" class="mb-2"><strong>Tgl Order ke AHM</strong></label>
                                    <input type="text" name="tgl_order_ke_ahm" class="form-control @error('tgl_order_ke_ahm') is-invalid @enderror" value="{{old('',$order->tgl_order_ke_ahm)}}"  required>
                                    <!-- pesan error untuk nama pengirim -->
                                    @error('tgl_order_ke_ahm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="etd_ahm" class="mb-2"><strong>ETD AHM</strong></label>
                                    <input type="text" name="etd_ahm" class="form-control @error('etd_ahm') is-invalid @enderror" value="{{old('',$order->etd_ahm)}}"  required>
                                    <!-- pesan error untuk nama pengirim -->
                                    @error('etd_ahm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tgl_supply_ahm" class="mb-2"><strong>Tgl Supply AHM</strong></label>
                                    <input type="text" name="tgl_supply_ahm" class="form-control @error('tgl_supply_ahm') is-invalid @enderror" value="{{old('',$order->tgl_supply_ahm)}}" >
                                    <!-- pesan error untuk nama pengirim -->
                                    @error('tgl_supply_ahm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tgl_gi_supply_md" class="mb-2"><strong> TGL GI / supply MD</strong></label>
                                    <input type="text" name="tgl_gi_supply_md" class="form-control @error('tgl_gi_supply_md') is-invalid @enderror" value="{{old('',$order->tgl_gi_supply_md)}}">
                                    <!-- pesan error untuk nama pengirim -->
                                    @error('tgl_gi_supply_md')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_po_ahm" class="mb-2"><strong>No PO AHM</strong></label>
                                    <input type="text" name="no_po_ahm" class="form-control @error('no_po_ahm') is-invalid @enderror" value="{{old('',$order->no_po_ahm)}}"  required>
                                    <!-- pesan error untuk nama pengirim -->
                                    @error('no_po_ahm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
            
                                
                                <button type="submit" class="btn btn-md btn-primary mr-2">
                                    <i class="fa-solid fa-floppy-disk"></i> Simpan
                                </button>
                                <a href="{{ route('order') }}" class="btn btn-md btn-secondary">
                                    Kembali</a>
                            </form>
                            </div>


                        </div>
                        
                    </div>
                </main>
               @include('layout.footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url("js/scripts.js")}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
