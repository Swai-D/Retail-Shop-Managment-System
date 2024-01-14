@extends('Layouts.main-layout')

@section('title', 'Maswai Shop Managment System')

@section('header')
<head>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>AdminLTE 3 | DataTables</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
 <!-- DataTables -->
 <link rel="stylesheet" href="/admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="/admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 <link rel="stylesheet" href="/admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="/admin-assets/dist/css/adminlte.min.css">
</head>
@endsection

@section('page-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daily Sells Sheet</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(session()->has('Message'))
      <div class="alert alert" role = "alert">
        <p class="lead text-center" style="color: #f33155">
          {{session()->get('Message')}}
        </p>
      </div>
    <!-- Content Header (Page header) -->
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Items</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Bidhaa</th>
                    <th>Size</th>
                    <th>Bei</th>
                    <th>Zilizopo</th>
                    <th>Idadi</th>
                    <th>Uza Kwa</th>

                  </tr>
                  </thead>
                  <tbody>

                  @foreach($allItems as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->item_name}}</td>
                    <td>{{$item->size}}</td>
                    <td>{{number_format($item->selling_price)}}</td>
                    <td>{{$item->pices}}</td>
                    <form class="form-control" action="/Maswai-Shop-Management-System/Stock-Blade-Files/item_sold/{{$item->id}}" method="post">
                      @csrf
                      <td>
                        <input type="number" name="item_sold" value="" class="form-control" min="0">
                      </td>
                      <td>
                        <div class="row">
                          <div class="col-5">
                            @if($item->pices > 0)
                            <button type="submit" name="button" class="btn btn-sm btn-primary">Cash</button>
                            @else
                            <a href="#"  class="btn btn-primary btn-sm">Empty</a>
                            @endif

                          </div>
                          <div class="col-2">
                            @if($item->pices > 0)
                            <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/credit_sells_sheet"  class="btn btn-warning btn-sm">Mkopo</a>
                            @else
                            <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/update_stock/{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                            @endif
                          </div>
                        </div>
                      </td>
                    </form>

                  </tr>
                 @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Bidhaa</th>
                    <th>Size</th>
                    <th>Bei</th>
                    <th>Zilizopo</th>
                    <th>Idadi</th>
                    <th>Uza Kwa</th>

                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Mauzo {{date('d M, Y')}}</h3>
              <div class="card-tools">
                <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/daily_sells_list" class="btn btn-primary btn-sm" title="Preview"><i class="fa fa-eye"></i></a>
                <button type="button" class="btn btn-success btn-sm" title="Add Variation" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> </button>

              </div>
              <!-- <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/daily_sells_list"><i class="fa fa-eye"></i></a> -->
              <!-- <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/sells_list"><i class="fa fa-eye"></i></a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Bidhaa</th>
                    <th>Pice(s)</th>
                    <th style="width: 40px">Amount</th>
                    <th style="width: 40px">Time</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($sold_items as $item_sold)
                    @if($loop->iteration <= 5)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item_sold->item_name}}</td>
                      <td>
                        {{$item_sold->pices_sold}}
                      </td>
                      <td><span class="badge bg-danger" style="font-size:28px;">{{number_format($item_sold->sells)}}</span></td>
                      <td>
                        {{$item_sold->created_at->diffForHumans()}}
                      </td>
                    </tr>
                    @endif
                  @endforeach
                  <tr>

                    <td colspan="3">Total</td>

                    <td>
                      <span class="badge bg-success">
                       <h3>Tsh {{number_format($total)}} /=</h3>
                      </span>
                    </td>

                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Actual Amount</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="form" action="/Maswai-Shop-Management-System/Stock-Blade-Files/variation_form" method="post">
                 @csrf
                  <div class="modal-body">
                    <input class="form-control form-control-lg" name="actual_amount" type="number" placeholder= "10000...">
                     <input class="form-control form-control-lg" name="system_amount" type="hidden" value="{{$total}}" >
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footer')
<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/admin-assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/admin-assets/plugins/jszip/jszip.min.js"></script>
<script src="/admin-assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/admin-assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin-assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin-assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
