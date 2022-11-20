<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Upload History Versions</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
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
  <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
.forpointer
{
  cursor:pointer;
}
  </style>
<body>

   <!-- ======= Header ======= -->
@include('others.header')

<!-- ======= Sidebar ======= -->
@include('others.sidebar')  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Upload History Versions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Upload History Versions</a></li>
          <li class="breadcrumb-item">Add</li>
         
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
      <div class="col-lg-1"></div>
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
             
  <table class="table table-bordered" style="margin-top:10px;">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Options</th>
      <th scope="col">Created At</th>
      <th scope="col">Processed</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="bodyclass" style="font-size:12px;">
 <?php $sno=0; ?>
   @if($uploadrecords != false)
      @foreach($uploadrecords as $row)
      <?php $sno+=1; ?>
      <tr>
      <td scope="col">{{ $sno }}</td>
      <td scope="col">{{ $row['options'] }}</td>
      <td scope="col">{{ date('d-m-Y H:i A',strtotime($row['created_at'])) }}</td>
      <?php if($row['processed'] == 1){ ?><td scope="col">Processed</td><?php } ?>
      <?php if($row['processed'] == 0){ ?><td scope="col">Upload Processing</td><?php } ?>
      <td scope="col"><?php if($row['processed'] == 1){ ?><A href="#" onClick="viewfunction('<?php echo $row['id']; ?>','<?php echo $row['options']; ?>')"><center><u>View</u><center><?php } ?></A>
</td>
    </tr>
      @endforeach
   @else 
   
   <tr colspan="6">
      <td scope="col">No Records Found</td>
    </tr>

   @endif
  
  </tbody>
</table>
           

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script>
    setTimeout(function(){
window.location="{{url('admin/UploadHistory')}}";
}, 10000); 
    function viewfunction(id,options)
    {
     
      if(options == 'Book')
      {
        window.location.href = "{{url('admin/ViewBookList')}}/1/"+id;
      }
      else
      {
        window.location.href = "{{url('admin/ViewVerseList')}}/1/"+id;
      }
      
    }
    $( document ).ready(function() {

});


  </script>

</body>

</html>