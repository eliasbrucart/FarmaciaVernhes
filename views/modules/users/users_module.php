<div class="content-wrapper usersModuleBox">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Registrar un usuario</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="userAddBox col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
                        <p>Estado del Usuario</p>
                        <div class="input-group mb-3">
                            <select class="form-select isUserActivated" name="isUserActivated" id="isUserActivated">
                                <option selected>Abrir para seleccionar estado</option>
                                <option value="1">Activo</option>
                                <option value="0">No Activo</option>
                            </select>
                        </div>
                        <?php 
                            $registerUser = new UsersController();
                            $registerUser->RegisterUser();
                        ?>
                        <button type="submit" class="btn btn-success m-2" onclick="">Agregar Usuario</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usuarios registrados</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <!--<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>-->
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped projects usersTable">
                        <thead>
                            <tr>
                                <th style="width: 1%" scope="col">
                                    #
                                </th>
                                <th style="width: 20%" scope="col">
                                    Nombre
                                </th>
                                <th style="width: 30%" scope="col">
                                    Email
                                </th>
                                <th style="width: 20%" scope="col">
                                    Activo
                                </th>
                                <th style="width: 18%" class="text-center" scope="col">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="editUserModal" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header" style="background:#c9c9c9; color:black">

                <h4 class="modal-title">Editar Usuario</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body" style="background:##c9c9c9;">

                <div class="box-body">

                    <div class="form-group">

                        <p class="idUserToEdit" name="idUser">Identificador: <span id="idUserToEdit"></span></p>

                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" id="newNameUser" name="newNameUser" placeholder="Nombre"
                            value="">

                            <!--<label for="newNamePharmacy">Nombre</label>-->

                        </div>

                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" id="newEmailUser" name="newEmailUser" placeholder="Email"
                            value="">

                            <!--<label for="newAddressPharmacy">Direccion</label>-->

                        </div>

                        <div class="form-floating mb-3">

                            <input type="password" class="form-control" id="newPasswordUser" name="newPasswordUser" placeholder="Contraseña"
                            value="">

                            <!--<label for="newAddressPharmacy">Direccion</label>-->

                        </div>

                        <div class="form-floating mb-3">

                            <select class="form-select activateUser" name="activateUser" id="activateUser">
                                <option selected>Abrir para seleccionar estado</option>
                                <option value="1">Activo</option>
                                <option value="0">No Activo</option>
                            </select>

                        </div>

                        <div class="form-floating mb-3">

                            <p>Super Usuario</p>

                            <input class="isSuperuser" id="isSuperuser" name="isSuperuser" type="checkbox" value="1">

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer" style="background:#c9c9c9;">

                <button type="button" class="btn btn-success m-2" id="saveEditedUser" onclick="EditUser()">Guardar</button>

            </div>

        </div>
        
    </div>

</div>