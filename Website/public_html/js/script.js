// JavaScript source code.

const labels = [
    "Career Opportunities",
    "Compensation and Benefits",
    "Culture and Values",
    "Diversity and Inclusion",
    "Senior Leadership",
    "Work Life Balance"
];

const data = {
    labels: labels,
    datasets: [{
        label: "Ratings",
        backgroundColor: [
            "rgb(246, 153, 63)",
            "rgb(56, 193, 114)",
            "rgb(77, 192, 181)",
            "rgb(149, 97, 226)",
            "rgb(246, 109, 155)",
        ],
        borderColor: "rgb(150, 150, 150)",
        data: [0, 10, 5, 2, 20, 30, 45, 60, 30],
    }]
};

const plugin = {
    id: "custom_canvas_background_color"
};

const config = {
    type: "bar",
    data: data,
    options: {
        aspectRatio: 1.5,
        indexAxis: "y",
        plugins: {
            legend: {
                display: true
            }
        }
    },
    plugins: [plugin]
};

function createChart(ratings) {
    config.data.datasets[0].data = ratings;
    Chart.overrides.polarArea.plugins.legend.position = "left";
    const chart = new Chart(
        document.getElementById( "chart"),
        config
);
    chart.canvas.parentNode.style.height = "300px";
    chart.canvas.parentNode.style.width = "700px";
}

$( document ).ready(function() {
    console.log("Script loaded!");
    let ratings = document.getElementById( "ratings").textContext.split(" ");
    console.log(ratings);
    createChart(ratings);
});
