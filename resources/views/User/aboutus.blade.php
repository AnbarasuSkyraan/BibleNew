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


.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}



    </style>
    <title>About Us</title>
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
      <input type="hidden" nmae="emailaddresshide" id="emailaddresshide" value=0>
    <input type="hidden" nmae="passwordhide" id="passwordhide" value=0>
        <div class="container">
          
       <div class="row" style="margin-top:20px;">
        <div class="col-lg-12">
  <h2>About Us</h2>
</div>
      </div>
      <div class="row" style="margin-top:20px;">
        <div class="col-lg-12">
  <h7>Oly Bible is an open and royalty free webpage, which aims to make the Word of God - the Bible - available to as many people as possible, through a means that is simple, up-to-date and cheap to reproduce and use.</h7>
</div>
      </div>
      <div class="row" style="margin-top:20px;">
        <div class="col-lg-12">
  <h7>Oly Bible is growing and changing, there are always new improvements and features to be added, plus other languages that we would like to make available. If you are a native of any of the languages we offer in this site, you may want to translate the materials and tabs to localize the site. Contact us through our email to learn how you can help.

</h7>
</div>
      </div>
        <div>
         
     
   
        
      
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 
    <script>
    $(document).ready(function(){
      $('.signupbutton').click(function()
      {
       
        if($('#emailaddresshide').val() == 1 && $('#passwordhide').val() == 1)
        {
          $('#formid').submit();
        }
        
      });
   
      $('#emailaddress').keyup(function()
      {
        if($(this).val().length == 0)
        {
          $('#emailaddresshide').val(0);
          $('.emailaddresserror').html('<font color="red">Mobile No is Required</font>');
        }
        else
        {
            if(isEmail($(this).val()) == false)
            {
              $('#emailaddresshide').val(0);
              $('.emailaddresserror').html('<font color="red">Please Enter valid Email ID</font>');
            }
            else
            {
              $('#emailaddresshide').val(1);
              $('.emailaddresserror').html('');
            }
            
         
        }
      });
      $('#password').keyup(function()
      {
        if($(this).val().length == 0)
        {
          $('#passwordhide').val(0);
          $('.passworderror').html('<font color="red">Password is Required</font>');
        }
        else
        {
          $('#passwordhide').val(1);
          $('.passworderror').html('');
        }
      });
    });
    function isEmail(emailAdress){
    let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (emailAdress.match(regex)) 
    return true; 

   else 
    return false; 
}
</script>
  </body>
</html>