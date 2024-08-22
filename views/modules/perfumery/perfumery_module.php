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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Perfumerias disponibles</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="perfumeryList">
                        <ul class="todo-list">
                            <?php 
                                $getAllPerfumeries = PerfumeryController::GetAllPerfumeries();

                                foreach($getAllPerfumeries as $key => $value){
                                    echo'<li class="itemSlide" id="'.$value["id_perfumery"].'">
                                    <div class="box-group" id="accordion">
                                        <div class="panel box box-info">
                                            <div class="box-header with-border clearfix">
                                                <span class="handle float-left">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </span>
                                                <h4 class="box-title float-left">
                                                    <a href="#collapse'.$value["id_perfumery"].'" data-toggle="collapse" data-parent="#accordion">
                                                        <p id="originalPerfumeryName" class="text-uppercase">'.$value["name_perfumery"].'</p>
                                                    </a>
                                                </h4>
                                                <div class="btn-group float-right">
                                                    <button class="btn btn-primary savePerfumery" id="'.$value["id_perfumery"].'")">Guardar<i class="fa-regular fa-floppy-disk"></i></button>
                                                    <button class="btn btn-danger deletePerfumery" id="'.$value["id_perfumery"].'" onclick="DeletePerfumery('.$value["id_perfumery"].')"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapse'.$value["id_perfumery"].'" class="panel-collapse collapse collapseSlide">
                                            <div class="row">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <input type="text" id="namePerfumeryEdited" name="namePerfumeryEdited" class="form-control namePerfumeryEdited" value="'.$value["name_perfumery"].'">
                                                        </div>
                                                        <form action="post" class="editPerfumeryFiles dropzone">

                                                            <div class="dz-message needsclick">
                                                                    
                                                                Arrastrar o dar click para subir imagenes.

                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>';
                                }
                            ?>
                            <!--<li class="itemSlide" id="">
                                <div class="box-group" id="accordion">
                                    <div class="panel box box-info">
                                        <div class="box-header with-border clearfix">
                                            <span class="handle float-left">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <h4 class="box-title float-left">
                                                <a href="#collapse1" data-toggle="collapse" data-parent="#accordion">
                                                    <p class="text-uppercase">XD</p>
                                                </a>
                                            </h4>
                                            <div class="btn-group float-right">
                                                <button class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i></button>
                                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse collapseSlide">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="text" id="editNamePerfumery" name="editNamePerfumery" class="form-control" placeholder="Nombre perfumeria">
                                                    </div>
                                                    <form action="post" class="editPerfumeryFiles dropzone">

                                                        <div class="dz-message needsclick">
                                                                
                                                            Arrastrar o dar click para subir imagenes.

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="table-responsive">
            <table class="table table-striped projects">
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
            </div>-->
    </section>
</div>