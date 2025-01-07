<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <link href="{{url("css/new.css")}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body class="sb-nav-fixed">
     
      @include('layout.navbar')
      @include('layout.sidenavbar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Dashboard</h1>
                        <nav aria-label="breadcrumb">
                           
                            {{-- notifikasi sukses --}}
									@if ($sukses = Session::get('sukses'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $sukses }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                          </nav>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><i class="bi bi-people-fill"></i> User : {{$userCount}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><i class="fa-solid fa-box-open"></i> Order : {{$orderCount}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('order')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                      

                            <div class="card">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Order
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered  table-striped order-table">
                                        <thead>
                                            <tr>
                                                <th >No</th>
                                                <th>No POP Hotline</th>
                                                <th >Tgl Order</th>
                                                <th >No PO MD</th>
                                                <th >Tgl Proses MD</th>
                                                <th >No PO AHM</th>
                                                <th >Tgl Order ke AHM </th>
                                                <th >ETD AHM</th>
                                                <th >Tgl Supply AHM</th>
                                                <th >Tgl GI/Supply MD</th>  
                                            </tr>
                                        </thead>   
                                    </table>
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

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script type="text/javascript">
              $(function () {
             
                var table = $('.order-table').DataTable({
                    processing: true,
                    serverSide: true,

                    ajax: "{{ route('dashboard.index') }}",
                    columns: [

                         {
                            data: null, // Data untuk nomor urut
                            name: 'no',
                            orderable: false, // Tidak bisa diurutkan
                            searchable: false, // Tidak bisa dicari
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1; // meta.row memberikan indeks baris
                            }
                          },
                        {data: 'no_pop_hotline', name: 'no_pop_hotline'},
                        {data: 'tgl_order', name: 'tgl_order'},
                        {data: 'no_po_md', name: 'no_po_md'},
                        {data: 'tgl_proses_md', name: 'tgl_proses_md'},
                        {data: 'no_po_ahm', name: 'no_po_ahm'},
                        {data: 'tgl_order_ke_ahm', name: 'tgl_order_ke_ahm'},
                        {data: 'etd_ahm', name: 'etd_ahm'},
                        {data: 'tgl_supply_ahm', name: 'tgl_supply_ahm'},
                        {data: 'tgl_gi_supply_md', name: 'tgl_gi_supply_md'},
    
                    ]
                });
                   
              });
            </script>
           
            <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
            <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
            <script src="{{url("js/scripts.js")}}"></script>
          
    </body>
</html>
