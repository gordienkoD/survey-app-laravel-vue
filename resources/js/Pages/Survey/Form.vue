<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const questions = [
  "How satisfied are you with our service?",
  "How do you rate the quality of work?",
  "Would you recommend us to your friends?",
  "How convenient is our service?",
  "How do you rate the speed of work?",
];

const form = useForm({
  answers: questions.reduce((acc, _, index) => {
    acc[`question${index + 1}`] = null;
    return acc;
  }, {}),
});

const submit = () => {
  form.post(route("survey.store"));
};
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Survey</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-md sm:rounded-lg p-8">
          <h1 class="text-2xl font-bold text-gray-800 mb-6">Take the Survey</h1>

          <form @submit.prevent="submit">
            <div
              v-for="(question, index) in questions"
              :key="index"
              class="mb-6"
            >
              <p class="text-lg font-semibold text-gray-700">{{ question }}</p>
              <div class="flex gap-4 mt-2">
                <label v-for="i in 5" :key="i" class="flex items-center">
                  <input
                    type="radio"
                    :name="`question${index + 1}`"
                    :value="i"
                    v-model="form.answers[`question${index + 1}`]"
                    class="mr-2"
                  />
                  {{ i }}
                </label>
              </div>
            </div>

            <button
              type="submit"
              class="mt-6 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
              :disabled="form.processing"
            >
              Submit
            </button>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
