document.addEventListener('DOMContentLoaded', function() {
    // Function to fetch data
    function fetchData() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'process/fetch-stat.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    var data = JSON.parse(xhr.responseText);
                    displayCounts(data);
                } catch (e) {
                    console.error('Error parsing JSON response: ', e);
                }
            } else {
                console.error('Error fetching data');
            }
        };
        xhr.onerror = function() {
            console.error('Error fetching data');
        };
        xhr.send();
    }

    // Function to display counts
    function displayCounts(data) {
        var applicantCountElement = document.querySelector('.applicant-count .count');
        var companyCountElement = document.querySelector('.company-count .count');
        var feedbackCountElement = document.querySelector('.feedback-count .count');

        if (applicantCountElement && companyCountElement && feedbackCountElement) {
            // Animate counts from 10000 to actual counts
            animateCount(applicantCountElement, 5000, data.applicantCount);
            animateCount(companyCountElement, 1000, data.companyCount);
            animateCount(feedbackCountElement, 3000, data.feedbackCount);
        } else {
            console.error('Error: Count container elements not found.');
        }
    }

    // Function to animate count
    function animateCount(element, startCount, endCount) {
        var duration = 1000; // Animation duration in milliseconds
        var startTime = null;

        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = timestamp - startTime;
            var percentage = Math.min(progress / duration, 1);

            var currentCount = Math.floor(startCount + (endCount - startCount) * percentage);
            element.textContent = currentCount.toLocaleString(); // Format number with commas

            if (percentage < 1) {
                window.requestAnimationFrame(step);
            }
        }

        window.requestAnimationFrame(step);
    }

    // Fetch data when the page loads
    fetchData();
});
