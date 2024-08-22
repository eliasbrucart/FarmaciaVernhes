var arrayPerfumeryFiles = [];
var editPerfumeryFiles = [];

var multimediaList = [];

var multimedia = "";

function UploadPerfumery(){
    var perfumeryName = $('#namePerfumery').val();
	console.log("perfumery name " + perfumeryName);
    var orderPerfumery = 0;

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
					multimediaList.push(response.substr(3));

					multimedia = JSON.stringify(Object.assign({}, multimediaList));

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
	
				$.ajax({
					url:hiddenPath+"ajax/perfumery_module_ajax.php",
					method: "POST",
					data: validateData,
					cache: false,
					contentType: false,
					processData: false,
					success:(response)=>{
	
					  console.log("Upload Perfumery " + response);

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

var multimediaListEdited = [];
var multimediaEdited = "";

function EditPerfumery(id){
	var originalPerfumeryName = $('#originalPerfumeryName').text();
	var perfumeryNameEdited = $('#namePerfumeryEdited').val();

	var perfumeryFilesEdited = new FormData();

	if(editPerfumeryFiles.length > 0 && perfumeryNameEdited != null){
		for(var i = 0; i < editPerfumeryFiles.length; i++){
			perfumeryFilesEdited.append("perfumeryNameEdited", perfumeryNameEdited);
			perfumeryFilesEdited.append("originalPerfumeryName", originalPerfumeryName);
			perfumeryFilesEdited.append("perfumeryFilesEdited", editPerfumeryFiles[i]);

			$.ajax({
                url:hiddenPath+"ajax/perfumery_module_ajax.php",
				method: "POST",
				data: perfumeryFilesEdited,
				cache: false,
				contentType: false,
				processData: false,
                success:(response)=>{

					multimediaListEdited.push(response.substr(3));

					multimediaEdited = JSON.stringify(Object.assign({}, multimediaListEdited));

					console.log("EditPerfumery " + multimediaEdited);

                }
            });
		}

		setTimeout(function(){
			var validateData = new FormData();

			validateData.append("perfumeryIdEdited", id);
			validateData.append("perfumeryNameEdited", perfumeryNameEdited);
			validateData.append("perfumeryFileRoutesEdited", multimediaEdited);
			validateData.append("perfumeryOrderEdited", 0);
	
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
		//Solo enviar id y nombre xdd
		var validateData = new FormData();
		validateData.append("perfumeryIdEdited", id);
		validateData.append("perfumeryNameEdited", perfumeryNameEdited);

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
				//location.reload();

			}
		});
	}
}

function DeletePerfumery(id){

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