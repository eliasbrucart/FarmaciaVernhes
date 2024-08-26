$('.usersTable').DataTable({

    "ajax":hiddenPath+"ajax/users_table_ajax.php",
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

function DeleteUser(id){
	var validateData = new FormData();
	validateData.append("deleteUser", true);
	validateData.append("idUserDeleted", id);

	$.ajax({
		url:hiddenPath+"ajax/users_module_ajax.php",
        method: "POST",
        data: validateData,
        cache: false,
        contentType: false,
        processData: false,
        success:(response)=>{
          console.log("Delete User " + response);
		  setTimeout(function(){
			location.reload();
		  }, 1000);
        }
	});
}

function EditUser(){
	var idUserToEdit = $('#idUserToEdit').text();
	var newNameUser = $('#newNameUser').val();
	var newEmailUser = $('#newEmailUser').val();
	var newPasswordUser = $('#newPasswordUser').val();
	var activateUser = $('#activateUser').val();
	var isSuperuser = $('#isSuperuser').val();

	var validateData = new FormData();
	validateData.append("editUser", true);
	validateData.append("idUserToEdit", idUserToEdit);
	validateData.append("newNameUser", newNameUser);
	validateData.append("newEmailUser", newEmailUser);
	validateData.append("newPasswordUser", newPasswordUser);
	validateData.append("activateUser", activateUser);
	validateData.append("isSuperuser", isSuperuser);

	$.ajax({
		url:hiddenPath+"ajax/users_module_ajax.php",
        method: "POST",
        data: validateData,
        cache: false,
        contentType: false,
        processData: false,
        success:(response)=>{
          console.log("Edit User " + response);
		  setTimeout(function(){
			location.reload();
		  }, 1000);
        }
	});
}

function ShowUserDataOnEdit(id, name, email){
	$('#idUserToEdit').text(id);
	$('#newNameUser').val(name);
	$('#newEmailUser').val(email);
}