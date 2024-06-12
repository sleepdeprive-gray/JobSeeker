function createGauge(id, min, max, value) {
    var width = 200;
    var height = 200;
    var radius = Math.min(width, height) / 2;
    var arc = d3.arc()
        .innerRadius(radius * 0.7)
        .outerRadius(radius * 0.85)
        .startAngle(-Math.PI / 2);

    var svg = d3.select(`#${id}`).append("svg")
        .attr("width", width)
        .attr("height", height)
        .append("g")
        .attr("transform", `translate(${width / 2}, ${height / 2})`);

    var background = svg.append("path")
        .datum({ endAngle: Math.PI / 2 })
        .style("fill", "#ddd")
        .attr("d", arc);

    var foreground = svg.append("path")
        .datum({ endAngle: -Math.PI / 2 })
        .style("fill", "#007bff")
        .attr("d", arc);

    var percentageLabel = svg.append("text")
        .attr("text-anchor", "middle")
        .attr("dy", "0.35em")
        .style("font-size", "16px")
        .style("fill", "#333");

    updateGauge(value);

    function updateGauge(value) {
        var angle = (value - min) / (max - min) * Math.PI - Math.PI / 2;
        var percentage = ((value - min) / (max - min) * 100).toFixed(1) + '%';
        foreground.transition().duration(750).attrTween("d", arcTween(angle));
        percentageLabel.text(percentage);
    }

    function arcTween(newAngle) {
        return function (d) {
            var interpolate = d3.interpolate(d.endAngle, newAngle);
            return function (t) {
                d.endAngle = interpolate(t);
                return arc(d);
            };
        };
    }

    return {
        update: updateGauge
    };
}

// Initialize gauges with example data
var gaugeJobPosted = createGauge("gaugeJobPosted", 0, 100, 50);
var gaugeApplicantsApplied = createGauge("gaugeApplicantsApplied", 0, 200, 100);
var gaugeTotalHired = createGauge("gaugeTotalHired", 0, 50, 25);

// Example of updating gauges with new data
setInterval(function () {
    var jobPostedValue = Math.floor(Math.random() * 100);
    var applicantsAppliedValue = Math.floor(Math.random() * 200);
    var totalHiredValue = Math.floor(Math.random() * 50);

    gaugeJobPosted.update(jobPostedValue);
    gaugeApplicantsApplied.update(applicantsAppliedValue);
    gaugeTotalHired.update(totalHiredValue);
}, 5000);


// Real-time gauge

setInterval(async function () {
    try {
        let response = await fetch('/api/employee-data'); // Replace with your actual API endpoint
        let data = await response.json();

        gaugeJobPosted.update(data.jobPosted);
        gaugeApplicantsApplied.update(data.applicantsApplied);
        gaugeTotalHired.update(data.totalHired);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}, 5000);
