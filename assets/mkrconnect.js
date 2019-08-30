console.log('Connected to API View Service');

$.ajax(
    {
        "url": "http://homenet.stevenburns.net",
        "type": "GET",
        "dataType": "HTML",
        "crossDomain": true,
        success: function (res) {
            $("#content").append(res);
            //res = JSON.parse(res);
            //console.log(res.html);

        },
        error: function (res) {
            console.error("ERROR!");
            console.log(res);
        }
    });