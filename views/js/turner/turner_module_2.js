$(function(){

    var pharmacyVideo = [];
    var videoIndex = 0;
    var flag = true;
    var updateOneTime = true;
    
    var videoPharmacy = document.getElementById('videoPharmacy').addEventListener('ended',ActivateNextVideo,false);

    videoPharmacy = document.getElementById('videoPharmacy').addEventListener('error',GetTodayPharmaciesOneTime,false);
    
    var date = new Date();
    
    const actualDateToDBFormat = date.toLocaleDateString("en-US", { // you can use undefined as first argument
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
    });
    
    console.log("actualDateToDBFormat " + actualDateToDBFormat);

    GetTodayPharmaciesOneTime(actualDateToDBFormat);

    setInterval(function(){
        var dateUpd = new Date();
    
        const actualDateToDBFormatUpd = dateUpd.toLocaleDateString("en-US", { // you can use undefined as first argument
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
        });

        if(pharmacyVideo.length === 0){
            GetTodayPharmaciesOneTime(actualDateToDBFormatUpd);
        }else{
            return;
        }
        console.log("Chequeando que halla videos en farmacias!");
    }, 60000);

    function GetAllPharmacies(id, fileIndex){
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
                
                //console.log("Get all pharmacies " + arrAux[0]);

                for(var i = 0; i < arrAux.length; i++){
                    //var position = fileIndex.indexOf(i);
                    for(var j = 0; j < fileIndex.length; j++){
                        if(i == fileIndex[j]){
                            console.log("selected file " + arrAux[i]);
                            pharmacyVideo.push(arrAux[i]);
                        }
                    }
                }

                PlayFirstVideo();
            }
        });
    }

    function GetTodayPharmaciesOneTime(actualDate){
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
                //console.log("parseJSON " + JSON.stringify(parseJSON));
                //console.log("parse filesSelectedIndex " + JSON.stringify(parseJSON[i].fileSelected));

                console.log("GetTodayPharmaciesOneTime se ejecuto!");
                
                for(var i = 0; i < parseJSON.length; i++){
                    var filesSelectedIndex = JSON.parse(parseJSON[i].fileSelected);
                    console.log("filesSelectedIndex " + filesSelectedIndex);
                    GetAllPharmacies(parseJSON[i].id_pharmacy, filesSelectedIndex);
                }
            }
        });
    }

    function GetTodayPharmacies(actualDate){
        if(UpdateVideo24hs()){
            if(updateOneTime){
                pharmacyVideo = [];
                //(parseJSON[i].id_pharmacy, filesSelectedIndex);
                //console.log("Entro por udpate one time!");
                GetTodayPharmaciesOneTime(actualDate);
                console.log("Ejecutando GetTodayPharmaciesOneTime en TodayPharmacies para actualizar a las 8!");
                updateOneTime = false;
            }
        }else{
            console.log("No esta dentro de las horas establecidas! No actualizamos el video!");
        }

        /*var validateData = new FormData();
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
                //console.log("parseJSON " + JSON.stringify(parseJSON));
                //console.log("parse filesSelectedIndex " + JSON.stringify(parseJSON[i].fileSelected));

                if(UpdateVideo24hs()){
                    if(updateOneTime){
                        //(parseJSON[i].id_pharmacy, filesSelectedIndex);
                        //console.log("Entro por udpate one time!");
                        GetTodayPharmaciesOneTime(actualDate);
                        console.log("Ejecutando GetTodayPharmaciesOneTime!");
                        updateOneTime = false;
                    }
                }else{
                    console.log("No esta dentro de las horas establecidas! No actualizamos el video!");
                }
            }
        });*/
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

        var date = new Date();
    
        const actualDateToDBFormat = date.toLocaleDateString("en-US", { // you can use undefined as first argument
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
        });

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
        var startDate = CreateDateTime("07:50");
        var endDate = CreateDateTime("08:10");
        var now = new Date();
        if(startDate <= now && now <= endDate){
            console.log("Esta entre la hora que corresponde!");
            //updateOneTime = true;
            /*if(!updateOneTime){
                updateOneTime = false;
            }*/
            return true;
        }else{
            updateOneTime = true;
            return false;
        }
    }
});