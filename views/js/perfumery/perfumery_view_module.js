$(function(){

    var perfumeryVideo = [];
    var perfumeryVideoObject = [];
    
    GetAllPerfumeries();

    //document.getElementById('videoPerfumery').addEventListener('ended',Activate12hsVideo,false);

    /*var videoPerfumery = document.getElementById('videoPerfumery');
        console.log("perfumeryVideo " + perfumeryVideo[0].file_perfumery);
        videoPerfumery.src = perfumeryVideo[0].file_perfumery;
        console.log("videoPerfumery " + videoPerfumery.src);*/

    /*setTimeout(function(){
        ActivateNextVideo();
    },1000);*/

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
                console.log("parseResponse " + parseResponse[0].file_perfumery);
                console.log("parseResponse " + parseResponse[1].file_perfumery);
                
                var videoPerfumery = document.getElementById('videoPerfumery');
                //perfumeryVideoObject[0] = JSON.parse(parseResponse[2].file_perfumery);
                //console.log(perfumeryVideoObject);
                //videoPerfumery.src = videoObj[0];

                //videoPerfumery.src = perfumeryVideoObject[0];

                /*for(var i = 0; i < parseResponse.length; i++){
                    perfumeryVideo.push(parseResponse);
                    //perfumeryVideoObject.push(JSON.parse(perfumeryVideo[i]));
                }
                for(var j = 0; j < perfumeryVideo.length; j++){
                    console.log("perfumeryVideoObject " + perfumeryVideo[j].id_perfumery);
                }*/
            }
        });
    }

    /*function ActivateNextVideo(){
        var videoPerfumery = document.getElementById('videoPerfumery');
        console.log("perfumeryVideo " + perfumeryVideo[0].file_perfumery);
        videoPerfumery.src = perfumeryVideo[0];
        console.log("videoPerfumery " + videoPerfumery.src);
    }*/

});