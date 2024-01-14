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
            <h1>Mikopo Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @foreach($creditors_list as $creditors => $value)
          <!-- loop starts here -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                @foreach($value as $creditor_info)
                 @if($loop->iteration <= 1)
                  <h2 class="card-title"><b>Name: <span style="color:blue;">{{$creditor_info->creditor_name}}</span></b></h2>
                 @endif
                 @endforeach
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Item</th>
                      <th>Size</th>
                      <th>Pice(s)</th>
                      <th style="width: 40px">Cost</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total_balance = 0; ?>
                    @foreach($value as $creditor_info)

                    <?php $total_balance = $total_balance + $creditor_info->total_cost; ?>

                    <tr>
                      <td>{{$creditor_info->creditor_id}}</td>
                      <td>{{$creditor_info->item_name}}</td>
                      <td>{{$creditor_info->size}}</td>
                      <td>
                        {{$creditor_info->pices_sold}}
                      </td>
                      <td><span class="badge bg-danger" style="font-size:18px;">{{number_format($creditor_info->total_cost)}}</span></td>
                    </tr>

                    @endforeach
                    <tr>
                      <td colspan="4"></td>

                    </tr>
                    <tr>
                      <th></th>
                      <th colspan="3">Total</th>

                      <th><span class="badge bg-success" style="font-size:20px;">{{number_format($total_balance)}}</span></th>
                    </tr>

                @foreach($value as $creditor_info)
                    @if($loop->iteration < 2)
                    <tr>
                      <th></th>
                      <th colspan="3">Balance Paid</th>

                      <th><span class="badge bg-success" style="font-size:20px;">{{number_format($creditor_info->balance_paid) }}</span></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th colspan="3" style="color:red;">Remainng</th>

                      <th><span class="badge bg-danger" style="font-size:28px;">{{number_format($creditor_info->remaining_balance) }}</span></th>
                    </tr>
                    @endif
                 @endforeach
                  </tbody>
                </table>
              </div>

              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="row">
                  <div class="col">
                  </div>
                  <div class="p-2">
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#_{{$creditor_info->id}}">Clear Credit</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- loop ends here -->
          <div class="modal fade" id="_{{$creditor_info->id}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">{{$creditor_info->creditor_name}} {{$creditor_info->creditor_id}}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="form" action="/Maswai-Shop-Management-System/Stock-Blade-Files/balance_paid/{{$creditor_info->creditor_id}}" method="post">
                 @csrf
                  <div class="modal-body">
                    <input class="form-control form-control-lg" name="balance_paid" type="number" placeholder= "Balance..">
                     <input type="hidden" class="form-control form-control-lg" name="creditor_id" value="{{$creditor_info->creditor_id}}" placeholder= "Balance..">
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Clear</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          @endforeach
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
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
