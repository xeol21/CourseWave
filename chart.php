<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Fetch data for feedback chart
            var xhr1 = new XMLHttpRequest();
            xhr1.open('GET', 'get_chart_data.php?chart=feedback', true);
            xhr1.send();
            xhr1.onload = function() {
                if (xhr1.status == 200) {
                    var feedbackData = JSON.parse(xhr1.responseText);
                    drawFeedbackChart(feedbackData);
                }
            };

            // Fetch data for tblreg chart
            var xhr2 = new XMLHttpRequest();
            xhr2.open('GET', 'get_chart_data.php?chart=tblreg', true);
            xhr2.send();
            xhr2.onload = function() {
                if (xhr2.status == 200) {
                    var tblregData = JSON.parse(xhr2.responseText);
                    drawTblregChart(tblregData);
                }
            };

            // Fetch data for course chart
            var xhr3 = new XMLHttpRequest();
            xhr3.open('GET', 'get_chart_data.php?chart=course', true);
            xhr3.send();
            xhr3.onload = function() {
                if (xhr3.status == 200) {
                    var courseData = JSON.parse(xhr3.responseText);
                    drawCourseChart(courseData);
                }
            };

            // Fetch data for city chart
var xhr2 = new XMLHttpRequest();
xhr2.open('GET', 'get_chart_data.php?chart=city', true);
xhr2.send();
xhr2.onload = function() {
    if (xhr2.status == 200) {
        var cityData = JSON.parse(xhr2.responseText);
        drawCityChart(cityData);
    }
};

// Fetch data for state chart
var xhr3 = new XMLHttpRequest();
xhr3.open('GET', 'get_chart_data.php?chart=state', true);
xhr3.send();
xhr3.onload = function() {
    if (xhr3.status == 200) {
        var stateData = JSON.parse(xhr3.responseText);
        drawStateChart(stateData);
    }
};
        }

        function drawFeedbackChart(feedbackData) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Content');
            data.addColumn('number', 'Count');

            // Convert JSON data to array
            var dataArray = [];
            for (var i = 0; i < feedbackData.length; i++) {
                dataArray.push([feedbackData[i].ftype, parseInt(feedbackData[i].count)]);
            }
            data.addRows(dataArray);

            var options = {
                title: 'Feedback Content Distribution',
                is3D: true,
                width: 400,
                height: 300
            };

            var chart = new google.visualization.PieChart(document.getElementById('feedback_chart_div'));
            chart.draw(data, options);
        }

        function drawTblregChart(tblregData) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Gender');
            data.addColumn('number', 'Count');

            // Convert JSON data to array
            var dataArray = [];
            for (var i = 0; i < tblregData.length; i++) {
                dataArray.push([tblregData[i].gender, parseInt(tblregData[i].count)]);
            }
            data.addRows(dataArray);

            var options = {
                title: 'Gender Distribution in Registration',
                is3D: true,
                width: 400,
                height: 300
            };

            var chart = new google.visualization.PieChart(document.getElementById('tblreg_chart_div'));
            chart.draw(data, options);
        }

        function drawCourseChart(courseData) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Course Name');
            data.addColumn('number', 'Count');

            // Convert JSON data to array
            var dataArray = [];
            for (var i = 0; i < courseData.length; i++) {
                dataArray.push([courseData[i].course, parseInt(courseData[i].count)]);
            }
            data.addRows(dataArray);

            var options = {
                title: 'Course Enrollment Distribution',
                is3D: true,
                width: 400,
                height: 300
            };

            var chart = new google.visualization.PieChart(document.getElementById('course_chart_div'));
            chart.draw(data, options);
        }

    function drawCityChart(cityData) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'City');
    data.addColumn('number', 'Count');

    // Convert JSON data to array
    var dataArray = [];
    for (var i = 0; i < cityData.length; i++) {
        dataArray.push([cityData[i].city, parseInt(cityData[i].count)]);
    }
    data.addRows(dataArray);

    var options = {
        title: 'City Distribution of Registered Students',
        is3D: true,
        width: 400,
        height: 300
    };

    var chart = new google.visualization.PieChart(document.getElementById('city_chart_div'));
    chart.draw(data, options);
}

function drawStateChart(stateData) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'State');
    data.addColumn('number', 'Count');

    // Convert JSON data to array
    var dataArray = [];
    for (var i = 0; i < stateData.length; i++) {
        dataArray.push([stateData[i].state, parseInt(stateData[i].count)]);
    }
    data.addRows(dataArray);

    var options = {
        title: 'State Distribution of Registered Students',
        is3D: true,
        width: 400,
        height: 300
    };

    var chart = new google.visualization.PieChart(document.getElementById('state_chart_div'));
    chart.draw(data, options);
}

    </script>
</head>
<body>
    <table class="columns">
        <tr>
            <td><div id="feedback_chart_div" style="border: 1px solid #ccc"></div></td>
            <td><div id="tblreg_chart_div" style="border: 1px solid #ccc"></div></td>
            <td><div id="course_chart_div" style="border: 1px solid #ccc"></div></td>
            <td><div id="city_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="state_chart_div" style="border: 1px solid #ccc"></div></td>
        </tr>
    </table>
</body>
</html>