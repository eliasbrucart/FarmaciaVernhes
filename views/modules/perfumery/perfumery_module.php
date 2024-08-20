<div class="content-wrapper perfumeryModuleBox">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Administrar datos de Perfumeria</h3>
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
                <div class="perfumeryAddBox col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <!--<label for="namePerfumery">Nombre Perfumeria</label>-->
                        <input type="text" class="form-control namePerfumery" id="namePerfumery" name="namePerfumery" placeholder="Nombre Perfumeria">
                    </div>
                    <form action="post" class="perfumeryFiles dropzone">

                        <div class="dz-message needsclick">
                                
                            Arrastrar o dar click para subir imagenes.

                        </div>

                    </form>

                </div>

                <button type="button" class="btn btn-success m-2" onclick="UploadPerfumery()">Agregar</button>
            </div>
        </div>
    </section>
</div>