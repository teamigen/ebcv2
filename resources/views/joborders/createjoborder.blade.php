@include('layouts.head')

<section class="ebc-orders">
  <div class="container">
    <div class="row">
    <div class="progress mb-3">
    <div class="progress-bar" role="progressbar" style="width: 33.33%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
      Step 1
    </div>
  </div>

  <form id="multi-step-form">
    <div class="form-step active-step" id="step-1">
      <div class="mb-3">
        <label for="field1">Field 1</label>
        <input type="text" class="form-control" id="field1" required>
      </div>
      <div class="mb-3">
        <label for="field2">Field 2</label>
        <input type="text" class="form-control" id="field2" required>
      </div>
      <div class="mb-3">
        <label for="field3">Field 3</label>
        <input type="text" class="form-control" id="field3" required>
      </div>
      <div class="mb-3">
        <label for="select1">Select 1</label>
        <select class="form-select" id="select1" required>
          <option value="">Select an option</option>
          <option value="option1">Option 1</option>
          <option value="option2">Option 2</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="textarea1">Textarea 1</label>
        <textarea class="form-control" id="textarea1" rows="3" required></textarea>
      </div>
      <button class="btn btn-primary" onclick="nextStep(1)" type="button">Next</button>
    </div>

    <div class="form-step" id="step-2">
      <div class="row">
        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{ asset('../assets/images/user.jpg') }}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card selected">
          <img src="{{ asset('../assets/images/user.jpg') }}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{ asset('../assets/images/user.jpg') }}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
            <img src="{{ asset('../assets/images/user.jpg') }}">
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{ asset('../assets/images/user.jpg') }}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{ asset('../assets/images/user.jpg') }}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card selected">
          <img src="{{ asset('../assets/images/user.jpg') }}">
            <h3>Product Title</h3>
            <p><b>251/-</b></p>
          </div>
        </div>

        <div class="col-md-3 col-6">
          <div class="product-card">
          <img src="{{ asset('../assets/images/user.jpg') }}">
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