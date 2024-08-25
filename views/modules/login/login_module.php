<div class="login-page">
    <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <a href="#" class="h1"><b>Farmacia</b>Vernhes</a>
        </div>
        <div class="card-body">
        <p class="login-box-msg">Inicia sesion en el sistema</p>

        <form action="" method="post">
            <div class="input-group mb-3">
            <input type="email" id="logEmailUserInput" name="logEmailUserInput" class="form-control logEmailUserInput" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" id="logPasswordUserInput" name="logPasswordUserInput" class="form-control logPasswordUserInput" placeholder="Contrseña">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <?php 
                    $loginUser = new UsersController();
                    $loginUser->LoginUser();
                ?>
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </div>
            <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
</div>