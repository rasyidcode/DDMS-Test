<script setup>
import { storeToRefs } from 'pinia'
import { useAuth } from '../stores/auth'

const { user, pass, isAuthenticated, loginHistory } = storeToRefs(useAuth())

const auth = useAuth()
</script>

<template>
  <div class="p-3">
    <h1 class="text-3xl font-semibold mb-4">Simple Auth</h1>

    <!-- Authenticated View -->
    <div class="w-1/2 border p-4" v-if="isAuthenticated">
      <h1 class="font-light text-xl">Hello, {{ user }}!</h1>
      <button type="button" @click="auth.logout()" class="bg-red-500 py-2 px-4
        text-white font-semibold rounded mt-5">Logout</button>
    </div>

    <!-- Login View -->
    <div v-else class="w-1/2 flex justify-center items-center mx-auto" @submit.prevent="auth.login()">
      <form class="p-5 grid gap-2">
        <div class="flex flex-col">
          <label for="user" class="mb-1 font-semibold">Username</label>
          <input class="py-2 px-4 border max-w-max" id="user" v-model="user" type="text" name="user"
            placeholder="Username" required>
        </div>
        <div class="flex flex-col">
          <label for="pass" class="mb-1 font-semibold">Password</label>
          <input class="py-2 px-4 border max-w-max" id="pass" v-model="pass" type="password" name="pass"
            placeholder="Password" required>
        </div>
        <div class="flex flex-row justify-between">
          <button type="submit" class="bg-blue-500 py-1 px-3 border rounded
          font-semibold text-white hover:bg-blue-700 transition duration-150 ease-in-out
          mt-2">Login</button>
          <button type="button" @click="auth.reset()" class="bg-red-500 py-1 px-3 border rounded
          font-semibold text-white hover:bg-red-700 transition duration-150 ease-in-out
          mt-2">Reset Account</button>
        </div>
        <div class="mt-3">
          <h4 v-if="auth.error" class="text-red-500 font-thin">{{ auth.error }}</h4>
        </div>
      </form>
    </div>

    <!-- Login History -->
    <div class="mt-5">
      <h4 class="font-semibold">Login History</h4>
      <hr>
      <div class="flex flex-col mt-3 divide-y gap-2">
        <div v-for="(h, i) in loginHistory" :key="i">
          <pre :class="{'text-green-500': h.success, 'text-red-500': !h.success}">{{ h }}</pre>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>