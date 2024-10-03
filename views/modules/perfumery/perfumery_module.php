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

                    <!--<div class="input-group date col-xs-12" id="datepicker">
                        <input type="text" class="form-control">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>-->

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
                                                        <p id="originalPerfumeryName'.$value["id_perfumery"].'" class="text-uppercase">'.$value["name_perfumery"].'</p>
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
                                                            <input type="text" id="namePerfumeryEdited'.$value["id_perfumery"].'" name="namePerfumeryEdited'.$value["id_perfumery"].'" class="form-control namePerfumeryEdited'.$value["id_perfumery"].'" value="'.$value["name_perfumery"].'">
                                                        </div>
                                                        <form action="post" class="editPerfumeryFiles dropzone">

                                                            <div class="dz-message needsclick">
                                                                    
                                                                Arrastrar o dar click para subir imagenes.

                                                            </div>

                                                        </form>
                                                        <div class="form-floating mb-3">

                                                            <h3>Borrar archivos de la perfumeria!</h3>

                                                            <button class="btn btn-danger" onclick="DeleteFilesPerfumery('.$value["id_perfumery"].')">Borrar Archivos!</button>

                                                            <div class="confirmDeleteFilesPerfumery">

                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
        </div>
    </section>
</div>