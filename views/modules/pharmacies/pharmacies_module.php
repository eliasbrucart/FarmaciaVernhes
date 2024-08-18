<div class="content-wrapper pharmaciesModuleBox">
<section class="content">
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

                            <h3>Archivos para turnero 24hs</h3>

                            <form action="post" class="pharmacyFiles24 dropzone">

                                <div class="dz-message needsclick">
                                
                                    Arrastrar o dar click para subir imagenes.

                                </div>

                            </form>

                        <!-- input para subir imagenes, gifs, etc con plugin para ello -->

                        </div>

                        <div class="form-floating mb-3">

                            <h3>Archivos para turnero 12hs</h3>

                            <form action="post" class="pharmacyFiles12 dropzone">

                                <div class="dz-message needsclick">
                                
                                    Arrastrar o dar click para subir imagenes.

                                </div>

                            </form>

                        <!-- input para subir imagenes, gifs, etc con plugin para ello -->

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