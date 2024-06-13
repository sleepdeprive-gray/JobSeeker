document.addEventListener('DOMContentLoaded', function () {
    fetch('fetch-stat.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
        .then(data => {
            // Update counts
            updateCount('applicantsCount', data.applicants);
            updateCount('companiesCount', data.companies);
            updateCount('feedbacksCount', data.feedbacks);

            // Update charts
            updateChart(applicantsChart, data.applicants);
            updateChart(companiesChart, data.companies);
            updateChart(feedbacksChart, data.feedbacks);
        })
        .catch(error => console.error('Error fetching or parsing data:', error));


    function updateCount(id, target) {
        const element = document.getElementById(id);
        element.innerText = target;
    }

    function updateChart(chart, value) {
        chart.data.datasets[0].data[0] = value;
        chart.update();
    }

    const applicantsCtx = document.getElementById('applicantsChart').getContext('2d');
    const applicantsChart = new Chart(applicantsCtx, {
        type: 'bar',
        data: {
            labels: [''],
            datasets: [{
                label: 'Applicants',
                data: [0],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const companiesCtx = document.getElementById('companiesChart').getContext('2d');
    const companiesChart = new Chart(companiesCtx, {
        type: 'bar',
        data: {
            labels: [''],
            datasets: [{
                label: 'Companies',
                data: [0],
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const feedbacksCtx = document.getElementById('feedbacksChart').getContext('2d');
    const feedbacksChart = new Chart(feedbacksCtx, {
        type: 'bar',
        data: {
            labels: [''],
            datasets: [{
                label: 'Feedbacks',
                data: [0],
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
