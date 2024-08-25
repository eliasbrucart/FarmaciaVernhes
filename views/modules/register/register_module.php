<div class="register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Farmacia </b>Vernhes</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrar un nuevo usuario</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" id="regNameUserInput" name="regNameUserInput" class="form-control regNameUserInput" placeholder="Nombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id="regEmailUserInput" name="regEmailUserInput" class="form-control regEmailUserInput" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="regPasswordUserInput" name="regPasswordUserInput" class="form-control regPasswordUserInput" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!--<div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>-->
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <?php 
              $registerUser = new UsersController();
              $registerUser->RegisterUser();
            ?>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
</div>
