<script lang="ts" setup>
import type { ChartData, ChartOptions } from "chart.js";
import { Chart, ArcElement, Tooltip, Legend } from "chart.js";
import { ref, onMounted, onBeforeUnmount } from "vue";

// Register required components
Chart.register(ArcElement, Tooltip, Legend);

// DOM reference
const canvasRef = ref<HTMLCanvasElement | null>(null);

// Chart instance (typed)
let chartInstance: Chart<"pie"> | null = null;

// Data (typed)
const data: ChartData<"pie"> = {
    labels: ["Red", "Blue", "Yellow"],
    datasets: [
        {
            label: "Dataset",
            data: [30, 50, 20],
            backgroundColor: ["#ff6384", "#36a2eb", "#ffce56"]
        }
    ]
};

// Options (typed)
const options: ChartOptions<"pie"> = {
    responsive: true,
    plugins: {
        legend: {
            position: "top"
        }
    }
};

onMounted(() => {
    if (canvasRef.value) {
        chartInstance = new Chart(canvasRef.value, {
            type: "pie",
            data,
            options
        });
    }
});

// Cleanup (important)
onBeforeUnmount(() => {
    chartInstance?.destroy();
});
</script>

<template>
    <div style="width: 400px;">
        <canvas ref="canvasRef"></canvas>
    </div>
</template>