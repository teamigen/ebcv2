@include('layout.head')

<section class="dashboard">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-3 col-sm-6">
        <a href="{{route('productparameter')}}" class="single-dashboard-item">
        <i class="fa fa-product-hunt" aria-hidden="true"></i>
          <p>Parameteres</p>
        </a>
      </div>

      <div class="col-lg-2 col-md-3 col-sm-6">
        <a href="{{route('tax')}}" class="single-dashboard-item">
        <i class="fa fa-inr" aria-hidden="true"></i>
          <p>Taxes</p>
        </a>
      </div>

      <div class="col-lg-2 col-md-3 col-sm-6">
        <a href="{{route('productcategory')}}" class="single-dashboard-item">
        <i class="fa fa-product-hunt" aria-hidden="true"></i>
          <p>Category</p>
        </a>
      </div>

      <div class="col-lg-2 col-md-3 col-sm-6">
        <a href="{{route('productsubcategory')}}" class="single-dashboard-item">
        <i class="fa fa-product-hunt" aria-hidden="true"></i>
          <p>Sub Category</p>
        </a>
      </div>

      <div class="col-lg-2 col-md-3 col-sm-6">
        <a href="{{route('producttype')}}" class="single-dashboard-item">
        <i class="fa fa-product-hunt" aria-hidden="true"></i>
          <p>Type</p>
        </a>
      </div>

      <div class="col-lg-2 col-md-3 col-sm-6">
        <a href="{{route('printers')}}" class="single-dashboard-item">
        <i class="fa fa-print" aria-hidden="true"></i>
          <p>Printers</p>
        </a>
      </div>

      <div class="col-lg-2 col-md-3 col-sm-6">
        <a href="{{route('customertype')}}" class="single-dashboard-item">
        <i class="fa fa-users" aria-hidden="true"></i>
          <p>Customer Types</p>
        </a>
      </div>

      <div class="col-lg-2 col-md-3 col-sm-6">
        <a href="{{route('addons')}}" class="single-dashboard-item">
        <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
          <p>Addons</p>
        </a>
      </div>

    </div>
  </div>
</section>
</body>
</html>


    