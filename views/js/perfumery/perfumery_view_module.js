$(function(){

    var perfumeryVideo = [];
    var videoIndex = 0;
    
    var videoPerfumery = document.getElementById('videoPerfumery').addEventListener('ended',ActivateNextVideo,false);

    videoPerfumery = document.getElementById('videoPerfumery').addEventListener('error',GetPerfumeryTurner,false);
    
    var date = new Date();
    
    const actualDateToDBFormat = date.toLocaleDateString("en-US", { // you can use undefined as first argument
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
    });
    
    console.log("actualDateToDBFormat " + actualDateToDBFormat);
    
    GetPerfumeryTurner();

    setInterval(function(){
        if(perfumeryVideo.length === 0){
            GetPerfumeryTurner();
        }else{
            return;
        }
        console.log("Chequeando que halla videos en perfumeria");
    }, 60000);

    function GetPerfumeryTurner(){
        validateData = new FormData();
        validateData.append("getPerfumeryTurner", true);
        validateData.append("actualDateToDBFormat", actualDateToDBFormat);

        $.ajax({
            url:hiddenPath+"ajax/perfumery_module_ajax.php",
            method: "POST",
            data: validateData,
            cache: false,
            contentType: false,
            processData: false,
            success: (response)=>{
                console.log(response);
                var parseResponse = JSON.parse(response);
                console.log("GetPerfumeryTurner parseResponse " + parseResponse.length);

                for(var i = 0; i < parseResponse.length; i++){
                    var filesSelectedIndex = JSON.parse(parseResponse[i].fileSelected);
                    console.log("filesSelectedIndex " + filesSelectedIndex);
                    GetTodayPerfumeries(parseResponse[i].idPerfumery_turner_perfumery, filesSelectedIndex);
                }
            }
        });
    }

    function GetTodayPerfumeries(id, fileIndex){
        var validateData = new FormData();
        validateData.append("getTodayPerfumeries", true);
        validateData.append("idTodayPerfumery", id);

        $.ajax({
            url:hiddenPath+"ajax/perfumery_module_ajax.php",
            method: "POST",
            data: validateData,
            cache: false,
            contentType: false,
            processData: false,
            success: (response)=>{
                console.log("GetTodayPerfumeries response" + response);
                var parseResponse = JSON.parse(response);
                //console.log("GetTodayPerfumeries parseResponse " + parseResponse.length);
                //console.log("GetTodayPerfumeries parseResponse stringify " + JSON.stringify(parseResponse));

                var arrAux = JSON.parse(parseResponse[0]);

                console.log("Get all perfumeries " + arrAux[0]);

                for(var i = 0; i < arrAux.length; i++){
                    for(var j = 0; j < fileIndex.length; j++){
                        if(i == fileIndex[j]){
                            console.log("selected file " + arrAux[i]);
                            perfumeryVideo.push(arrAux[i]);
                        }
                    }
                }

                PlayFirstVideo();
            }
        });
    }

    function GetAllPerfumeries(){
        var validateData = new FormData();
        validateData.append("getAllPerfumeriesInJSON", true);

        $.ajax({
            url:hiddenPath+"ajax/perfumery_module_ajax.php",
            method: "POST",
            data: validateData,
            cache: false,
            contentType: false,
            processData: false,
            success: (response)=>{
                console.log(response);
                var parseResponse = JSON.parse(response);
                console.log("parseResponse " + parseResponse.length);
                //console.log("parseResponse " + parseResponse[0].file_perfumery);
                //console.log("parseResponse " + parseResponse[1].file_perfumery);
                //console.log("parseResponse " + parseResponse[2].file_perfumery);
                
                //var videoPerfumery = document.getElementById('videoPerfumery');
                
                for(var i = 0; i < parseResponse.length; i++){
                    if(parseResponse[i].date_perfumery == actualDateToDBFormat){
                        perfumeryVideo[i] = parseResponse[i].file_perfumery;
                    }
                }

                PlayFirstVideo();
            }
        });
    }

    function PlayFirstVideo(){
        var videoPerfumery = document.getElementById('videoPerfumery');
        videoPerfumery.src = perfumeryVideo[0];
        $('.videoPerfumery').trigger('play');
    }

    function ActivateNextVideo(){
        //var initialFile = perfumeryVideo[0];
        //console.log("initialFile " + initialFile);

        //videoIndex = perfumeryVideo.indexOf(initialFile);

        /*var videoPerfumery = document.getElementById('videoPerfumery');
        if(videoPerfumery.src == null || videoPerfumery.src == ""){
            GetAllPerfumeries();
        }*/

        videoIndex++;
        if(videoIndex < perfumeryVideo.length){
            var videoPerfumery = document.getElementById('videoPerfumery');

            videoPerfumery.src = perfumeryVideo[videoIndex];

            console.log("reproduciendo video numero " + videoIndex);
        }else{
            videoIndex = 0;
            GetPerfumeryTurner();
            //PlayFirstVideo();
        }
        //console.log("video Index " + videoIndex);
    }
});