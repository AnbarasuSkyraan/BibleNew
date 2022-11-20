<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        white
        {
            color:white;
        }
        .margin-20
        {
            margin-top:20px;
        }
        .margin-10
        {
            margin-top:10px;
        }
        .border-radius-30
        {
            border-radius:30px;
        }
        .bgcolor-light-blue
        {
            background-color: rgb(220, 243, 255);
        }
        .bgcolor-light-yellow
        {
            background-color: rgb(255, 247, 180);
        }
        .centertext
        {
            text-align: center;
        }
        .righttext
        {
            float: right;
        }
        .buttons
        {
            width:100%;
            border-color:#adacac;
            box-shadow: 0 2px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            background-color: white;
            border-radius:30px;
        }
        .buttons:hover
        {
            background-color: #349beb;
            color:white;
        }
        .forpointer
        {
            cursor:pointer;
        }
        .alignleft
        {
            float:left;
            font-size:12px;
            color:grey;
        }
        .alignleft:hover
        {
            color:white;
        }
        .alignright
        {
            font-size:12px;
            color:grey;
            float:right;
        }
        .alignright:hover
        {
            color:white;
        }
       

    /* search text box */
    .main {
    width: 50%;
    margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
.forcard
{
    border-radius:30px;
    height:80px;
}
.forcard:hover
{
    background-color: #349beb;
            color:white;
            cursor:pointer;
}
.chapterlisting
{
    padding:0px;
    width:50px;
    height:40px;
}
.chapterlisting:hover
{
    background-color:#d6feff;
    color:black;
}
.contentcard
{
    border-radius:30px;
    cursor:pointer;
}
.contentcard:hover
{
    border-color:blue;
}

    </style>
    <title>Parallel Reading</title>
  </head>
  <body>
    <input type="hidden" name="chapter_num_hide" id="chapter_num_hide" value="0">
    <input type="hidden" name="starthide" id="starthide" value="0">
    <input type="hidden" name="endhide" id="endhide" value="0">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #125cbd;">
        <div class="container">
            <a class="navbar-brand" href="#"> <h4><white>Olybible.com</white></h4></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
          <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
              <li class="nav-item mx-auto">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}"><white>Home</white></a>
              </li>
              <li class="nav-item  mx-1">
                <a class="nav-link" href="{{url('user/Bible')}}"><white>Bible</white></a>
              </li>
              <li class="nav-item  mx-1">
                <a class="nav-link" href="{{url('user/ParallelReading')}}"><white>Parallel Reading</white></a>
              </li>
              <li class="nav-item mx-1">
                <a class="nav-link" href="{{url('user/AboutUs')}}"><white>About</white></a>
              </li>
              <li class="nav-item mx-1">
                <a class="nav-link" href="#"><white>Contact</white></a>
              </li>
              @if(Illuminate\Support\Facades\Auth::guard('user')->check())
              <div class="dropdown">
  <a class="btn dropdown-toggle shadow-none text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
  {{ Illuminate\Support\Facades\Auth::guard('user')->user()->name }}
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#">Profile</a></li>
    <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
  </ul>
