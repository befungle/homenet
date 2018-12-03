<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cre8ive HomeNet</title>
    <!--    Javascript-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="/assets/spectrum.js"></script>

    <!--    CSS -->
    <link rel="stylesheet" href="/assets/foundation-6.5.1/css/foundation.min.css">
    <link rel='stylesheet' href='/assets/spectrum.css'/>
    <link rel='stylesheet' href='/assets/home.css'/>


    <!--    iOS Settings-->
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

</head>
<body>
<div class="grid-x header">
    <div class="large-12 medium-12 small-12">
        <h1>HomeNet</h1>
        <h2>Control Panel</h2>
    </div>
</div>
<div class="grid-x item garagediv" id="garagediv">
    <div class="large-12 medium-12 small-12">
        <div class="grid-x">
            <div class="large-12 medium-12 small-12"><h1>Garage Door</h1></div>
            <div class="large-12 medium-12 small-12">
                <h2>Animations</h2>
                <button onclick="cylon('garage');">Cylon</button>
            </div>
        </div>
    </div>
    <div class="large-12 medium-12 small-12">
        <input type='text' id="garage"/>
    </div>
</div>

<div class="grid-x item" id="dispcase1div">
    <div class="large-12 medium-12 small-12">
        <h1>Display Case 1</h1>
    </div>
    <div class="large-12 medium-12 small-12">
        <h2>Animations</h2>
        <button onclick="cylon('dispcase1');">Cylon</button>
    </div>
    <div class="large-12 medium-12 small-12">
        <input type='text' id="dispcase1"/>
    </div>
</div>

<div class="grid-x item" id="dispcase2div">
    <div class="large-12 medium-12 small-12">
        <div class="grid-x">
            <div class="large-12 medium-12 small-12">
                <h1>Display Case 2</h1>
            </div>
            <div class="large-12 medium-12 small-12">
                <h2>Animations</h2>
                <button onclick="cylon('dispcase2');">Cylon</button>
            </div>
        </div>
    </div>
    <div class="large-12 medium-12 small-12">
        <input type='text' id="dispcase2"/>
    </div>
</div>

<div class="grid-x item" id="oillampdiv">
    <div class="large-12 medium-12 small-12">
        <div class="grid-x">
            <div class="large-12 medium-12 small-12">
                <h1>Oil LAMP</h1>
            </div>
            <div class="large-12 medium-12 small-12">
                <h2>Animations</h2>
                <button onclick="spotlight();">Spotlight</button>
                <button onclick="dance();">Dance</button>
                <button onclick="horror('oillamp');">Horror</button>
                <button onclick="disco('oillamp');">Disco</button>
                <br>
                Animation Speed<br>
                <input id="speed" type="range" min="5" max="300" value="30" onchange="speedupdate(this);">
            </div>

        </div>
    </div>
    <div class="large-6 medium-6 small-6">
        Top<br>
        <input type='text' id="oillamp"/><br>

    </div>
    <div class="large-6 medium-6 small-6">
        Bottom<br>
        <input type='text' id="oillamp2"/><br>

    </div>
</div>

<div class="grid-x menu" id="menu">
    <?php
    foreach($devices as $item){
        ?>
        <div class="large-6 medium-6 small-6 device" onclick="active('<?php echo $item["device"]; ?>div');">
            <?php echo $item["device"]; ?>
            <script>
                $("#<?php echo $item["device"]; ?>").spectrum({
                    color: "#<?PHP echo $item['HEX']; ?>",
                    flat: true,
                    showInput: false,
                    showPalette: true,
                    palette: [
                        ['black', 'rgb(104,0,0)', 'rgb(0,78,104)',
                            'rgb(161, 122, 0);', 'rgb(52, 139, 32);', 'rgb(33,28,0)']
                    ],
                    showPaletteOnly: false,
                    showSelectionPalette: true,
                    cancelText: '',
                    chooseText: 'set',
                    move: function (tinycolor) {
                        updateColor("<?php echo $item["did"]; ?>", "<?php echo $item["device"]; ?>")
                    },
                });
            </script>
        </div>
        <?php
    }
    ?>

