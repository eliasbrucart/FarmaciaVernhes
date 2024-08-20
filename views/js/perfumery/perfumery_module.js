var arrayPerfumeryFiles = [];

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
	
					}
				});
	
			}
		}, 2000);
    }
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