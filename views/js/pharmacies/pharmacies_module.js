$('.pharmaciesTable').DataTable({

    "ajax":hiddenPath+"ajax/pharmacies_module_ajax.php",
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

function ShowPharmacyDataOnEdit(id, name, address){
	$('#idPharmacyToEdit').text(id);
	$('#newNamePharmacy').val(name);
	$('#newAddressPharmacy').val(address);
}

function EditPharmacy(){
	var id = $('#idCustomerToEdit').text();
	var namePharmacy = $('#newNamePharmacy').val();
	var addressPharmacy = $('#newAddressPharmacy').val();

	var validateData = new FormData();

	validateData.append("editPharmacy", true);
	validateData.append("idPharmacyToEdit", id);
	validateData.append("namePharmacyToEdit", namePharmacy);
	validateData.append("addressPharmacyToEdit", addressPharmacy);

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
        }
	});

}