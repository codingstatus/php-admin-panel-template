
  <br><br>
  <div class="row">
    <div class="col-sm-12">
      <h4>Change Password</h4>
    </div>
    
  </div>
  <br>
   <div class="form">
 
 
<form id="adminForm" name="change_password" class="needs-validation" method="post">
    <div class="form-group">
      <label for="uname">Old Password</label>
      <input type="password" class="form-control" placeholder="Enter Old Password" name="password" required>

    </div>
    <div class="form-group">
      <label for="pwd">New Password</label>
      <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" required>
      
    </div>
    <div class="form-group">
       <button  class="btn btn-secondary">Save</button>
    </div>
   
  </form>
</div>
</div>


<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
