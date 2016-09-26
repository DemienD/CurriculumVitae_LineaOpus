// function for resizing(logo/title)
function fixHeader() {
  if(window.outerWidth >= 1080){
    console.info("showing");
    $("#notShow").show();
  } else {
    console.info("hiding");
    $("#notShow").hide();
  }
}

$(document).ready(function(){
  fixHeader();

  window.onresize = function() {
    fixHeader();
  }
});
