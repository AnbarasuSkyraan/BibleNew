<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Chapters</title>
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
      <h1>Add Chapters</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Chapters</a></li>
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
              <form action="{{ route('admin.addchapterpost') }}" method="post" id="addchaptersform">
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
                 type="hidden" name="version_hide" id="version_hide" value="0">
                <input type="hidden" name="status_hide" id="status_hide" value="0">
                <input type="hidden" name="book_name_hide" id="book_name_hide" value="0">
                <input type="hidden" name="chapter_name_hide" id="chapter_name_hide" value="0">
                <input type="hidden" name="chapter_num_hide" id="chapter_num_hide" value="0">
                <input type="hidden" name="meta_description_hide" id="meta_description_hide" value="0">
                <input type="hidden" name="meta_keyword_hide" id="meta_keyword_hide" value="0">
              
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Select Version</label>
                  <div class="col-sm-7">
                  <select class="form-select" aria-label="Default select example" placeholder="select Status" id="version" name="version">
                  <option selected></option>
                      @if($versions != false)
                      @foreach($versions as $row)
                      <option value="{{$row['id']}}">{{$row['version_name']}}</option>
                      @endforeach
                      @endif
                    </select>
                    <span class="errorversion"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Select Books</label>
                  <div class="col-sm-7">
                  <select class="form-select" aria-label="Default select example" placeholder="select Book" id="book_name" name="book_name">
                    </select>                    
                    <span class="error_book_name"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Chapter Name</label>
                  <div class="col-sm-7">
                 
                    <input type="text" class="form-control" placeholder="Chapter Name" id="chapter_name" name="chapter_name">
                    <span class="error_chapter_name"></span>
                  </div>
                 
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Chapter Number</label>
                  <div class="col-sm-7">
                 
                    <input type="text" class="form-control" placeholder="Chapter Number" id="chapter_num1" name="chapter_num1" value="<?php echo $chapter_number; ?>" disabled>
                    <input type="hidden" name="chapter_num" id="chapter_num" value="<?php echo $chapter_number; ?>">
                    <span class="error_chapter_num"></span>
                  </div>
                 
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Select Status</label>
                  <div class="col-sm-7">
                 
                  <select class="form-select" aria-label="Default select example" placeholder="select Status" id="status" name="status">
                      <option selected></option>
                      <option value="1">Active</option>
                      <option value="2">In Active</option>
                    
                    </select>
                    <span class="errorstatus"></span>
                  </div>
                 
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Meta Keywords</label>
                  <div class="col-sm-7">
                 
                    <input type="text" class="form-control" placeholder="Meta keywords Seprated with Commas" id="meta_keyword" name="meta_keyword">
                    <span class="errormetakeyword"></span>
                  </div>
                 
                </div>
                <div class="row mb-3">
                <span class="col-sm-1"></span>
                  <label for="inputPassword" class="col-sm-3 col-form-label">Meta Description</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Meta Description" name="meta_description" id="meta_description" style="height: 100px"></textarea>
                    <span class="errormetadescription"></span>
                  </div>
                </div>
               
                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <center><button type="button" class="btn btn-primary addchapters">Add Version</button><center>
                  </div>
                </div>
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
  $('#version').change(function()
  {
    if($(this).val() != '')
    {
      $.post("{{ route('admin.pickbooks') }}", {id: $(this).val(), _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
            console.log(response);
                var select = document.getElementById('book_name');
                $(select).html('<option value=""> Select Books </option>');
                // Add options
                $.each(response.data, function (i, data) {  
                    $(select).append('<option value=' + data.id + '>' + data.title + '</option>');
                  
                });
            });
    }
  });
  $('#book_name').change(function()
  {
    $('#chapter_name').focus();
  });
  

});
  </script>

</body>

</html>