<div class="content-wrapper pharmaciesModuleBox">
<section class="content clearfix">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Farmacias</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <input id="new-event addPharmacy" name="addPharmacy" type="text" class="form-control addPharmacy" placeholder="Farmacia">
                    <input type="text addressPharmacy" name="addressPharmacy" class="form-control addressPharmacy" placeholder="Direccion">

                    <div class="input-group-append float-left">
                        <button type="button" class="btn btn-primary addPharmacyBtn" onclick="AddPharmacy()">Agregar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 float-right">
                <div class="form-group">
                    <button class="btn btn-success" onclick="openFullscreen()">Turnero Full Screen</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Administrar Farmacias</h3>
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
            <table class="table table-striped projects pharmaciesTable">
                <thead>
                    <tr>
                        <th style="width: 1%" scope="col">
                            #
                        </th>
                        <th style="width: 20%" scope="col">
                            Farmacia
                        </th>
                        <th style="width: 30%" scope="col">
                            Direccion
                        </th>
                        <th style="width: 8%" class="text-center" scope="col">
                            Turnero
                        </th>
                        <th style="width: 20%" scope="col">
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

<div id="editPharmacyModal" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header" style="background:#c9c9c9; color:black">

                <h4 class="modal-title">Editar Farmacia</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body" style="background:##c9c9c9;">

                <div class="box-body">

                    <div class="form-group">

                        <p class="idPharmacyToEdit" name="idPharmacy">Identificador: <span id="idPharmacyToEdit"></span></p>

                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" id="newNamePharmacy" name="newNamePharmacy" placeholder="Nombre"
                            value="">

                            <!--<label for="newNamePharmacy">Nombre</label>-->

                        </div>

                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" id="newAddressPharmacy" name="newAddressPharmacy" placeholder="Direccion"
                            value="">

                            <!--<label for="newAddressPharmacy">Direccion</label>-->

                        </div>

                        <div class="form-floating mb-3">

                            <h3>Archivos de farmacia</h3>

                            <form action="post" class="pharmacyFiles24 dropzone">

                                <div class="dz-message needsclick">
                                
                                    Arrastrar o dar click para subir imagenes.

                                </div>

                            </form>

                        <!-- input para subir imagenes, gifs, etc con plugin para ello -->

                        </div>

                        <div class="form-floating mb-3">

                            <h3>Borrar archivos de la farmacia</h3>

                            <button class="btn btn-danger" onclick="DeleteFilesPharmacy()">Borrar Archivos!</button>

                            <div class="confirmDeleteFilesPharmacy">

                            </div>
                            
                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer" style="background:#c9c9c9;">

                <button type="button" class="btn btn-success m-2" id="saveEditedPharmacy" onclick="EditPharmacy()">Guardar</button>

            </div>

        </div>
        
    </div>

</div>

<div id="deletePharmacyModal" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header" style="background:#c9c9c9; color:black">

                <h4 class="modal-title">Eliminar Farmacia</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body" style="background:##c9c9c9;">

                <div class="box-body">

                    <div class="form-group">

                        <h3>Identificador: <span id="idPharmacyToDelete"></span></h3>

                        <p>Nombre: <span id="namePharmacyToDelete"></span></p>

                        <p>Direccion: <span id="addressPharmacyToDelete"></span></p>

                    </div>

                </div>

            </div>

            <div class="modal-footer" style="background:#c9c9c9;">

                <button type="button" class="btn btn-danger m-2" id="deletePharmacy" onclick="DeletePharmacy()">Eliminar</button>

            </div>

        </div>

    </div>


</div>

<div id="deleteFilePharmacyModal" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header" style="background:#c9c9c9; color:black">

                <h4 class="modal-title">Eliminar Archivos Farmacia</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body" style="background:##c9c9c9;">

                <div class="box-body">

                    <div class="form-group">

                        <h3>Identificador: <span id="idPharmacyToDelete"></span></h3>

                        <p>Nombre: <span id="namePharmacyToDelete"></span></p>

                        <p>Direccion: <span id="addressPharmacyToDelete"></span></p>

                    </div>

                </div>

            </div>

            <div class="modal-footer" style="background:#c9c9c9;">

                <button type="button" class="btn btn-danger m-2" id="deletePharmacy" onclick="DeletePharmacy()">Eliminar</button>

            </div>

        </div>

    </div>

</div>