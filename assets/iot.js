function active(device){
    $('.item').hide();
    $('#menu').hide();
    $('#'+device).show();
}
$(".header").click(function(){
    $('#menu').show();
    $('.item').hide();
})

function update(did,device,action){
    var color = $("#"+did).spectrum("get").toRgb();
    //alert(color.r);
    $.get( "/homenet/index.php?/welcome/"+device+"write/"+action+"/"+color.r+"/"+color.g+"/"+color.b, function( data ) {
        $( ".result" ).html( data );

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
