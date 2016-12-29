/**
 * Created by Corentin on 28/12/2016.
 */

$(document).ready(function() {
    for(var int=0;int<100;int++) {
        if($("#afficher"+int).length > 0) {
            $("#afficher" + int).click(function () {
                for(var i=0;i<int;i++) {
                    $("#invisible" + i).removeClass("invisible").addClass("invisible");
                }
                var numero = $(this).attr('num');
                $("#invisible" + numero).removeClass("invisible");
            });
        }
        else {
            break;
        }
    }
});
