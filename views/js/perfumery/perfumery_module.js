var arrayPerfumeryFiles = [];

function UploadPerfumery(){
    var namePerfumery = $('#namePerfumery').val();
    var orderPerfumery = 0;
    var validateData = new FormData();

    validateData.append("uploadPerfumery", true);

    if(arrayPerfumeryFiles > 0 && namePerfumery != ""){
        for(var i = 0; i < arrayPerfumeryFiles.length; i++){
            validateData.append("namePerfumery", namePerfumery);
            validateData.append("perfumeryFiiles", arrayPerfumeryFiles[i]);

            $.ajax({
                url:hiddenPath+"ajax/pharmacies_module_ajax.php",
				method: "POST",
				data: validateFiles,
				cache: false,
				contentType: false,
				processData: false,
                success:(response)=>{

                }
            });
        }
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

			console.log("arrayFiles12", arrayPerfumeryFiles);

		})

		this.on("removedfile", function(file){

			var index = arrayPerfumeryFiles.indexOf(file);
            
			arrayPerfumeryFiles.splice(index, 1);

			console.log("arrayFiles12", arrayPerfumeryFiles);

		})
	}
});