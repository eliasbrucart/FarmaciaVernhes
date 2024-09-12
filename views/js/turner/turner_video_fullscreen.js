var videoPharmacyElement = document.getElementById('videoPharmacy');
function openFullscreen() {
    if (videoPharmacyElement.requestFullscreen) {
        videoPharmacyElement.requestFullscreen();
    } else if (videoPharmacyElement.webkitRequestFullscreen) {
        videoPharmacyElement.webkitRequestFullscreen();
    } else if (videoPharmacyElement.msRequestFullscreen) {
        videoPharmacyElement.msRequestFullscreen();
    }
}

function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}
/*document.addEventListener("DOMContentLoaded", function() {
    openFullscreen();
});*/