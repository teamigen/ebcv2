<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EBC</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />  


</head>
<body>

<section class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
      <img src="{{ asset('assets/images/ebc-logo.png') }}">

    <div class="headcss">
      <div class="row">

        <div class="col-md-6">
        @if(Request::segment(1) != 'home')

    @php
            $navname = Request::segment(1);
            $navnamesub=Request::segment(2);
            if($navname=='settings')
            {
               $navlink = 'managesettings';
            }
            elseif($navname=='joborder')
            {
               $navlink = 'managejoborder';
            }

            elseif($navname=='inventory')
            {
               $navlink = 'manageproducts';
            }
            else
            {
              $navlink='home';
            }
            @endphp
   
        <p><i class="fa fa-home" aria-hidden="true"></i>
           <a href="{{route('home')}}">Home</a> / <a href="{{route($navlink)}}">{{$navname}}</a><span>
 </span> / {{$navnamesub}}</p>
 @endif

</div>
<div class="col-md-6">
  <p style="text-align:right">Admin <span><a href="{{ route('logout', base64_encode(Auth::user()->id)) }}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
</span></p>
</div>
   
</div>

      </div>

    </div>
  </div>
</section>
<style>
  label
  {
    margin:6px 0;
  }
  .btn
  {
    /* float:right;
    margin-top:12px; */
  }

  .borderclass
  {
    border: 1px solid #ccc;
    padding: 26px;

  }
  </style>