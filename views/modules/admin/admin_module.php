<div class="content-wrapper adminModuleBox">
<!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Farmacias</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <!--<div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div>-->
                    <div class="checkbox">
                      <!--<label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>-->
                    </div>
                  </div>
                  <div id="external-events-perfumery">
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Perfumeria</h3>
                </div>
                <!--<div class="card-body clearfix">

                  <input id="new-event addPharmacy" name="addPharmacy" type="text" class="form-control addPharmacy" placeholder="Farmacia">
                  <input type="text addressPharmacy" name="addressPharmacy" class="form-control addressPharmacy" placeholder="Direccion">

                  <div class="input-group-append float-right">
                    <button type="button" class="btn btn-primary" onclick="AddPharmacy()">Agregar</button>
                  </div>

                </div>-->
                <div class="card-footer clearfix">
                  <!--<p class="violetSquareText"><i class="fas fa-square violetSquare"></i>Violeta: 24hs</p>
                  <p class="blueSquareText"><i class="fas fa-square blueSquare"></i>Azul: 12hs</p>-->
                  <div class="float-left">
                    <a class="saveAllCalendar" onclick="SaveAll()"><i class="fa fa-save"></i></a>
                  </div>
                  <div class="float-right">
                    <div id="calendarTrash" class="calendar-trash"><i class="fa fa-trash"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>