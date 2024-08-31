var arrayPerfumeryFiles = [];
var editPerfumeryFiles = [];

var multimediaList = [];

var multimedia = "";

function UploadPerfumery(){
    var perfumeryName = $('#namePerfumery').val();
	console.log("perfumery name " + perfumeryName);
    var orderPerfumery = 0;

	const formatter = new Intl.DateTimeFormat('en-US', { day: '2-digit', month: '2-digit', year: 'numeric' });

	var datePerfumery = $('#datepicker').children().val();

	const dateSelected = new Date(datePerfumery);
	const formattedDate = formatter.format(dateSelected);

	console.log("perfumery date formatted " + formattedDate);

    var validateFilesPerfumery = new FormData();

    if(arrayPerfumeryFiles.length > 0 && perfumeryName != ""){
        for(var i = 0; i < arrayPerfumeryFiles.length; i++){
            validateFilesPerfumery.append("perfumeryName", perfumeryName);
            validateFilesPerfumery.append("perfumeryFiles", arrayPerfumeryFiles[i]);

            $.ajax({
                url:hiddenPath+"ajax/perfumery_module_ajax.php",
				method: "POST",
				data: validateFilesPerfumery,
				cache: false,
				contentType: false,
				processData: false,
                success:(response)=>{
					//multimediaList.push(response.substr(3));

					//multimedia = JSON.stringify(Object.assign({}, multimediaList));
					multimedia = response.substr(3);
                }
            });
        }

		setTimeout(function(){
			if(multimedia != null){
				var validateData = new FormData();
				validateData.append("uploadPerfumery", true);
				validateData.append("uploadPerfumeryName", perfumeryName);
				validateData.append("uploadPerfumeryMultimedia", multimedia);
				validateData.append("uploadPerfumeryOrder", orderPerfumery);
				validateData.append("uploadPerfumeryDate", formattedDate);
	
				$.ajax({
					url:hiddenPath+"ajax/perfumery_module_ajax.php",
					method: "POST",
					data: validateData,
					cache: false,
					contentType: false,
					processData: false,
					success:(response)=>{
					  console.log("Upload Perfumery " + response);
					  if(response != "ok"){
						alert("Ya existe la perfumeria!");
					  }
					  setTimeout(function(){
						location.reload();
					  }, 2000);
					}
				});
	
			}
		}, 2000);
    }
}

$('.savePerfumery').click(function(){
	var idPerfumery = $(this).attr("id");
	EditPerfumery(idPerfumery);
});

function EditPerfumery(id){
	var originalPerfumeryName = $('#originalPerfumeryName'+id).text();
	var perfumeryNameEdited = $('#namePerfumeryEdited'+id).val();

	var multimediaListEdited = [];
	var multimediaEdited = "";

	const formatter = new Intl.DateTimeFormat('en-US', { day: '2-digit', month: '2-digit', year: 'numeric' });

	var perfumeryDateEdited = $('#perfumeryDateEdited'+id).children().val();

	const dateSelected = new Date(perfumeryDateEdited);
	const formattedDate = formatter.format(dateSelected);

	var perfumeryFilesEdited = new FormData();

	if(editPerfumeryFiles.length > 0 && perfumeryNameEdited != null){
		for(var i = 0; i < editPerfumeryFiles.length; i++){
			perfumeryFilesEdited.append("perfumeryNameEdited", perfumeryNameEdited);
			perfumeryFilesEdited.append("perfumeryIdToEdited", id);
			perfumeryFilesEdited.append("perfumeryFilesEdited", editPerfumeryFiles[i]);

			$.ajax({
                url:hiddenPath+"ajax/perfumery_module_ajax.php",
				method: "POST",
				data: perfumeryFilesEdited,
				cache: false,
				contentType: false,
				processData: false,
                success:(response)=>{

					//multimediaListEdited.push(response.substr(3));

					//multimediaEdited = JSON.stringify(Object.assign({}, multimediaListEdited));

					multimediaEdited = response.substr(3);

					console.log("EditPerfumery " + multimediaEdited);

                }
            });
		}

		setTimeout(function(){
			var validateData = new FormData();

			validateData.append("perfumeryIdEdited", id);
			validateData.append("perfumeryNameEdited", perfumeryNameEdited);
			//console.log("perfumeryNameEdited primer if " + perfumeryNameEdited);
			validateData.append("perfumeryFileRoutesEdited", multimediaEdited);
			validateData.append("perfumeryDateEdited", formattedDate);
			//console.log("multimediaEdited " + multimediaEdited);
			//validateData.append("perfumeryOrderEdited", 0);
	
			$.ajax({
				url:hiddenPath+"ajax/perfumery_module_ajax.php",
				method: "POST",
				data: validateData,
				cache: false,
				contentType: false,
				processData: false,
				success:(response)=>{
					console.log("Edited all perfumery attr" + response);
					setTimeout(function(){
						location.reload();
					}, 3000);
				}
			});
		}, 2000);
	}

	if(perfumeryNameEdited != null){
		var validateData = new FormData();
		validateData.append("editPerfumeryName", true);
		validateData.append("perfumeryIdEdited", id);
		validateData.append("perfumeryNameEdited", perfumeryNameEdited);

		console.log("perfumeryNameEdited segundo if" + perfumeryNameEdited);

		$.ajax({
			url:hiddenPath+"ajax/perfumery_module_ajax.php",
			method: "POST",
			data: validateData,
			cache: false,
			contentType: false,
			processData: false,
			success:(response)=>{
				console.log("Perfumery name edited " + response);
				setTimeout(function(){
					location.reload();
				}, 2000);
			}
		});
	}

	if(perfumeryDateEdited != null){
		var validateData = new FormData();
		validateData.append("editPerfumeryDate", true);
		validateData.append("perfumeryIdEdited", id);
		validateData.append("perfumeryDateEdited", formattedDate);

		console.log("perfumeryNameEdited segundo if" + perfumeryNameEdited);

		$.ajax({
			url:hiddenPath+"ajax/perfumery_module_ajax.php",
			method: "POST",
			data: validateData,
			cache: false,
			contentType: false,
			processData: false,
			success:(response)=>{
				console.log("Perfumery date edited " + response);
				setTimeout(function(){
					location.reload();
				}, 2000);
			}
		});
	}
}

