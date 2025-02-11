<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { defineProps, computed } from "vue";

const props = defineProps({
  filledUsers: { type: Array, default: () => [] },
  unfilledUsers: { type: Array, default: () => [] },
});

const filledUsersCount = computed(() => props.filledUsers.length);
const unfilledUsersCount = computed(() => props.unfilledUsers.length);
</script>

<template>
  <Head title="Admin" />
  <AuthenticatedLayout>
    <div class="py-12">
      <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-md sm:rounded-lg p-8">
          <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Survey Statistics
          </h1>

          <div>
            <h2 class="text-xl font-semibold text-green-600 mb-4">
              Survey Completed ({{ filledUsersCount }})
            </h2>
            <div v-if="filledUsers.length > 0" class="space-y-4">
              <div
                v-for="user in filledUsers"
                :key="user.id"
                class="flex items-center justify-between bg-green-100 p-4 rounded-lg shadow-sm"
              >
                <div class="flex items-center space-x-4">
                  <div
                    class="w-10 h-10 bg-green-500 text-white flex items-center justify-center rounded-full text-lg font-semibold"
                  >
                    {{ user.name[0] }}
                  </div>
                  <p class="text-lg font-medium text-gray-700">
                    {{ user.name }}
                  </p>
                </div>
              </div>
            </div>
            <p v-else class="text-gray-500 text-center text-lg">
              No users have completed the survey.
            </p>
          </div>

          <hr class="my-8 border-gray-300" />

          <div>
            <h2 class="text-xl font-semibold text-red-600 mb-4">
              Survey Not Completed ({{ unfilledUsersCount }})
            </h2>
            <div v-if="unfilledUsers.length > 0" class="space-y-4">
              <div
                v-for="user in unfilledUsers"
                :key="user.id"
                class="flex items-center justify-between bg-red-100 p-4 rounded-lg shadow-sm"
              >
                <div class="flex items-center space-x-4">
                  <div
                    class="w-10 h-10 bg-red-500 text-white flex items-center justify-center rounded-full text-lg font-semibold"
                  >
                    {{ user.name[0] }}
                  </div>
                  <p class="text-lg font-medium text-gray-700">
                    {{ user.name }}
                  </p>
                </div>
              </div>
            </div>
            <p v-else class="text-gray-500 text-center text-lg">
              All users have completed the survey.
            </p>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
