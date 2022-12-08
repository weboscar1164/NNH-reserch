import Chart from "chart.js/auto";

pie_chart();
function pie_chart() {
    const $chart = document.getElementById("chart");

    if (!$chart) {
        return;
    }

    const ctx = $chart.getContext("2d");

    let data;

    const sum = data_answer.reduce((sum, num) => sum + num, 0);
    if (sum == 0) {
        data = {
            labels: ["まだ投票がありません。"],
            datasets: [
                {
                    data: [1],
                    backgroundColor: ["#9ca3af"],
                },
            ],
        };
    } else {
        data = {
            labels: data_choice,
            datasets: [
                {
                    data: data_answer,
                    // backgroundColor: [
                    //     "#34d399",
                    //     "#f87171",
                    //     "blue",
                    //     "orange",
                    //     "pink",
                    // ],
                },
            ],
        };
    }

    new Chart(ctx, {
        type: "pie",
        data: data,
        options: {
            legend: {
                position: "bottom",
                labels: {
                    fontSize: 18,
                },
            },
        },
    });
}
