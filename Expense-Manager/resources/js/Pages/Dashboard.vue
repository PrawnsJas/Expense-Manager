<template>
  <div class="dashboard">
    <div class="table-container">
      <h2>Expense Categories</h2>
      <table>
        <thead>
          <tr>
            <th>Category</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="expense in expenses" :key="expense.category_id">
            <td>{{ expense.category.name }}</td>
            <td>{{ typeof expense.total_amount === 'number' ? expense.total_amount.toFixed(2) : parseFloat(expense.total_amount).toFixed(2) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="chart-placeholder">
      <p>Total expenses per category:</p>
      <PieChart v-if="chartData" :chartData="chartData" />
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';
import PieChart from './Components/PieChart.vue'; 

export default {
  name: 'Dashboard',
  components: {
    PieChart,
  },
  props: {
    expenses: Array, 
  },
  setup(props) {
    console.log('Expenses data:', props.expenses);

    const chartData = computed(() => {
      console.log(chartData.value);
      return props.expenses.map(expense => ({
        category: expense.category.name,
        total_amount: parseFloat(expense.total_amount),
      }));
    });

    return {
      chartData,
      expenses: props.expenses, 
    };
  },
};
</script>

<style scoped>
.dashboard {
  display: flex;
  gap: 20px; 
}

.table-container {
  flex: 1; 
  min-width: 300px; 
}

.chart-placeholder {
  flex: 2; 
  height: 300px; 
  border: 2px dashed #ccc;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
