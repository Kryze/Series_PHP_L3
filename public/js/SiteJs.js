/**
 * Created by Corentin on 28/12/2016.
 */

$(document).ready(function() {
    alert('lol');
    var int = 0;
    for(int;i<2;i++) {
        alert("#afficher" + int);
        $("#afficher" + int).click(function () {
            $("#invisible"+int).fadeToggle(1500);
        });
    }
});
