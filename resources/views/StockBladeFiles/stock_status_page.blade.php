@extends('Layouts.main-layout')

@section('title', 'Maswai Shop Managment System')

@section('header')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="/admin-assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/admin-assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/admin-assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/admin-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/admin-assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="/admin-assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="/admin-assets/plugins/dropzone/min/dropzone.min.css">
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
            <h1>Stock Status</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Widgets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- loop starts Here -->

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Soda-Bottle & Cane</b></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Items</th>

                      <th style="width: 40px">Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Soda_and_Cane as $Soda_and_Cane)

                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$Soda_and_Cane->item_name}}( {{$Soda_and_Cane->size}})</td>
                            @if($Soda_and_Cane->pices <= 10)
                            <td>
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-danger">10%</span></td>
                            <td>{{$Soda_and_Cane->pices}}</td>

                           @elseif($Soda_and_Cane->pices > 20 && $Soda_and_Cane->pices <= 50)
                           <td>
                             <div class="progress progress-xs progress-striped active">
                               <div class="progress-bar bg-success" style="width: 90%"></div>
                             </div>
                           </td>
                             <td><span class="badge bg-success">90%</span></td>
                           <td>{{$Soda_and_Cane->pices}}</td>
                           @endif

                          </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>


          <!-- Conifectionary & Snacks -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Conifectionary & Snacks</b></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Items</th>
                      <th>Progress</th>
                      <th style="width: 40px">(%)</th>
                      <th style="width: 40px">Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Snacks_and_Conifectionary as $Snacks_and_Conifectionary)

                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$Snacks_and_Conifectionary->item_name}}( {{$Snacks_and_Conifectionary->size}} )</td>
                            @if($Snacks_and_Conifectionary->pices <= 10)
                            <td>
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-danger">10%</span></td>
                            <td>{{$Snacks_and_Conifectionary->pices}}</td>


                           @elseif($Snacks_and_Conifectionary->pices > 10 && $Snacks_and_Conifectionary->pices<=20)
                           <td>
                             <div class="progress progress-xs progress-striped active">
                               <div class="progress-bar bg-success" style="width: 90%"></div>
                             </div>
                           </td>
                             <td><span class="badge bg-success">90%</span></td>
                           <td>{{$Snacks_and_Conifectionary->pices}}</td>
                           @endif

                          </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>

          <!-- Grocery -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Grocery</b></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Items</th>
                      <th>Progress</th>
                      <th style="width: 40px">(%)</th>
                      <th style="width: 40px">Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Grocery as $Grocery)

                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$Grocery->item_name}}( {{$Grocery->size}})</td>
                            @if($Grocery->pices <= 10)
                            <td>
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-danger">30%</span></td>
                            <td>{{$Grocery->pices}}</td>

                           @elseif($Grocery->pices > 10 && $Grocery->pices <= 15)
                           <td>
                             <div class="progress progress-xs progress-striped active">
                               <div class="progress-bar bg-success" style="width: 90%"></div>
                             </div>
                           </td>
                             <td><span class="badge bg-success">90%</span></td>
                           <td>{{$Grocery->pices}}</td>
                           @endif

                          </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>

          <!-- Detergent & Cleaning -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Detergent & Cleaning</b></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Items</th>
                      <th>Progress</th>
                      <th style="width: 40px">(%)</th>
                      <th style="width: 40px">Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Detergent_and_Cleaning as $Detergent_and_Cleaning)

                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$Detergent_and_Cleaning->item_name}}</td>
                            @if($Detergent_and_Cleaning->pices <= 10)
                            <td>
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-danger">30%</span></td>
                            <td>{{$Detergent_and_Cleaning->pices}}</td>

                           @elseif($Detergent_and_Cleaning->pices > 10 && $Detergent_and_Cleaning->pices <= 15)
                           <td>
                             <div class="progress progress-xs progress-striped active">
                               <div class="progress-bar bg-success" style="width: 90%"></div>
                             </div>
                           </td>
                             <td><span class="badge bg-success">90%</span></td>
                           <td>{{$Detergent_and_Cleaning->pices}}</td>
                           @endif

                          </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>



          <!-- Sanitary & Beauty -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Sanitary & Beauty</b></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Items</th>
                      <th>Progress</th>
                      <th style="width: 40px">(%)</th>
                      <th style="width: 40px">Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Sanitary_and_Beauty as $Sanitary_and_Beauty)

                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$Sanitary_and_Beauty->item_name}}( {{$Sanitary_and_Beauty->size}})</td>
                            @if($Sanitary_and_Beauty->pices <= 10)
                            <td>
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-danger">10%</span></td>
                            <td>{{$Sanitary_and_Beauty->pices}}</td>

                           @elseif($Sanitary_and_Beauty->pices > 10 && $Sanitary_and_Beauty->pices <= 20)
                           <td>
                             <div class="progress progress-xs progress-striped active">
                               <div class="progress-bar bg-success" style="width: 90%"></div>
                             </div>
                           </td>
                             <td><span class="badge bg-success">90%</span></td>
                           <td>{{$Sanitary_and_Beauty->pices}}</td>
                           @endif

                          </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>


          <!-- loop ends Here -->
          <!-- /.col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footer')
<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="/admin-assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="/admin-assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="/admin-assets/plugins/moment/moment.min.js"></script>
<script src="/admin-assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="/admin-assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/admin-assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/admin-assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="/admin-assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="/admin-assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin-assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin-assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
@endsection
