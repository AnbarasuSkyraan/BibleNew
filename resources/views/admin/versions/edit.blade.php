<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Versions</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('others.header')

<!-- ======= Sidebar ======= -->
@include('others.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Versions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Versions</a></li>
          <li class="breadcrumb-item">Add</li>
         
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- General Form Elements -->
              <form action="{{ route('admin.updaterecordspost') }}" method="post" id="addversionform">
                <input type="hidden" name="id" id="id" value="{{$id}}">
                @csrf
                @if (\Session::has('success'))
              <div class="alert alert-success">
                {!! \Session::get('success') !!}
                 
              </div>
              @endif
              @if (\Session::has('error'))
              <div class="alert alert-danger">
                {!! \Session::get('error') !!}
                 
              </div>
              @endif
                <input
                 type="hidden" name="version_name_hide" id="version_name_hide" value="0">
                 <input type="hidden" name="version_num_hide" id="version_num_hide" value="0">
                <input type="hidden" name="status_hide" id="status_hide" value="0">
                <input type="hidden" name="version_name_hide" id="version_name_hide" value="0">
                <input type="hidden" name="meta_description_hide" id="meta_description_hide" value="0">
                @if($editversions != false)
                @foreach($editversions as $row)
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Version Name</label>
                  <div class="col-sm-7">
                 
                    <input type="text" class="form-control" placeholder="Version Name" name="version_name" id="version_name" value="{{$row['version_name']}}">
                    <span class="errorversionname"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Version Number</label>
                  <div class="col-sm-7">
                 
                    <input type="text" class="form-control" placeholder="Version Number" name="version_num" id="version_num" value="{{$row['version_num']}}" disabled>
                    <input type="hidden" name="version_num" id="version_num" value="<?php echo $row['version_num']; ?>">
                    <span class="errorversionnum"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Select Status</label>
                  <div class="col-sm-7">
                 
                  <select class="form-select" aria-label="Default select example" placeholder="select Status" id="status" name="status">
                      <option selected></option>
                      @if($row['status'] == 1)
                      <option value="1" selected>Active</option>
                      <option value="2">In Active</option>
                      @else 
                      <option value="1">Active</option>
                      <option value="2" selected>In Active</option>
                      @endif
                    
                    </select>
                    <span class="errorstatus"></span>
                  </div>
                 
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Meta Keywords</label>
                  <div class="col-sm-7">
                 
                    <input type="text" class="form-control" placeholder="Meta keywords Seprated with Commas" id="meta_keyword" name="meta_keyword" value="{{ $row['metakeywords'] }}">
                    <span class="errormetakeyword"></span>
                  </div>
                 
                </div>
                <div class="row mb-3">
                <span class="col-sm-1"></span>
                  <label for="inputPassword" class="col-sm-3 col-form-label">Meta Description</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Meta Description" name="meta_description" id="meta_description" style="height: 100px">{{ $row['metadescription'] }}</textarea>
                    <span class="errormetadescription"></span>
                  </div>
                </div>
                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <center><button type="button" class="btn btn-primary addversion">Update Version</button><center>
                  </div>
                </div>
                @endforeach
                @endif
                  </div>
                </div>

             

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>
  <script src="{{asset('ownjs/errorMsg.js')}}"></script>
  <script>
  
$(document).ready(function(){
  
  

});
  </script>

</body>

</html>