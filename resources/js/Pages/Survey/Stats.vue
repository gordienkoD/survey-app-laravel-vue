<script setup>
import { defineProps, ref, onMounted } from "vue";
import { Chart } from "chart.js/auto";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({ data: Array });
const chartRef = ref(null);

const questions = [
  "How satisfied are you with our service?",
  "How do you rate the quality of work?",
  "Would you recommend us to your friends?",
  "How convenient is our service?",
  "How do you rate the speed of work?",
];

const processData = () => {
  const counts = Array(5).fill(0);
  const responses = Array(5).fill(0);

  props.data.forEach((entry) => {
    try {
      const answers = JSON.parse(entry.answers);
      questions.forEach((_, index) => {
        const value = parseInt(answers[`question${index + 1}`], 10);
        if (!isNaN(value)) {
          counts[index] += value;
          responses[index] += 1;
        }
      });
    } catch (error) {
      console.error("JSON parsing error:", error);
    }
  });

  return counts.map((sum, index) =>
    responses[index] > 0 ? sum / responses[index] : 0
  );
};

onMounted(() => {
  const processedData = processData();

  new Chart(chartRef.value, {
    type: "bar",
    data: {
      labels: questions,
      datasets: [
        {
          label: "Average Score",
          data: processedData,
          backgroundColor: "#6366F1",
          borderColor: "#4338CA",
          borderWidth: 2,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: { legend: { display: true } },
      scales: { y: { beginAtZero: true, max: 5 } },
    },
  });
});
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Survey Results
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-md sm:rounded-lg p-8">
          <h1 class="text-2xl font-bold text-gray-800 mb-6">Results</h1>
          <div class="relative bg-gray-100 p-6 rounded-lg shadow-inner">
            <canvas ref="chartRef"></canvas>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