</div>
             @else
             <li class="nav-item mx-1">
                <a class="nav-link" href="{{url('user/Login')}}"><white>Login</white></a>
              </li>
             @endif
           
             
            </ul>
           
          </div>
        </div>
      </nav>
     
      <div class="container margin-20">
     
      
       
                    <div class="row margin-10">
                        <div class="col-lg-4">
                            <select class="form-select" aria-label="Default select example" name="optionsone" id="optionsone">
                             
                                    
                                      
                               
                              </select>
                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" aria-label="Default select example" name="optionstwo" id="optionstwo">
                           
                               
                              </select>
                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" aria-label="Default select example" name="booksoptions" id="booksoptions">
                           
                               
                              </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top:40px;">
                    <div class="col-lg-12 addtohtml">
                     </div>
                 </div>
                 <div class="row" style="margin-top:40px;">
                    <div class="col-lg-12">
                    <button type="button" class="btn btn-info" style="float:left" onClick="functionprev()">Prev</button>
                    <button type="button" class="btn btn-info" style="float:right" onClick="functionnext()">Next</button>

                     </div>
                 </div>
                 <div class="row" style="margin-top:40px;">
                    <div class="col-lg-6 lefthandside">
                    </div>
                    <div class="col-lg-6 righthandside">
                    </div>
                 </div>
                   
                  
                  
                </div>
               
                </div>
              </div>
        </div>
   
                   
                    </div>
                  </div>
            </div>
        </div>
        </div>
        
      
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        function functionprev()
        {
            if($('#starthide').val() != $('#chapter_num_hide').val())
            {
                var chapter_num=$('#chapter_num_hide').val();
                $('#chapter_num_hide').val(parseInt(chapter_num)-1);
                getlefthandside($('#optionsone').val(),$('#booksoptions').val(),parseInt(chapter_num)-1);
                getrighthandside($('#optionstwo').val(),$('#booksoptions').val(),parseInt(chapter_num)-1);
            }
        }
        function functionnext()
        {
            if($('#endhide').val() != $('#chapter_num_hide').val())
            {
                var chapter_num=$('#chapter_num_hide').val();
                $('#chapter_num_hide').val(parseInt($('#chapter_num_hide').val())+parseInt(1));
                
                getlefthandside($('#optionsone').val(),$('#booksoptions').val(),parseInt($('#chapter_num_hide').val())+parseInt(1));
                getrighthandside($('#optionstwo').val(),$('#booksoptions').val(),parseInt($('#chapter_num_hide').val())+parseInt(1));
            }
        }
         function functiongetchapters(chapter_num)
            {
              
                $('#chaptersfinal'+chapter_num).css({'background-color':'#d6feff','color':'black'});
                $('#chapter_num_hide').val(chapter_num);
                getlefthandside($('#optionsone').val(),$('#booksoptions').val(),chapter_num);
                getrighthandside($('#optionstwo').val(),$('#booksoptions').val(),chapter_num);
            }
            function getlefthandside(version_id,book_num,chapter_num)
            {
                $.post("{{ route('user.getlefthandside') }}", {version_id:version_id,book_num:book_num,chapter_num:chapter_num,_token: '{{ csrf_token() }}'})
                 .done(function (response) {// Get select
    
          var html1='';
          $.each(response.records, function (i, data) {  
          
                html1=html1+ '<div class="row" style="margin-top:10px;"><div class="col-lg-12"><div class="card contentcard"> <div class="card-body">'+parseInt(i+1)+' . '+data.content+'</div></div></div></div>'
                  
                });
                
                $('.lefthandside').html(html1);
              
               
              
            });
            return 0;
            }
            function getrighthandside(version_id,book_num,chapter_num)
            {
                $.post("{{ route('user.getrighthandside') }}", {version_id:$('#optionstwo').val(),book_num:$('#booksoptions').val(),chapter_num:chapter_num,_token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
              
          var html1='';
          $.each(response.records, function (i, data) {  
                html1=html1+ '<div class="row" style="margin-top:10px;"><div class="col-lg-12"><div class="card contentcard"> <div class="card-body">'+parseInt(i+1)+' . '+data.content+'</div></div></div></div>'
                  
                });
                
                $('.righthandside').html(html1);
              
               
              
            });
            return 0;
            }
    $(document).ready(function(){
        $('#optionsone').change(function()
        {
            getlefthandside($('#optionsone').val(),$('#booksoptions').val(),$('#chapter_num_hide').val());
            
        });
        $('#optionstwo').change(function()
        {
            getrighthandside($('#optionstwo').val(),$('#booksoptions').val(),$('#chapter_num_hide').val());
            
        });
        $('#booksoptions').change(function()
        {
           
            $.post("{{ route('user.getallchaptersoptions') }}", {version_id:$('#optionsone').val(),book_num:$(this).val(),chapter_num:$('#chapter_num_hide').val(),_token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
                console.log(response);
          var html1='';
          $('#starthide').val(0);
          $('#endhide').val(response.chapters.length-1);
          $.each(response.chapters, function (i, data) {  
        
                html1=html1+ ' <button class="btn btn-primary mb-2 chapterlisting" id="chaptersfinal'+data.chapter_num+'" onClick="functiongetchapters('+data.chapter_num+')">'+data.chapter_num+'</button>'
                });
               
                $('.addtohtml').html(html1);
              

              
            });
            getlefthandside($('#optionsone').val(),$('#booksoptions').val(),1);
                getrighthandside($('#optionstwo').val(),$('#booksoptions').val(),1);

        });
        $.get("{{ route('user.pickversions') }}", {_token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
          console.log(response);
                var select = document.getElementById('optionsone');
                $(select).html('<option value=""> Select Versions one </option>');
                $.each(response.versions, function (i, data) {  
                    if(i == 1)
                    {
                        $(select).append('<option value=' + data.id + ' selected>' + data.version_name + '</option>');
                    }
                    else
                    {
                        $(select).append('<option value=' + data.id + '>' + data.version_name + '</option>');
                    }
                    
                  
                });

                var select = document.getElementById('optionstwo');
                $(select).html('<option value=""> Select Versions Two </option>');
                // Add options
                $.each(response.versions, function (i, data) {  
                    if(i == 0)
                    {
                        $(select).append('<option value=' + data.id + ' selected>' + data.version_name + '</option>');
                    }
                    else
                    {
                        $(select).append('<option value=' + data.id + '>' + data.version_name + '</option>');
                    }
                  
                });
            });
            $.get("{{ route('user.pickbooksboth') }}", {_token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
          console.log(response);
          console.log(response);
                var select = document.getElementById('booksoptions');
                $(select).html('<option value=""> Select Books </option>');
                $.each(response.books_one, function (i, data) {  
                    if(i == 0)
                    {
                        $(select).append('<option value=' + data.book_num+ ' selected>' + data.title +' - '+response.books_two[i]['title']+'</option>');
                    }
                    else
                    {
                        $(select).append('<option value=' + data.book_num + '>' + data.title +' - '+response.books_two[i]['title']+'</option>');
                    }
                    
                  
                });

              
            });
            $.get("{{ route('user.chapterscountboth') }}", {_token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
       
          var html1='';
          $('#starthide').val(0);
          $('#endhide').val(response.chapters.length-1);
          $.each(response.chapters, function (i, data) {  
          
                html1=html1+ ' <button class="btn btn-primary mb-2 chapterlisting" onClick="functiongetchapters('+data.chapter_num+')">'+data.chapter_num+'</button>'
                  
                });
               
                $('.addtohtml').html(html1);
              

              
            });
            $.get("{{ route('user.lefthandside') }}", {_token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
       
          var html1='';
          $.each(response.records, function (i, data) {  
          
                html1=html1+ '<div class="row" style="margin-top:10px;"><div class="col-lg-12"><div class="card contentcard"> <div class="card-body">'+parseInt(i+1)+' . '+data.content+'</div></div></div></div>'
                  
                });
                
                $('.lefthandside').html(html1);
              
               
              
            });
            $.get("{{ route('user.righthandside') }}", {_token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
       
          var html1='';
          $.each(response.records, function (i, data) {  
          
                html1=html1+ '<div class="row" style="margin-top:10px;"><div class="col-lg-12"><div class="card contentcard"> <div class="card-body">'+parseInt(i+1)+' . '+data.content+'</div></div></div></div>'
                  
                });
                
                $('.righthandside').html(html1);
              
               
              
            });
           
         
    });
    
    </script>
  </body>
</html>