<div class="card">
    <div class="card-body">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
</div>

<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>
<script>
    const FetchAllTrans = () => {
        var results;
        var settings = {
            "url": "http://localhost:8000/api/all-invoice",
            "method": "GET",
            "async": false,
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            results = response.data;
        }).fail(function(error){
            console.log(error);
            ShowModalBill({header:"Error", body:error.responseText});
        });
        return results;
    }

    window.onload = function() {
        var dataPoints = [];
        var dataArr = FetchAllTrans();
        console.log(dataArr);
        var dataX = [{
                "date": 1493922600000,
                "units": 320
            },
            {
                "date": 1494009000000,
                "units": 552
            },
            {
                "date": 1494095400000,
                "units": 342
            },
            {
                "date": 1494181800000,
                "units": 431
            },
            {
                "date": 1494268200000,
                "units": 251
            },
            {
                "date": 1494354600000,
                "units": 445
            }
        ];

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Grap Month"
            },
            axisY: {
                title: "Orders",
                titleFontSize: 24,
                includeZero: true
            },
            data: [{
                type: "column",
                yValueFormatString: "#,### Units",
                dataPoints: dataPoints
            }]
        });

        function addData(data) {
            for (var i = 0; i < data.length; i++) {
                dataPoints.push({
                    x: new Date(data[i].date),
                    y: data[i].units
                });
            }
            chart.render();
        }
        addData(dataX);

    }
</script>
