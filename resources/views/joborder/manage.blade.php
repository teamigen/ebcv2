@include('layout.head')

<section class="dashboard">
  <div class="container">
    <div class="row">

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="order-box">
          <a href="{{route('createjoborder')}}" id="order-link">+</a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="order-box active">
          <img src="{{asset('assets/images/user.jpg')}}">
          <span>OrderId</span>
          <h3>23213/3</h3>
          <h2>BusinessCard</h2>
          <p>Customer<br>
             IgenSoftware<br>
             Status:Designing<br>
             OrderCreatedby:John</p>
          <h5>21November2023</h5>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="order-box">
        <img src="{{asset('assets/images/user.jpg')}}">
          <span>OrderId</span>
          <h3>23213/3</h3>
          <h2>BusinessCard</h2>
          <p>Customer<br>
             IgenSoftware<br>
             Status:Designing<br>
             OrderCreatedby:John</p>
          <h5>21November2023</h5>
        </div>
      </div>


    </div>
  </div>
</section>
</body>
</html>


    