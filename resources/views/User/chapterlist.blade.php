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
.forcardverses
{
    border-radius:30px;
    height:80px;
}
.forcardverses:hover
{
    cursor:pointer;
    background-color: #349beb;
    color:white;

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
.forhover:hover
{
    border-color:#5eb1ff;
    border-width: 1px;
}
    </style>
    <title>Chapter List</title>
  </head>
  <body>
    
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
        <div class="row">
        <div class="col-lg-6">
            <div class="card border-radius-30 bgcolor-light-blue">
                <div class="card-body">
                  <h5 class="card-title centertext">Verse of the Day</h5>
                  <p class="card-text">And I say unto you, Ask, and it shall be given you; seek, and ye shall find; knock, and it shall be opened unto you.</p>
                  <h7 class="card-title righttext">Luke: 11:9</h7>
                  <i style="font-size: 1.5rem;" class="fab fa-whatsapp"></i>
                </div>
              </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-radius-30 bgcolor-light-blue">
                <div class="card-body">
                <div class="row margin-10">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Verses">
                                <div class="input-group-append">
                                <button class="btn btn-secondary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row margin-10">
                        <div class="col-lg-6">
                            <select class="form-select" aria-label="Default select example" name="versions" id="versions">
                                <option value='' selected>Select Version</option>
                               <?php if($versions != false){ ?>
                                <?php foreach($versions as $row){ ?>
                                    <?php if($row['id'] == $version_id){ ?>
                                        <option value="<?php echo $row['id']; ?>" selected><?php echo $row['version_name']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['version_name']; ?></option>
                                            <?php } ?>
                                   
                                    <?php } } ?>
                               
                              </select>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-select" aria-label="Default select example" name="books" id="books">
                                <option value='' selected>Select Book</option>
                              </select>
                        </div>
                    </div>
                    <div class="row margin-10">
                        <div class="col-lg-6">
                            <select class="form-select" aria-label="Default select example" name="chapters" id="chapters">
                                <option value='' selected>Select Chapter</option>
                               
                              </select>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-select" aria-label="Default select example" name="verses" id="verses">
                                <option value='' selected>Select Verses</option>
                                
                              </select>
                        </div>
                    </div>
                    <div class="row margin-10">
                        <div class="col-lg-12 centertext">
                            <button type="button" class="btn btn-primary getverses">Get Verses</button>

                        </div>
                        
                    </div>
                  
                </div>
               
                </div>
              </div>
        </div>
        <div class="row margin-20">
            <div class="col-lg-12">
                <div class="card border-radius-30 bgcolor-light-blue">
                <div class="card-header" style="margin-top:10px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="float:left;margin-left:20px;"><i class="fa fa-arrow-left" aria-hidden="true" onClick="prevredirect()" style="cursor:pointer;"></i>
</div>
                        <div style="float:right;margin-right:20px;"><i class="fa fa-arrow-right" aria-hidden="true" onClick="nextredirect()" style="cursor:pointer;"></i>
</div>
                        <h2 style="text-align:center;"><?php echo $version_name; ?></h2>
                    </div>
                                </div>
  </div>
                    <div class="card-body">
                      
                   
                                
                                <div class="row margin-20">
                    <div class="col-lg-12">
                        <div style="float:left"><h4 style="text-align:center;"><?php echo $book_name; ?>:<?php echo $chapter_num; ?></h4></div>
                      
                        
                    </div>
                                </div>
                     <div class="row" style="margin-top:40px;">
                    
                       
                        <div class="col-lg-12">
                        <?php if($chapters != false){ ?>
                            <?php foreach($chapters as $row){ ?>
                                <button class="btn btn-primary mb-2 chapterlisting" id="chapter<?php echo $row->chapter_num; ?>" type="button" onClick="redirectchapter(<?php echo $version_id ?>,<?php echo $book_num; ?>,<?php echo $row->chapter_num; ?>)">
                                    <?php echo $row->chapter_num; ?>
                                </button>
                            
                               
                              
                               
                        
                        <?php } } ?>
                            </div>
                      
                     </div>
                     <?php $i=0; ?>
                     <?php if($records != false){ ?>
                        <?php foreach($records as $row){ ?>
                     <div class="row margin-10">
                        <div class="col-lg-12">
                        <div class="card forhover" style="border-radius:30px;cursor:pointer;">
                        <div class="card-body ">
                           <?php $i=$i+1; ?>
                           <p><?php echo $i; ?> . <?php echo $row['content']; ?></p>
                           
                        </div>
                        </div>
                            </div>
                      
                     </div>
                     <?php } } ?>
                   
                  
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
        function prevredirect()
        {
            if('<?php echo $chaptersfirst->chapter_num; ?>' != '<?php echo $chapter_num; ?>')
            {
                window.location="{{url('user/ChapterList/')}}/<?php echo $version_id; ?>/<?php echo $book_num; ?>/<?php echo $chapter_num-1; ?>";
            }
        }
        function nextredirect()
        {
            
            if('<?php echo $chapterslast[0]->chapter_num; ?>' != '<?php echo $chapter_num; ?>')
            {
                window.location="{{url('user/ChapterList/')}}/<?php echo $version_id; ?>/<?php echo $book_num; ?>/<?php echo $chapter_num+1; ?>";
            }
            
        }
        function redirectchapter(version_id,book_num,chapter_num)
        {
            window.location="{{url('user/ChapterList/')}}/"+version_id+"/"+book_num+"/"+chapter_num;
        }
    $(document).ready(function(){
        $.post("{{ url('user/getVerses') }}",{version_id:'<?php echo $version_id; ?>',book_num:<?php echo $book_num; ?>,id:<?php echo $chapter_num; ?>, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select

         
              if(response.versescount > 0)
              {
                for(var i=0;i<response.versescount;i++)
                {
                    $('#verses').append('<option value=' + response.verses[i]['id'] + '>' + parseInt(i+1)+ '</option>');
                }
              }
            });
        $.post("{{ url('user/getBooks') }}",{id:<?php echo $version_id; ?>, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
                
              if(response.bookscount > 0)
              {
                for(var i=0;i<response.bookscount;i++)
                {
                    if(response.books[i]['book_num'] == '<?php echo $book_num; ?>')
                    {
                        $('#books').append('<option value=' + response.books[i]['book_num'] + ' selected>' + response.books[i]['title'] + '</option>');

                    }
                    else
                    {
                        $('#books').append('<option value=' + response.books[i]['book_num'] + '>' + response.books[i]['title'] + '</option>');

                    }
                }
              }
            });
            $.post("{{ url('user/getChapters') }}",{version_id:<?php echo $version_id; ?>,id:<?php echo $book_num; ?>, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select

               
              if(response.chapterscount > 0)
              {
                for(var i=0;i<response.chapterscount;i++)
                {
                    if(response.chapters[i]['chapter_num'] == '<?php echo $chapter_num; ?>')
                    {
                        $('#chapters').append('<option value=' + response.chapters[i]['chapter_num'] + ' selected>' + response.chapters[i]['chapter_num'] + '</option>');
                    }
                    else
                    {
                        $('#chapters').append('<option value=' + response.chapters[i]['chapter_num'] + '>' + response.chapters[i]['chapter_num'] + '</option>');
                    }
                   
                }
              }
            });
        $('#chapter<?php echo $chapter_num; ?>').css({'background-color':'#d6feff','color':'black'})
       $('#versions').change(function()
       {
        if($(this).val() != '')
        {
            $.post("{{ url('user/getBooks') }}",{id:$(this).val(), _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select
                
              if(response.bookscount > 0)
              {
                for(var i=0;i<response.bookscount;i++)
                {
                    $('#books').append('<option value=' + response.books[i]['book_num'] + '>' + response.books[i]['title'] + '</option>');
                }
              }
            });
        }
       });
       $('#books').change(function()
       {
        if($(this).val() != '')
        {
            $.post("{{ url('user/getChapters') }}",{version_id:$('#versions').val(),id:$(this).val(), _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select

               
              if(response.chapterscount > 0)
              {
                for(var i=0;i<response.chapterscount;i++)
                {
                    $('#chapters').append('<option value=' + response.chapters[i]['chapter_num'] + '>' + response.chapters[i]['chapter_num'] + '</option>');
                }
              }
            });
        }
       });
       $('#chapters').change(function()
       {
        if($(this).val() != '')
        {
            $.post("{{ url('user/getVerses') }}",{version_id:$('#versions').val(),book_num:$('#books').val(),id:$(this).val(), _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {// Get select

         
              if(response.versescount > 0)
              {
                for(var i=0;i<response.versescount;i++)
                {
                    $('#verses').append('<option value=' + response.verses[i]['id'] + '>' + parseInt(i+1)+ '</option>');
                }
              }
            });
        }
       });
       $('.getverses').click(function()
        {
           
            if($('#versions').val() != '' && $('#verses').val() == '' && $('#books').val() == '' && $('#chapters').val() == '')
            {
                window.location="{{url('user/VersionsView')}}/"+$('#versions').val();
            }
            if($('#versions').val() != '' && $('#verses').val() == '' && $('#books').val() != '' && $('#chapters').val() == '')
            {
                window.location="{{url('user/ChapterList')}}/"+$('#versions').val()+"/"+$('#books').val()+"/1";
            }
            if($('#versions').val() != '' && $('#verses').val() == '' && $('#books').val() != '' && $('#chapters').val() != '')
            {
              
                window.location="{{url('user/ChapterList')}}/"+$('#versions').val()+"/"+$('#books').val()+"/"+$('#chapters').val();
            }

        });

    });

    </script>                                
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>