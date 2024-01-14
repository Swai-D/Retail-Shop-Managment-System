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

    @if(session()->has('Message'))
      <div class="alert alert" role = "alert">
        <p class="lead text-center" style="color: #f33155">
          {{session()->get('Message')}}
        </p>
      </div>
    <!-- Content Header (Page header) -->
    @endif
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advanced Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Mobile Money Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/Maswai-Shop-Management-System/Wakala-Blade-Files/get_mobile_money_data" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">M-Pesa Float</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="m_pesa" placeholder="M-Pesa" value="{{old('m_pesa')}}">
                  </div>
                  <span style="color:red;">{{$errors->first('m_pesa')}}</span>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tigo-Pesa Float</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="tigo_pesa" placeholder="Tigo Pesa" value="{{old('tigo_pesa')}}">
                  </div>
                  <span style="color:red;">{{$errors->first('tigo_pesa')}}</span>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Airtel-Money Float</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="airtel_money" placeholder="Airtel Money" value="{{old('airtel_money')}}">
                  </div>
                  <span style="color:red;">{{$errors->first('airtel_money')}}</span>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Halo-Pesa Float</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="halo_pesa" placeholder="Halo pesa" value="{{old('halo_pesa')}}">
                  </div>
                  <span style="color:red;">{{$errors->first('halo_pesa')}}</span>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Cash</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="cash" placeholder="Cash In Hand" value="{{old('cash')}}">
                  </div>
                  <span style="color:red;">{{$errors->first('cash')}}</span>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Pending</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="pending" placeholder="Pending" value="{{old('pending')}}">
                  </div>
                  <span style="color:red;">{{$errors->first('pending')}}</span>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title" >Mobile Money capital &nbsp; &nbsp; &nbsp; <span style="color:red; font-size:30px;">Tsh 1,650,000/=</span> </h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Networks</th>
                        <th style="width: 40px">Label</th>
                      </tr>
                    </thead>
                    @foreach($today_transaction as $network_data)
                      <tbody>
                      <tr>
                        <td>1.</td>
                        <td>M-Pesa</td>
                        <td><span class="badge bg-danger" style="font-size:26px;">{{number_format($network_data->m_pesa)}} /=</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Tigo-Pesa</td>
                        <td><span class="badge bg-primary" style="font-size:26px;">{{number_format($network_data->tigo_pesa)}} /=</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Airtel Money</td>
                        <td><span class="badge bg-danger" style="font-size:26px;">{{number_format($network_data->airtel_money)}} /=</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Halo-Pesa</td>
                        <td><span class="badge " style="font-size:26px; background-color:orange;">{{number_format($network_data->halo_pesa)}} /=</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Cash-In-Hand</td>
                        <td><span class="badge bg-success" style="font-size:26px;">{{number_format($network_data->cash)}} /=</span></td>
                      </tr>
                      <tr>
                        <td>6.</td>
                        <td>Pending</td>
                        <td><span class="badge bg-warning" style="font-size:26px;">{{number_format($network_data->pending)}} /=</span></td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
                <!-- /.card-body -->

                <div class="card-footer clearfix">
                 <div class="row">
                   <div class="col-9">
                     <h4><b>Total</b> </h4>
                   </div>
                   <div class="col-3">
                     <h6><span ><b>Tsh 1,650,000 /=</b></span></h6>

                     <h6><span style="color:green;"><b>Tsh {{number_format($total)}} /=</b></span></h6>
                     <hr>
                     @if($balance < 0 )
                     <h6><span style="color:green;"><b>{{number_format($balance)}}</b></span></h6>
                     <hr>
                     @elseif($balance > 0)
                     <h6><span style="color:red;"><b>{{number_format($balance)}}</b></span></h6>
                     <hr>
                     @endif
                   </div>
                 </div>
                 <br>
                <div class="">
                  @if($balance < 0)
                  <p class="">
                    <em >Kiasi cha Tsh <span style="color:red;">{{number_format($balance * -1)}} /=</span> Kimezidi kwenye Mtaji Wako wa Wakala</em>
                  </p>
                  @elseIf($balance > 0 )
                  <p class="">
                    <em >Kiasi cha Tsh <span style="color:red;">{{(number_format($balance)) }} /=</span>  Kimepungua kwenye Mtaji Wako wa Wakala</em>
                  </p>
                  @elseif($balance == 0)
                  <p class="">
                    <em style="color:green;">Mahesabu ya Uwakala Yapo Sawa</em>
                  </p>
                  @endif
                </div>
                </div>
              </div>
            <!-- /.card -->

          </div>
          <!--/.col (right) -->
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
