

<!-- Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signinModalLabel">signin to iForum Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="/FORUM/partial/_handlesignin.php" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="signinemail" name="signinemail" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="signinpassword" name="signinpassword">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">confirm Password</label>
                    <input type="password" class="form-control" id="signincpassword" name="signincpassword">
                </div>
                <button type="submit" class="btn btn-primary">Signup</button>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>