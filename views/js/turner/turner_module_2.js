$(function(){

    var pharmacyVideo = [];
    var videoIndex = 0;
    var flag = true;
    var updateOneTime = true;
    
    var videoPharmacy = document.getElementById('videoPharmacy').addEventListener('ended',ActivateNextVideo,false);

    videoPharmacy = document.getElementById('videoPharmacy').addEventListener('error',GetTodayPharmacies,false);
    
    var date = new Date();
    
    const actualDateToDBFormat = date.toLocaleDateString("en-US", { // you can use undefined as first argument
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
    });
    
    console.log("actualDateToDBFormat " + actualDateToDBFormat);

    GetTodayPharmacies(actualDateToDBFormat);

    function GetAllPharmacies(id, typePharmachy){
        var validateData = new FormData();
        validateData.append("getTodayPharmacyFileRoutes" , true);
        validateData.append("idTodayPharmacy", id);
        $.ajax({
            url:hiddenPath+"ajax/turner_module_ajax.php",
            method: "POST",
            data: validateData,
            cache: false,
            contentType: false,
            processData: false,
            success: (response)=>{
                //console.log(response);
                var parseResponse = JSON.parse(response);

                var arrAux = JSON.parse(parseResponse[0]);
                
                console.log("Get all pharmacies " + arrAux[0]);

                for(var i = 0; i < arrAux.length; i++){
                    pharmacyVideo.push(arrAux[i]);
                }

                PlayFirstVideo();
            }
        });
    }

    function GetTodayPharmacies(actualDate){
        var validateData = new FormData();
        validateData.append("getTodayPharmacies", true);
        validateData.append("actualDateToDBFormat", actualDate);

        $.ajax({
            url:hiddenPath+"ajax/turner_module_ajax.php",
            method: "POST",
            data: validateData,
            cache: false,
            contentType: false,
            processData: false,
            success:(response)=>{
                var parseJSON = JSON.parse(response);
                for(var i = 0; i < parseJSON.length; i++){
                    if(flag){
                        GetAllPharmacies(parseJSON[i].id_pharmacy, parseJSON[i].fullDay);
                        flag = false;
                    }else if(UpdateVideo24hs()){
                        if(updateOneTime){
                            GetAllPharmacies(parseJSON[i].id_pharmacy, parseJSON[i].fullDay);
                            console.log("Entro por udpate one time!");
                            updateOneTime = false;
                        }
                        //flag = true;
                    }else{
                        console.log("No esta dentro de las horas establecidas! No actualizamos el video!");
                    }
                }
                //console.log(parseJSON);
                //GetAllPharmacies(parseJSON[i].id_pharmacy, parseJSON[i]);
                /*if(parseJSON.length > 1){
                    //ActivateBothVideos();
                    for(var i = 0; i < parseJSON.length; i++){
                        GetPharmacyFileRoutes(parseJSON[i].id_pharmacy, parseJSON[i].fullday_pharmacy);
                    }
                }else{
                    if(parseJSON[0].fullDay == 1){
                        GetPharmacyFileRoutes(parseJSON[0].id_pharmacy, parseJSON[0].fullDay);
                    }else{
                        GetPharmacyFileRoutes(parseJSON[0].id_pharmacy, parseJSON[0].fullDay);
                    }
                }*/
            }
        });
    }

    function PlayFirstVideo(){
        var videoPharmacy = document.getElementById('videoPharmacy');
        videoPharmacy.src = pharmacyVideo[0];
        $('.videoPharmacy').trigger('play');
    }

    function ActivateNextVideo(){
        //var initialFile = perfumeryVideo[0];
        //console.log("initialFile " + initialFile);

        //videoIndex = perfumeryVideo.indexOf(initialFile);

        /*var videoPerfumery = document.getElementById('videoPerfumery');
        if(videoPerfumery.src == null || videoPerfumery.src == ""){
            GetAllPerfumeries();
        }*/

        GetTodayPharmacies(actualDateToDBFormat);

        videoIndex++;
        if(videoIndex < pharmacyVideo.length){
            var videoPerfumery = document.getElementById('videoPharmacy');

            videoPerfumery.src = pharmacyVideo[videoIndex];

            console.log("reproduciendo video numero " + videoIndex);
        }else{
            videoIndex = 0;
            //GetAllPharmacies();
            PlayFirstVideo();
        }
        //console.log("video Index " + videoIndex);
    }

    function CreateDateTime(time) {
        var splitted = time.split(':');
        if (splitted.length != 2) return undefined;
    
        var date = new Date();
        date.setHours(parseInt(splitted[0], 10));
        date.setMinutes(parseInt(splitted[1], 10));
        date.setSeconds(0);
        return date;
    }

    function UpdateVideo24hs(){
        var startDate = CreateDateTime("08:00");
        var endDate = CreateDateTime("08:20");
        var now = new Date();
        if(startDate <= now && now <= endDate){
            console.log("Esta entre la hora que corresponde!");
            return true;
        }else{
            updateOneTime = true;
            return false;
        }
    }
});