<!--    <div class="large-6 medium-6 small-6 device" onclick="active('oillampdiv');">-->
<!--        Oil Lamp-->
<!--    </div>-->
<!--    <div class="large-6 medium-6 small-6 device" onclick="active('dispcase1div');">-->
<!--        Display Case 1-->
<!--    </div>-->
<!--    <div class="large-6 medium-6 small-6 device" onclick="active('dispcase2div');">-->
<!--        Display Case 2-->
<!--    </div>-->
</div>


<script>
    //$("#garage").spectrum({
    //    color: "#<?PHP //echo $garage['HEX']; ?>//",
    //    flat: true,
    //    showInput: false,
    //    showPalette: true,
    //    palette: [
    //        ['black', 'rgb(104,0,0)', 'rgb(0,78,104)',
    //            'rgb(161, 122, 0);', 'rgb(52, 139, 32);', 'rgb(33,28,0)']
    //    ],
    //    showPaletteOnly: false,
    //    showSelectionPalette: true,
    //    cancelText: '',
    //    chooseText: 'set',
    //    move: function (tinycolor) {
    //        update("garage", "garage", "color")
    //    },
    //});
    //$("#dispcase1").spectrum({
    //    color: "#<?PHP //echo $dispcase1['HEX']; ?>//",
    //    flat: true,
    //    showInput: false,
    //    showPalette: true,
    //    palette: [
    //        ['black', 'rgb(104,0,0)', 'rgb(0,78,104)',
    //            'rgb(161, 122, 0);', 'rgb(52, 139, 32);', 'rgb(33,28,0)']
    //    ],
    //    showPaletteOnly: false,
    //    showSelectionPalette: true,
    //    cancelText: '',
    //    chooseText: 'set',
    //    move: function (tinycolor) {
    //        update("dispcase1", "dispcase1", "color")
    //    },
    //});
    //$("#dispcase2").spectrum({
    //    color: "#<?PHP //echo $dispcase2['HEX']; ?>//",
    //    flat: true,
    //    showInput: false,
    //    showPalette: true,
    //    palette: [
    //        ['black', 'rgb(104,0,0)', 'rgb(0,78,104)',
    //            'rgb(161, 122, 0);', 'rgb(52, 139, 32);', 'rgb(33,28,0)']
    //    ],
    //    showPaletteOnly: false,
    //    showSelectionPalette: true,
    //    cancelText: '',
    //    chooseText: 'set',
    //    move: function (tinycolor) {
    //        update("dispcase2", "dispcase2", "color")
    //    },
    //});
    //$("#oillamp").spectrum({
    //    color: "#<?PHP //echo $oillamp['HEX']; ?>//",
    //    flat: true,
    //    showInput: false,
    //    showPalette: true,
    //    palette: [
    //        ['black', 'rgb(104,0,0)', 'rgb(0,78,104)',
    //            'rgb(161, 122, 0);', 'rgb(52, 139, 32);', 'rgb(29,19,137)']
    //    ],
    //    showPaletteOnly: false,
    //    showSelectionPalette: true,
    //    cancelText: '',
    //    chooseText: 'set',
    //    move: function (tinycolor) {
    //        update("oillamp", "oillamp", "color")
    //    },
    //});
    //$("#oillamp2").spectrum({
    //    color: "#<?PHP //echo $oillamp['HEX']; ?>//",
    //    flat: true,
    //    showInput: false,
    //    showPalette: true,
    //    palette: [
    //        ['black', 'rgb(104,0,0)', 'rgb(0,78,104)',
    //            'rgb(161, 122, 0);', 'rgb(52, 139, 32);', 'rgb(230,15,15)']
    //    ],
    //    showPaletteOnly: false,
    //    showSelectionPalette: true,
    //    cancelText: '',
    //    chooseText: 'set',
    //    move: function (tinycolor) {
    //        update("oillamp2", "oillamp", "color2")
    //    },
    //});
</script>

<script src="/assets/iot.js"></script>


</body>
</html>