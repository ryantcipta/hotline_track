<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tracking Hotline</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{url("css/styles.css")}}" rel="stylesheet" />
    <link href="{{url("css/tracking.css")}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark  shadow">
        <div class="container">
            <a class="navbar-brand">Tracking Hotline</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        {{-- <a class="nav-link active" href="#">Home</a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>


   <!-- Tracking Form -->
   <div class="container mt-5 tracking-form">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="text-center mb-4">Track Your Hotline</h3>
                    <form action="{{route('search')}}" method="GET">
                        <div class="mb-3">
                            {{-- <label for="trackingNumber" class="form-label">Enter Tracking Number Hotline</label> --}}
                            <input type="search" name="search" class="form-control" id="trackingNumber" placeholder="Please enter your hotline number"  value="{{ request()->get('search') }}" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit"> <i class="fa-solid fa-magnifying-glass"></i> Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

   

    <!-- Hasil Tracking (Layout Berbasis Progress Bar) -->
<main class="flex-grow-1">
    @if($order->isNotEmpty())
    <div class="container mt-5 tracking-results">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <h4 class="text-center mb-4"><u>Tracking Result</u></h4>
                
            
                <div class="row d-flex justify-content-center py-5">
                    @php $i = 1 @endphp
                    <div class="card p-2">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Part</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->part_no }}</td>
                                <td>
                                    <span 
                                    class="badge bg-info text-white" 
                                    style="cursor: pointer;" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#detailModal{{ $item->id }}">
                                    Show Details
                                </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>

                    <!-- Modal untuk Setiap Item Order -->
                    @foreach($order as $item)
                    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Detail untuk No Part: {{ $item->part_no }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container mt-4">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><p><strong>No POP Hotline</strong></p></td>
                                                    <td>{{ $item->no_pop_hotline }}</td>
                                                </tr>
                                                <tr>
                                                    <td><p><strong>Pesanan Masuk Ahass</strong></p></td>
                                                    <td>{{ $item->tgl_order }}</td>
                                                </tr>
                                                <tr>
                                                    <td><p><strong>No PO MD</strong></p></td>
                                                    <td>{{ $item->no_po_md }}</td>
                                                </tr>
                                                <tr>
                                                    <td><p><strong>Pesanan Masuk MD</strong></p></td>
                                                    <td> {{ $item->tgl_proses_md }}</td>
                                                </tr>
                                                <tr>
                                                    <td><p><strong>No PO AHM</strong></p></td>
                                                    <td> {{ $item->no_po_ahm ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><p><strong>Pesanan di Proses AHM</strong> </p></td>
                                                    <td>{{ $item->tgl_order_ke_ahm ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><p><strong>ETD AHM</strong> </p></td>
                                                    <td>{{ $item->etd_ahm ?? '-' }}</td>
                                                </tr> 
                                                <tr>
                                                    <td><p><strong>Part di Supply AHM</strong> </p></td>
                                                    <td>{{ $item->tgl_supply_ahm ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><p><strong>Part di Supply MD</strong> </p></td>
                                                    <td>{{ $item->tgl_gi_supply_md ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><p><strong>Part dikirim ke Dealer</strong> </p></td>
                                                    <td> {{ isset($item->tgl_gi_supply_md) ? \Carbon\Carbon::parse($item->tgl_gi_supply_md)->addDays(3)->format('d.m.Y') : '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                @if(request('search'))
                    <p class="alert alert-warning">No results found for: <strong>{{ request('search') }}</strong></p>
                @endif
            </div>
        </div>
    </div>
    @endif
</main>
    <!-- Footer -->
<footer class=" text-white py-4">
    <div class="container">
        <div class="row">
            
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled small">
                    {{-- <li><i class="fas fa-envelope"></i> test@gmial.com</li> --}}
                    <li><i class="fas fa-phone"></i> 0361424009</li>
                    <li><i class="fas fa-map-marker-alt"></i> Jl. Cokroaminoto No.80, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80111</li>
                </ul>
            </div>
        </div>
        <hr class="bg-light">
        <div class="text-center small">
            <p class="mb-0">&copy; 2024 Tracking Hotline.</p>
        </div>
    </div>
</footer>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{url("js/datatables-simple-demo.js")}}"></script>
</body>
</html>
