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

var arrayFiles24 = [];
var arrayFiles12 = [];

//var multimediaList = [];
var multimedia24 = ""; //cambiar a array
var multimedia12 = ""; //cambiar a array

var multimedia24arr = []; //cambiar a array
var multimedia12arr = []; //cambiar a array

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
	var validateFiles12 = new FormData();

	//pharmacy images logic

	if(arrayFiles24.length > 0 && namePharmacy != ""){
		//var multimediaList = [];
		for(var i = 0; i < arrayFiles24.length; i++){
			validateFiles.append("pharmacyFiles", arrayFiles24[i]);
			validateFiles.append("pharmacyFilesRoute", namePharmacy);
			validateFiles.append("pharmacyFileUploadId", id);
			$.ajax({
				url:hiddenPath+"ajax/pharmacies_module_ajax.php",
				method: "POST",
				data: validateFiles,
				cache: false,
				contentType: false,
				processData: false,
				success:(response)=>{
					//multimedia24 = response.substr(3);
					//multimedia24arr.push({index : response.substr(3)});
					multimedia24arr.push(response.substr(3));
					//multimediaList.push(response.substr(3));
					multimedia24 = JSON.stringify(multimedia24arr);

					//if(multimedia != null){

						var validateData = new FormData();

						validateData.append("editPharmacy", true);
						validateData.append("idPharmacyToEdit", id);
						validateData.append("namePharmacyToEdit", namePharmacy);
						validateData.append("addressPharmacyToEdit", addressPharmacy);
						validateData.append("multimedia24", multimedia24);
						//validateData.append("multimedia12", multimedia12);

						$.ajax({
							url:hiddenPath+"ajax/pharmacies_module_ajax.php",
							method: "POST",
							data: validateData,
							cache: false,
							contentType: false,
							processData: false,
							success:(response)=>{

								console.log("Edit Pharmacy " + response);
								alert("Farmacia modificada!");
							/*setTimeout(function(){
								location.reload();
							}, 2000);*/

							}
						});

					//}

				  //console.log("Edit Pharmacy " + response);
				}
			});
		}
	}
	if(arrayFiles12.length > 0 && namePharmacy != ""){
		for(var i = 0; i < arrayFiles12.length; i++){
			validateFiles12.append("pharmacyFiles12", arrayFiles12[i]);
			validateFiles12.append("pharmacyFilesRoute", namePharmacy);

			$.ajax({
				url:hiddenPath+"ajax/pharmacies_module_ajax.php",
				method: "POST",
				data: validateFiles12,
				cache: false,
				contentType: false,
				processData: false,
				success:(response)=>{

					console.log("response files 12hs " + response);

					//multimedia12 = response.substr(3);
					multimedia12arr.push({i : response.substr(3)});
					//multimediaList.push(response.substr(3));
					multimedia12 = JSON.stringify(multimedia12arr);

					//if(multimedia != null){

						var validateData = new FormData();

						validateData.append("editPharmacy", true);
						validateData.append("idPharmacyToEdit", id);
						validateData.append("namePharmacyToEdit", namePharmacy);
						validateData.append("addressPharmacyToEdit", addressPharmacy);
						validateData.append("multimedia12", multimedia12);
						//validateData.append("multimedia24", multimedia24);

						$.ajax({
							url:hiddenPath+"ajax/pharmacies_module_ajax.php",
							method: "POST",
							data: validateData,
							cache: false,
							contentType: false,
							processData: false,
							success:(response)=>{

								console.log("Edit Pharmacy 12" + response);
								alert("Farmacia modificada!");
							  /*setTimeout(function(){
								  location.reload();
							  }, 2000);*/

							}
						});

					//}

				  //console.log("Edit Pharmacy " + response);
				}
			});
		}
	}

	if(namePharmacy != null){
		var validateData = new FormData();
		validateData.append("pharmacyEdited", true);
		validateData.append("pharmacyIdEdited", id);
		validateData.append("pharmacyNameEdited", namePharmacy);
		validateData.append("pharmacyAddressEdited", addressPharmacy);

		$.ajax({
			url:hiddenPath+"ajax/pharmacies_module_ajax.php",
			method: "POST",
			data: validateData,
			cache: false,
			contentType: false,
			processData: false,
			success:(response)=>{
				console.log("Pharmacy name edited " + response);
				alert("Farmacia modificada!");
				/*setTimeout(function(){
					location.reload();
				}, 2000);*/
			}
		});
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

$('.pharmacyFiles24').dropzone({
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png, .mp4, .mkv, .avi",
	maxFilesize: 2000,
	maxFiles: 10,
	init: function(){

		this.on("addedfile", function(file){

			arrayFiles24.push(file);

			console.log("arrayFiles24", arrayFiles24);

		})

		this.on("removedfile", function(file){

			var index = arrayFiles24.indexOf(file);

			arrayFiles24.splice(index, 1);

			console.log("arrayFiles24", arrayFiles24);

		})
	}
});

$('.pharmacyFiles12').dropzone({
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png, .mp4, .mkv, .avi",
	maxFilesize: 2000,
	maxFiles: 10,
	init: function(){

		this.on("addedfile", function(file){

			arrayFiles12.push(file);

			console.log("arrayFiles12", arrayFiles12);

		})

		this.on("removedfile", function(file){

			var index = arrayFiles12.indexOf(file);

			arrayFiles12.splice(index, 1);

			console.log("arrayFiles12", arrayFiles12);

		})
	}
});

function DeleteFilesPharmacy(){
	var confirmButton = "<button onclick='OnConfirmDeleteFilesPharmacy()' id='confirmDeleteFilesPharmacy' class='btn btn-success'><i class='fa fa-check'></i></butoon>";
	var cancelbutton = "<button onclick='RemoveChildrenButtonsFromFilesPharmacy()' id='cancelDeleteFilesPharmacy' class='btn btn-danger'><i class='fa fa-window-close' aria-hidden='true'></i></button>";

	if($('.confirmDeleteFilesPharmacy').children().length <= 0){
		$('.confirmDeleteFilesPharmacy').append(confirmButton);
		$('.confirmDeleteFilesPharmacy').append(cancelbutton);
	}
}

function RemoveChildrenButtonsFromFilesPharmacy(){
	$('.confirmDeleteFilesPharmacy').children("#confirmDeleteFilesPharmacy").remove();
	$('.confirmDeleteFilesPharmacy').children("#cancelDeleteFilesPharmacy").remove();
}

function OnConfirmDeleteFilesPharmacy(){
	var idPharmacy = $('#idPharmacyToEdit').text();
	var namePharmacy = $("#newNamePharmacy").val();

	var validateData = new FormData();

	validateData.append("ConfimrDeleteFilesPharmacy", true);
	validateData.append("idPharmacyToDeleteFiles", idPharmacy);
	validateData.append("namePharmacyToDeleteFiles", namePharmacy);

	$.ajax({
		url:hiddenPath+"ajax/pharmacies_module_ajax.php",
        method: "POST",
        data: validateData,
        cache: false,
        contentType: false,
        processData: false,
        success:(response)=>{
          console.log("OnConfirmDeleteFilesPharmacy " + response);
        }
	});
}

/*$('#cancelDeleteFilesPharmacy').on("click", function(){
	$('.confirmDeleteFilesPharmacy').children("#confirmDeleteFilesPharmacy").remove();
	$('.confirmDeleteFilesPharmacy').children("#cancelDeleteFilesPharmacy").remove();
});*/