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

</head>
<body>

<section class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
      <img src="{{ asset('assets/images/ebc-logo.png') }}">
      </div>

    </div>
  </div>
</section>

<section class="ebc-orders">
  <div class="container">

  <form id="multi-step-form" method="post" action="{{route('welcomehome')}}">
  @csrf
    <div class="form-step active-step" id="step-1">
            <h3>LOGIN</h3>
      <div class="mb-3">
        <label for="field1">Username</label>
        <input type="text" class="form-control" id="field1" required value="test">
      </div>
      <div class="mb-3">
        <label for="field2">Password</label>
        <input type="text" class="form-control" id="field2" required value="test">
      </div>
    </div>

      <button class="btn btn-primary" onclick="submitForm()" type="submit">Login</button>
    </div>
    </form>
    </div>
  </div>
</section>


</body>
</html>