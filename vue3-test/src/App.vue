<script setup>

</script>

<template>
  <div class="w-1/2 h-screen mx-auto flex flex-col">
    <ul class=" px-4 py-2 flex flex-row justify-evenly">
      <li><RouterLink class=" text-lg font-bold" :class="{'underline': $route.path == '/'}" to="/">Home</RouterLink></li>
      <li><RouterLink class=" text-lg font-bold" :class="{'underline': $route.path == '/task-one'}" to="/task-one">Task One</RouterLink></li>
      <li><RouterLink class=" text-lg font-bold" :class="{'underline': $route.path == '/task-two'}" to="/task-two">Task Two</RouterLink></li>
      <li><RouterLink class=" text-lg font-bold" :class="{'underline': $route.path == '/task-three'}" to="/task-three">Task Three</RouterLink></li>
    </ul>

    <RouterView/>
  </div>
</template>

<style scoped></style>
