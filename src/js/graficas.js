(function(){

    // Datos de ejemplo: años
const years = ["2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024", "2025", "2026"];

// Datos de ejemplo: matrícula de estudiantes con fluctuaciones
const enrollmentCount = [120, 130, 140, 150, 140, 130, 120, 130, 140, 150, 160, 150]; // Cantidades que suben y bajan

// Configuración del gráfico de barras multi-axis
const ctx = document.getElementById("multiAxisBarChart").getContext("2d");
const multiAxisBarChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: years,
        datasets: [
            {
                label: "Matrícula de Estudiantes",
                data: enrollmentCount,
                backgroundColor: "rgb(21, 55, 66)",
                borderColor: "rgba(255, 99, 132, 1)",
                yAxisID: "y1",
            }
        ],
    },
    options: {
        scales: {
            y1: {
                id: "y1",
                beginAtZero: true,
                position: "left",
            }
        },
    },
});
})()