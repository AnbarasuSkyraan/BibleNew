<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Book Upload</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
@include('others.header')

  <!-- ======= Sidebar ======= -->
@include('others.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Book Upload</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Upload</a></li>
          <li class="breadcrumb-item">New</li>
         
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
              
              <form action="{{ route('admin.bookuploadpost') }}" method="post" id="uploadform" enctype="multipart/form-data">
                @csrf
                @if (\Session::has('success'))
              <div class="alert alert-success">
                {!! \Session::get('success') !!}
                 
              </div>
              @endif
              @if (isset($errors) && $errors->any())
              <div class="alert alert-success">
                @foreach($errors->all() as $error)
                {{$error}}
                @endforeach                 
              </div>
              @endif
              @if (\Session::has('error'))
              <div class="alert alert-danger">
                {!! \Session::get('error') !!}
                 
              </div>
              @endif
                <input
                 type="hidden" name="version_name_hide" id="version_name_hide" value="0">
                <input type="hidden" name="status_hide" id="status_hide" value="0">
                <input type="hidden" name="version_name_hide" id="version_name_hide" value="0">
                <input type="hidden" name="meta_description_hide" id="meta_description_hide" value="0">
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputText" class="col-sm-3 col-form-label">Select versions</label>
                  <div class="col-sm-7">
                 
                  <select class="form-select" aria-label="Default select example" placeholder="select Status" id="versions" name="versions">
                      <option selected></option>
                      <?php if($versions != false){
                        foreach($versions as $row){ ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['version_name']; ?></option>
                          <?php } } ?>
                    </select>
                    <span class="errorstatus"></span>
                  </div>
                 
                </div>
                <div class="row mb-3">
                  <span class="col-sm-1"></span>
                  <label for="inputNumber" class="col-sm-3 col-form-label">File Upload</label>
                  <div class="col-sm-7">
                 
                  <input class="form-control" type="file" id="formFile" name="file">
                    <span class="errorstatus"></span>
                  </div>
                 
                </div>
             
               
                <div class="row mb-3">
                <span class="col-sm-1"></span>
                  <label for="inputPassword" class="col-sm-3 col-form-label">Notes</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Notes" name="notes" id="notes" style="height: 100px"></textarea>
                    <span class="errormetadescription"></span>
                  </div>
                </div>
                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <center><button type="button" class="btn btn-primary submitupload">Submit Upload</button><center>
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
    $(document).ready(function() {

      $('.submitupload').click(function()
      {
        if($('#notes').val() != '' && $('#versions').val() != '' && $('#file').val() != '')
        {
          var fileext=$('#formFile')[0].files[0].name.split('.')[1];
          if(fileext == 'xlsx' || fileext == 'xls' || fileext == 'csv')
          {
            var fd=new FormData();
             fd.append('file',$('#formFile')[0].files[0]);
             fd.append('versions',$('#versions').val());
             fd.append('notes',$('#notes').val());
          
             $.ajax({
           url: "{{route('admin.bookuploadpost')}}",
           method: 'post',
           headers: 
           {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           data: fd,
           dataType: 'json',
           contentType:false,
            processData:false,
      
           success: function(response){
            alert('success');
            
           },
           error: function(response){
              console.log("error : " + JSON.stringify(response) );
           },
           complete: function(){
                $('#loading-image').hide();
            }
         });
          }
         
        }
      });
  });
  </script>
 

</body>

</html>