$('.deletePerfumery').click(function(){
	var idPerfumery = $(this).attr("id");
	DeletePerfumery(idPerfumery);
});

function DeletePerfumery(id){
	//var originalPerfumeryNameDeleted = $('#originalPerfumeryName'+id).text();
	var validateData = new FormData();
	validateData.append("deletePerfumery", true);
	validateData.append("perfumeryIdDeleted", id);
	//validateData.append("originalPerfumeryNameDeleted", originalPerfumeryNameDeleted);

	$.ajax({
		url:hiddenPath+"ajax/perfumery_module_ajax.php",
		method: "POST",
		data: validateData,
		cache: false,
		contentType: false,
		processData: false,
		success:(response)=>{
			console.log("Delete perfumery " + response);
			setTimeout(function(){
				location.reload();
			}, 2000);
		}
	});
	
}

$('.perfumeryFiles').dropzone({
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png, .mp4, .mkv, .avi",
	maxFilesize: 2000,
	maxFiles: 10,
	init: function(){

		this.on("addedfile", function(file){

			arrayPerfumeryFiles.push(file);

			console.log("arrayPerfumeryFiles", arrayPerfumeryFiles);

			if(arrayPerfumeryFiles.length >= 2){
				arrayPerfumeryFiles = [];

				alert("No se pueden subir mas de 2 archivos!");

				setTimeout(function(){
					location.reload();
				}, 2000);
			}

		})

		this.on("removedfile", function(file){

			var index = arrayPerfumeryFiles.indexOf(file);
            
			arrayPerfumeryFiles.splice(index, 1);

			console.log("arrayPerfumeryFiles", arrayPerfumeryFiles);

		})
	}
});

$('.editPerfumeryFiles').dropzone({
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png, .mp4, .mkv, .avi",
	maxFilesize: 2000,
	maxFiles: 10,
	init: function(){

		this.on("addedfile", function(file){

			editPerfumeryFiles.push(file);

			console.log("editPerfumeryFiles", editPerfumeryFiles);

			if(editPerfumeryFiles.length >= 2){
				editPerfumeryFiles = [];

				alert("No se pueden subir mas de 2 archivos!");

				setTimeout(function(){
					location.reload();
				}, 2000);
			}

		})

		this.on("removedfile", function(file){

			var index = editPerfumeryFiles.indexOf(file);
            
			editPerfumeryFiles.splice(index, 1);

			console.log("editPerfumeryFiles", editPerfumeryFiles);

		})
	}
});

var itemSlide = $(".itemSlide");

$('.todo-list').sortable({
	placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999,
	stop: function(event){
		for(var i = 0; i < itemSlide.length; i++){
			var validateData = new FormData();

			validateData.append("changeOrderPerfumery", true);
			validateData.append("idPerfumery", event.target.children[i].id);
			validateData.append("orderPerfumery", (i+1)); //i+1 porque el for arranca en 0, es para que arranque a contar desde 1

			$.ajax({

				url:"ajax/perfumery_module_ajax.php",
				method: "POST",
				data: validateData,
				cache: false,
				contentType: false,
				processData: false,
				success: function(response){
				
					console.log(response);
							
				}

			})
		}
	}
});

$(function(){
	$('#datepicker').datepicker();
	//$('#perfumeryDateEdited').datepicker();
});

$(function(){
	var validateData = new FormData();

	validateData.append("getAllPerfumeriesInJSON", true);

	$.ajax({
		url:hiddenPath+"ajax/perfumery_module_ajax.php",
		method: "POST",
		data: validateData,
		cache: false,
		contentType: false,
		processData: false,
		success:(response)=>{
			console.log("Get all perfumeries " + response);
			var parseJSON = JSON.parse(response);
			for(var i = 0; i < parseJSON.length; i++){
				$('#perfumeryDateEdited'+parseJSON[i].id_perfumery).datepicker();
			}
		}
	});
});