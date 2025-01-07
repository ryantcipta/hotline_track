<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Order</title>
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <link href="{{url("css/new.css")}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
     
    </head>
    <body class="sb-nav-fixed">
       @include('layout.navbar')
        @include('layout.sidenavbar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Order</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Order
                            </div>
                            
                            <div class="card-body">
                                {{-- notifikasi form validasi --}}
									@if ($errors->has('file'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('file') }}</strong>
									</span>
									@endif
							
									{{-- notifikasi sukses --}}
									@if ($sukses = Session::get('sukses'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $sukses }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif

							
									<div class="d-flex align-items-center my-3">
                                        <button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#importExcel">
                                            <i class="fa-solid fa-file-import"></i> Import Excel
                                        </button>
                                    
                                        <form action="{{ route('delete.all') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-3"><i class="fa fa-trash" title="Delete"></i> Hapus Semua Data</button>
                                        </form>
                                    </div>

                                 
							
									<!-- Import Excel -->
									<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<form method="post" action="/order/import_excel" enctype="multipart/form-data">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
													</div>
													<div class="modal-body">
							
														{{ csrf_field() }}
							
														<label>Pilih file excel</label>
														<div class="form-group">
															<input type="file" name="file" required="required">
														</div>
							
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
														<button type="submit" class="btn btn-primary">Import</button>
													</div>
												</div>
											</form>
										</div>
									</div>
                                {{-- <a href="/order/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> --}}
                               

                            <div class="table-responsive">
                                <table  class="table table-bordered table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No POP Hotline</th>
                                            <th>Tgl Order</th>
											<th>No PO MD</th>
                                            <th>Tgl Proses MD</th>
                                            <th>No PO AHM</th>
                                            <th>Tgl Order ke AHM</th>
                                            <th>Part No</th>
                                            <th>ETD AHM</th>
                                            <th>TGL Supply AHM</th>
                                            <th>TGL GI / supply MD</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                  
                                </table>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
               @include('layout.footer')
            </div>
        </div>


     
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(function () {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('order') }}",
                    columns: [
                        {
                            data: null,
                            name: 'no',
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {data: 'no_pop_hotline', name: 'no_pop_hotline'},
                        {data: 'tgl_order', name: 'tgl_order'},
                        {data: 'no_po_md', name: 'no_po_md'},
                        {data: 'tgl_proses_md', name: 'tgl_proses_md'},
                        {data: 'no_po_ahm', name: 'no_po_ahm'},
                        {data: 'tgl_order_ke_ahm', name: 'tgl_order_ke_ahm'},
                        {data: 'part_no', name: 'part_no'},
                        {data: 'etd_ahm', name: 'etd_ahm'},
                        {data: 'tgl_supply_ahm', name: 'tgl_supply_ahm'},
                        {data: 'tgl_gi_supply_md', name: 'tgl_gi_supply_md'},
                        {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
                    ]
                });
        
                $('.data-table').on('click', 'button[data-url]', function () {
                    let deleteUrl = $(this).data('url');
                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        $.ajax({
                            url: deleteUrl,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                // Jika respons sukses
                                if (response.success) {
                                    alert(response.success);
                                    table.draw(false);
                                } else {
                                    alert('Terjadi kesalahan: ' + (response.error || 'Tidak diketahui.'));
                                }
                            },
                            error: function (xhr) {
                                // Jika terjadi error, tampilkan pesan error dari server
                                let errorMessage = xhr.responseJSON?.error || 'Terjadi kesalahan pada server.';
                                alert(errorMessage);
                            }
                        });
                    }
                });
            });
        </script>
        
        
       
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url("js/scripts.js")}}"></script>
    </body>
</html>
