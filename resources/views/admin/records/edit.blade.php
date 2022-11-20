<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Records</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link href="{{asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
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
      <h1>Edit Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Records</a></li>
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
              <form action="{{ route('admin.updaterecordspost') }}" method="post" id="addrecordsform">
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
              @if($editrecords != false)
                @foreach($editrecords as $row)
                <?php $version_id=$row['version_id'];
                $book_id=$row['book_id'];
                $chapter_id=$row['chapter_id'];
                $content=$row['content'];
                $status=$row['status'];
                $meta_keyword=$row['meta_keyword'];
                $meta_description=$row['meta_description'];
                ?>
                @endforeach
              @endif
                <input
                 type="hidden" name="version_hide" id="version_hide" value="0">
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                <input type="hidden" name="status_hide" id="status_hide" value="0">
                <input type="hidden" name="book_name_hide" id="book_name_hide" value="0">
                <input type="hidden" name="chapter_name_hide" id="chapter_name_hide" value="0">
                <input type="hidden" name="vers_content_hide" id="vers_content_hide" value="0">
                <input type="hidden" name="meta_description_hide" id="meta_description_hide" value="0">
                <input type="hidden" name="meta_keyword_hide" id="meta_keyword_hide" value="0">
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Select Version</label>
                  <div class="col-sm-7">
                  <select class="form-select" aria-label="Default select example" placeholder="select Status" id="version" name="version">
                 
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
                  <label for="inputText" class="col-sm-3 col-form-label">Select Chapter</label>
                  <div class="col-sm-7">
                  <select class="form-select" aria-label="Default select example" placeholder="select Book" id="chapter_name" name="chapter_name">
                    </select>                    
                    <span class="error_chapter_name"></span>
                  </div>
                </div>
                <div class="row mb-3">
                <span class="col-sm-1"></span>
                  <label for="inputPassword" class="col-sm-3 col-form-label">Vers Content</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Vers Content" name="vers_content" id="vers_content" style="height: 100px"><?php echo $content; ?></textarea>
                    <span class="error_vers_content"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Select Status</label>
                  <div class="col-sm-7">
                 
                  <select class="form-select" aria-label="Default select example" placeholder="select Status" id="status" name="status">
                      <option selected></option>
                      <?php if($status == 1){ ?>
                      <option value="1" selected>Active</option>
                      <option value="2">In Active</option>
                      <?php } else { ?>
                        <option value="1">Active</option>
                      <option value="2" selected>In Active</option>
                        <?php } ?>
                    
                    </select>
                    <span class="errorstatus"></span>
                  </div>
                 
                </div>
              
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Meta Keywords</label>
                  <div class="col-sm-7">
                 
                    <input type="text" class="form-control" placeholder="Meta keywords Seprated with Commas" id="meta_keyword" name="meta_keyword" value="<?php echo $meta_keyword; ?>">
                    <span class="errormetakeyword"></span>
                  </div>
                 
                </div>
                <div class="row mb-3">
                <span class="col-sm-1"></span>
                  <label for="inputPassword" class="col-sm-3 col-form-label">Meta Description</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Meta Description" name="meta_description" id="meta_description" style="height: 100px"><?php echo $meta_description; ?></textarea>
                    <span class="errormetadescription"></span>
                  </div>
                </div>
               
                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <center><button type="button" class="btn btn-primary addrecords">Edit Records</button><center>
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

  </main>

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
  <script src="{{asset('vendor/quill/quill.min.js')}}"></script>
  <script>
  
$(document).ready(function(){
  getbooks(<?php echo $version_id; ?>,<?php echo $book_id; ?>);
  getchapters(<?php echo $book_id; ?>,<?php echo $chapter_id; ?>);
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
    $.post("{{ route('admin.pickchapters') }}", {id: $(this).val(), _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
            console.log(response);
                var select = document.getElementById('chapter_name');
                $(select).html('<option value=""> Select Chapter </option>');
                // Add options
                $.each(response.data, function (i, data) {  
                    $(select).append('<option value=' + data.id + '>' + data.chapter_name + '</option>');
                  
                });
            });
  });
  $.post("{{ route('admin.pickversions') }}", {id: $(this).val(), _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
                var select = document.getElementById('version');
                $(select).html('<option value=""> Select Versions </option>');
                $.each(response.data, function (i, data) {  
                  if(data.id == '<?php echo $version_id; ?>')
                  {
                    $('#version_hide').val(1);
                  
                    $(select).append('<option value=' + data.id + ' selected>' + data.version_name + '</option>');
                  }
                  else
                  {
                    $(select).append('<option value=' + data.id + '>' + data.version_name + '</option>');
                  }
                  
                });
            });
            function getbooks(id,book_id)
  {

      $.post("{{ route('admin.pickbooks') }}", {id: id, _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
            
                var select = document.getElementById('book_name');
                $(select).html('<option value=""> Select Books </option>');
                $.each(response.data, function (i, data) {  
                    if(book_id == data.id)
                    {
                      $(select).append('<option value=' + data.id + ' selected>' + data.title + '</option>');
                    }
                    else
                    {
                      $(select).append('<option value=' + data.id + '>' + data.title + '</option>');
                    }
                });

            });

  }
  function getchapters(id,chapter_id)
  {
    $.post("{{ route('admin.pickchapters') }}", {id: id, _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
           
                var select = document.getElementById('chapter_name');
                $(select).html('<option value=""> Select Chapter </option>');
                // Add options
                $.each(response.data, function (i, data) {  
                  if(data.id == chapter_id)
                  {
                    $(select).append('<option value=' + data.id + ' Selected>' + data.chapter_name + '</option>');
                  }
                  else
                  {
                    $(select).append('<option value=' + data.id + '>' + data.chapter_name + '</option>');
                  }
                   
                  
                });
            });
  }
  

});
  </script>

</body>

</html>