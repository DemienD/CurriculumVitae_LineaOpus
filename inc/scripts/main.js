$(document).ready(function(){

  window.onresize = function(event) {
    if(event.currentTarget.outerWidth >= 1080){
        console.info("showing");
        $("#notShow").show();
    }else{
        console.info("hiding");
        $("#notShow").hide();
    }

}



});
