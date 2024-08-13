$('.pharmaciesTable').DataTable({

    "ajax":hiddenPath+"ajax/pharmacies_table_ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
    "language":{

        "sProcessing":     "Procesa ndo...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
    }
});

var arrayFiles = [];

function ShowPharmacyDataOnEdit(id, name, address){
	$('#idPharmacyToEdit').text(id);
	$('#newNamePharmacy').val(name);
	$('#newAddressPharmacy').val(address);
}

function EditPharmacy(){
	var id = $('#idPharmacyToEdit').text();
	var namePharmacy = $('#newNamePharmacy').val();
	var addressPharmacy = $('#newAddressPharmacy').val();

	var validateFiles = new FormData();

	//pharmacy images logic

	if(arrayFiles.length > 0 && namePharmacy != ""){
		var multimediaList = [];
		for(var i = 0; i < arrayFiles.length; i++){
			validateFiles.append("pharmacyFiles", arrayFiles[i]);
			validateFiles.append("pharmacyFilesRoute", namePharmacy);

			$.ajax({
				url:hiddenPath+"ajax/pharmacies_module_ajax.php",
				method: "POST",
				data: validateFiles,
				cache: false,
				contentType: false,
				processData: false,
				success:(response)=>{

					//multimediaList.push({"file" : response.substr(3)});
					multimediaList.push(response.substr(3));
					multimedia = JSON.stringify(multimediaList);

					if(multimedia != null){

						var validateData = new FormData();

						validateData.append("editPharmacy", true);
						validateData.append("idPharmacyToEdit", id);
						validateData.append("namePharmacyToEdit", namePharmacy);
						validateData.append("addressPharmacyToEdit", addressPharmacy);
						validateData.append("fileRoutes", multimedia);

						$.ajax({
							url:hiddenPath+"ajax/pharmacies_module_ajax.php",
							method: "POST",
							data: validateData,
							cache: false,
							contentType: false,
							processData: false,
							success:(response)=>{

							  console.log("Edit Pharmacy " + response);

							}
						});

					}

				  //console.log("Edit Pharmacy " + response);
				}
			});
		}
	}
}

function ShowPharmacyDataOnDelete(id, name, address){
	$('#idPharmacyToDelete').text(id);
	$('#namePharmacyToDelete').text(name);
	$('#addressPharmacyToDelete').text(address);
}

function DeletePharmacy(){
	var id = $('#idPharmacyToDelete').text();

	var validateData = new FormData();
	validateData.append("deletePharmacy", true);
	validateData.append("idPharmacyToDelete", id);

	$.ajax({
		url:hiddenPath+"ajax/pharmacies_module_ajax.php",
        method: "POST",
        data: validateData,
        cache: false,
        contentType: false,
        processData: false,
        success:(response)=>{
          console.log("Delete Pharmacy " + response);
		  setTimeout(function(){
			location.reload();
		  }, 1000);
        }
	});
}

$('.pharmacyImages').dropzone({
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png, .mp4, .mkv, .avi",
	maxFilesize: 2000,
	maxFiles: 10,
	init: function(){

		this.on("addedfile", function(file){

			arrayFiles.push(file);

			console.log("arrayFiles", arrayFiles);

		})

		this.on("removedfile", function(file){

			var index = arrayFiles.indexOf(file);

			arrayFiles.splice(index, 1);

			console.log("arrayFiles", arrayFiles);

		})
	}
});