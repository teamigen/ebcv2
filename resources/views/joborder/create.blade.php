@include('layout.head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="ebc-orders">
  <div class="container">
    <div class="row">
    <div class="progress mb-3">
    <div class="progress-bar" role="progressbar" style="width: 33.33%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
      Step 1
    </div>
  </div>

  <form id="form1" method="post">
    <div class="form-step active-step col-md-12 row" id="step-1">
      <div class="col-md-3" style="float:left;margin-bottom:8px;">
        <label for="field1">Customer Phone</label>
        <input type="number" class="form-control" id="customerPhone" name="customerPhone" required>
      </div>
      <div class="col-md-3" style="float:left;margin-bottom:8px;">
        <label for="field2">Customer Name</label>
        <input type="text" class="form-control" id="customerName" name="customerName" required>
      </div>
      <div class="col-md-3" style="float:left;margin-bottom:8px;">
        <label for="field3">Customer Type</label>
        <select class="form-select" id="customertype" id="customertype" required>
          <option value="">Select Customer Type</option>
          <option value="option1">Option 1</option>
          <option value="option2">Option 2</option>
        </select>
      </div>
      <div class="col-md-3" style="float:left;margin-bottom:8px;">
        <label for="field3">Source</label>
        <select class="form-select" id="source" name="source" required>
          <option value="">Select Source</option>
          <option value="option1">Option 1</option>
          <option value="option2">Option 2</option>
        </select>
      </div>
      <div class="col-md-3" style="float:left;margin-bottom:8px;">
        <label for="select1">GST</label>
        <input type="text" class="form-control" id="customergst" name="customergst" required>
      </div>
      <div class="col-md-3" style="float:left;margin-bottom:8px;">
        <label for="select1">Email</label>
        <input type="text" class="form-control" id="customerEmail" name="customerEmail" required>
      </div>
      <div class="col-md-12" style="float:left;margin-bottom:18px;">
        <label for="textarea1">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
      </div>
      <button class="btn btn-primary" onclick="nextStep(1)" type="button">Next</button>
    </div>

    <div class="form-step" id="step-2">
      <div class="row">
        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{asset('assets/images/user.jpg')}}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card selected">
          <img src="{{asset('assets/images/user.jpg')}}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{asset('assets/images/user.jpg')}}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{asset('assets/images/user.jpg')}}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{asset('assets/images/user.jpg')}}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{asset('assets/images/user.jpg')}}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card selected">
          <img src="{{asset('assets/images/user.jpg')}}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{asset('assets/images/user.jpg')}}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>
      </div>
      <button class="btn btn-secondary" onclick="prevStep(2)" type="button">Previous</button>
      <button class="btn btn-primary" onclick="nextStep(2)" type="button">Next</button>
    </div>

    <div class="form-step" id="step-3">
      <h3 class="mb-3 text-center">Heading</h3>
      <p class="mb-3 text-center">Some text written only for Step 3</p>
      <button class="btn btn-secondary" onclick="prevStep(3)" type="button">Previous</button>
      <button class="btn btn-primary" onclick="submitForm()" type="button">Submit</button>
    </div>
    </form>
    </div>
  </div>
</section>

<script>
  function nextStep(currentStep) {
    if(currentStep==1)
    {

      
      var actionUrl ='savecustomerform';
      

    }
    else
    {
      var actionUrl ='saveproductsfrom';
    }

    $.ajax({
        type: "POST",
        url: actionUrl,
        data: $("#form"+currentStep).serialize(), // serializes the form's elements.
        success: function(data)
        {
          alert(data); // show response from the php script.
        }
    });
    
    document.getElementById(`step-${currentStep}`).classList.remove('active-step');
    document.getElementById(`step-${currentStep + 1}`).classList.add('active-step');
    
    let progress = ((currentStep + 1) / 3) * 100;
    document.querySelector('.progress-bar').style.width = `${progress}%`;
    document.querySelector('.progress-bar').setAttribute('aria-valuenow', progress);
    document.querySelector('.progress-bar').innerHTML = `Step ${currentStep + 1}`;
  }

  function prevStep(currentStep) {
    document.getElementById(`step-${currentStep}`).classList.remove('active-step');
    document.getElementById(`step-${currentStep - 1}`).classList.add('active-step');
    
    let progress = ((currentStep - 1) / 3) * 100;
    document.querySelector('.progress-bar').style.width = `${progress}%`;
    document.querySelector('.progress-bar').setAttribute('aria-valuenow', progress);
    document.querySelector('.progress-bar').innerHTML = `Step ${currentStep - 1}`;
  }

  function submitForm() {
    alert('Form submitted successfully!');
  }
</script>
</body>
</html>