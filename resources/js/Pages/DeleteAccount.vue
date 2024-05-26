<script setup>
import { Head } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Delete Account" />
  <div class="mx-auto p-6 px-10 bg-[#011D32] text-white min-h-screen">
    <h1 class="text-3xl font-bold mb-6">Delete Your Account</h1>
    <p class="mb-4">
      We are sorry to see you go. If you wish to delete your NeoVista account, please
      follow the steps below:
    </p>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2">How to Delete Your Account</h2>
      <ul class="list-disc list-inside text-gray-300">
        <li>Open the NeoVista app.</li>
        <li>Go to the <strong>Profile</strong> screen.</li>
        <li>
          Scroll to the bottom and click on the <strong>Delete Account</strong> button.
        </li>
        <li>Confirm to delete your account by following the on-screen instructions.</li>
      </ul>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2">Need Help?</h2>
      <p>
        If you have any issues or need further assistance, please contact our support team
        at
        <a href="mailto:neovistatelecom@gmail.com" class="text-blue-500 underline"
          >neovistatelecom@gmail.com</a
        >.
      </p>
    </section>
  </div>
</template>

<style scoped>
/* Add any additional custom styling here if needed */
</style>
