function active(device){
    $('.item').hide();
    $('#menu').hide();
    $('#'+device).show();
}
$(".header").click(function(){
    $('#menu').show();
    $('.item').hide();
})

function updateColor(did,device){
    var color = $("#"+device).spectrum("get").toRgb();
    //alert(color.r);
    var data = $("#"+device).spectrum("get").toRgb();
    var devdata = {
        "did":did,
    };
    var pushdata = $.extend({},devdata,data);
    console.log(pushdata);

    $.ajax(
        {
            "url": "/welcome/putDeviceColor",
            "type": "POST",
            "data": pushdata,
            "dataType": "json",
            "crossDomain": true,
            success: function (res) {
                //res = JSON.parse(res);
                //console.log(res.html);

            },
            error: function (res) {
                console.error("ERROR!");
                console.log(res);
            }
        });
}
function fanon(){
    $.ajax(
        {
            "url": "http://10.0.0.156/T",
            "type": "GET",
            "dataType": "HTML",
            "crossDomain": true,
            success: function (res) {
                //res = JSON.parse(res);
                //console.log(res.html);

            },
            error: function (res) {
                console.error("ERROR!");
                console.log(res);
            }
        });
}
function setAnimation(did,ani){
    var pushdata = {
        "did":did,
        "act":ani
    };

    $.ajax(
        {
            "url": "/welcome/putDeviceColor",
            "type": "POST",
            "data": pushdata,
            "dataType": "json",
            "crossDomain": true,
            success: function (res) {
                //res = JSON.parse(res);
                //console.log(res.html);

            },
            error: function (res) {
                console.error("ERROR!");
                console.log(res);
            }
        });
}
function cylon(device){
    $.get( "/homenet/index.php?/welcome/"+device+"write/cylon/0/0/0", function( data ) {
        $( ".result" ).html( data );

    });
}
function horror(device){
    $.get( "/homenet/index.php?/welcome/"+device+"write/horror/0/0/0", function( data ) {
        $( ".result" ).html( data );

    });
}
function disco(device){
    $.get( "/homenet/index.php?/welcome/"+device+"write/disco/0/0/0", function( data ) {
        $( ".result" ).html( data );

    });
}

$("#picker").spectrum({
    move: function(tinycolor) { },
    show: function(tinycolor) { },
    hide: function(tinycolor) { },
    beforeShow: function(tinycolor) { },
});



function speedupdate(){
    $.get( "/homenet/index.php?/welcome/oillampwrite/speed/"+$('#speed').val()+"/0/0/", function( data ) {
        $( ".result" ).html( data );

    });
}

function garage_update(picker) {
    $.get( "/homenet/index.php?/welcome/garagewrite/color/"+Math.round(picker.rgb[0])+"/"+Math.round(picker.rgb[1])+"/"+Math.round(picker.rgb[2]), function( data ) {
        $( ".result" ).html( data );

    });
}
function oillamp_update(picker) {
    $.get( "/homenet/index.php?/welcome/oillampwrite/color/"+Math.round(picker.rgb[0])+"/"+Math.round(picker.rgb[1])+"/"+Math.round(picker.rgb[2]), function( data ) {
        $( ".result" ).html( data );

    });
}
function oillamp2_update(picker) {
    $.get( "/homenet/index.php?/welcome/oillampwrite/color2/"+Math.round(picker.rgb[0])+"/"+Math.round(picker.rgb[1])+"/"+Math.round(picker.rgb[2]), function( data ) {
        $( ".result" ).html( data );

    });
}
function spotlight(){
    $.get( "/homenet/index.php?/welcome/oillampwrite/spotlight/0/0/0", function( data ) {
        $( ".result" ).html( data );

    });
}
function dance(){
    $.get( "/homenet/index.php?/welcome/oillampwrite/dance/0/0/0", function( data ) {
        $( ".result" ).html( data );

    });
}
