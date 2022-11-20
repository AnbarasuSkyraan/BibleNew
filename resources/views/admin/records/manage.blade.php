<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Manage Records</title>
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
      <h1>Manage Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Records</a></li>
          <li class="breadcrumb-item">Add</li>
         
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
       
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <div class="row">
                <div class="col-sm-8"><A href="{{route('admin.exportrecords')}}"><button type="button" class="btn btn-primary">Download As Excel</button></A></div>
                <div class="col-sm-4">
              <select class="form-select" aria-label="Default select example" placeholder="select Status" id="pagenumber" name="pagenumber" ng-model="pagenumber">
                      <option selected></option>
                      <?php if($pagescount > 0){ ?>
                        <?php for($i=0;$i<$pagescount;$i++){ ?>
                          <?php if($i == 0){ ?>
                            <option value="<?php echo $i+1; ?>" selected><?php echo 'Page '.$i+1; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $i+1; ?>"><?php echo 'Page '.$i+1; ?></option>
                              <?php } ?>
                      <?php } } ?>
                      
                    
                    </select>
                            </div>
                            </div>
              <table class="table table-bordered" style="margin-top:10px;">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Version Name</th>
      <th scope="col">Book Name</th>
      <th scope="col">Chapter Name</th>
      <th scope="col">Content</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="bodyclass" style="font-size:12px;">
 <?php $sno=0; ?>
   @if($records != false)
      @foreach($records as $row)
      <?php $sno+=1; ?>
      <tr>
      <td scope="col">{{ $sno }}</td>
      <td scope="col">{{ $row->version_name }}</td>
      <td scope="col">{{ $row->book_name }}</td>
      <td scope="col">{{ $row->chapter_name }}</td>
      <td scope="col">{{ $row->content }}</td>
      <td scope="col">@if($row->status == 1) Active @else In Active @endif</td>
      <td scope="col"><i class="bi bi-pen forpointer"  onClick="editfunction({{$row->id}})" style="font-size:15px;color:green;margin-left:10px"></i><i class="bi bi-trash forpointer" onClick="deletefunction(<?php echo $row->id; ?>)" style="color:red;font-size:15px;margin-left:10px;"></i>
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
function editfunction(id)
{
  window.location.href = "{{url('admin/EditRecords')}}" + "/" + id;
}
if('<?php echo count($records); ?>' == 0 && '<?php echo $recordscount > 0; ?>')
    {
      window.location.href = "{{url('admin/ManageRecords')}}" + "/<?php echo $pagenumber-1; ?>";
    }
    function deletefunction(id)
    {
      $.confirm({
    title: 'Hai,',
    content: 'Do you Want to Delete?',
    type: 'red',
    buttons: {   
        ok: {
            text: "ok!",
            btnClass: 'btn-primary',
            keys: ['enter'],
            action: function(){
              $.post("{{ url('admin/DeleteRecords') }}",{id:id, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
      
          console.log(response);
                
              if(response.success == 1)
              {
                toastr.error(response.message);
                window.location.href = "{{url('admin/ManageRecords')}}" + "/<?php echo $pagenumber; ?>";
              }
              else
              {
                toastr.error(response.message);
              }
          
            
            });
            }
        },
        cancel: function(){
                console.log('the user clicked cancel');
        }
    }
});
    }
//   var app = angular.module("myApp", []);
//   app.controller("myCtrl", function($scope,$http) {
    
  //   $scope.loadcurrentpage=function()
  //   {
  //         $http.get("{{ url('admin/getVersions') }}/"+$('#pagenumber').val())
  //     .then(function(response) {
  //       if(response.data.versions.length > 0)
  //       {
  //         for(i=0;i<response.data.versions.length;i++)
  //         {
  //           if(response.data.versions[i]['status'] == 1)
  //           {
  //             var status='Active';
  //           }
  //           else
  //           {
  //             var status='In Active';
  //           }
  //           if(i == 0)
  //           {
  //             $('.bodyclass').html('<tr><td>'+response.data.versions[i]['version_name']+'</td><td>'+response.data.versions[i]['metakeywords']+'<td>'+response.data.versions[i]['metadescription']+'</td><td>'+status+'</td><td><A href="#" onClick="editfunction('+response.data.versions[i]['id']+')" style="color:green">Edit</A><A href="#" onClick="deletefunction('+response.data.versions[i]['id']+')" style="color:red;padding-left:10px">Delete</A></td> </tr>');
  //           }
  //         }
  //       }
  //     });
  //   }
  //   $http.get("{{ url('admin/getVersions') }}/"+$('#pagenumber').val())
  // .then(function(response) {
  //   if(response.data.versions.length > 0)
  //   {
  //     for(i=0;i<response.data.versions.length;i++)
  //     {
  //       if(response.data.versions[i]['status'] == 1)
  //       {
  //         var status='Active';
  //       }
  //       else
  //       {
  //         var status='In Active';
  //       }
  //       if(i == 0)
  //       {
  //         $('.bodyclass').html('<tr><td>'+response.data.versions[i]['version_name']+'</td><td>'+response.data.versions[i]['metakeywords']+'<td>'+response.data.versions[i]['metadescription']+'</td><td>'+status+'</td><td><A href="#" onClick="editfunction('+response.data.versions[i]['id']+')" style="color:green">Edit</A><A href="#" onClick="deletefunction('+response.data.versions[i]['id']+')" style="color:red;padding-left:10px">Delete</A></td> </tr>');
  //       }
  //     }
  //   }
  // });

//});

  </script>

</body>

</html>