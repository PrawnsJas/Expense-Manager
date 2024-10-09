<template>
  <div>
    <canvas ref="chartCanvas"></canvas>
  </div>
</template>

<script>
import { ref, watch, onMounted } from 'vue';
import { Chart, registerables } from 'chart.js';

Chart.register(...registerables);

export default {
  props: {
    chartData: Array,
  },
  setup(props) {
    const chartCanvas = ref(null);
    let chartInstance = null;

    const createChart = () => {
      const labels = props.chartData.map(item => item.category);
      const data = props.chartData.map(item => item.total_amount);

      if (chartInstance) {
        chartInstance.destroy();
      }

      chartInstance = new Chart(chartCanvas.value, {
        type: 'pie',
        data: {
          labels,
          datasets: [
            {
              data,
              backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            },
          ],
        },
      });
    };

    watch(
      () => props.chartData,
      (newVal) => {
        if (newVal) {
          createChart();
        }
      },
      { immediate: true }
    );

    onMounted(() => {
      createChart();
    });

    return {
      chartCanvas,
    };
  },
};
</script>