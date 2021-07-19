<template>
  <master>
      <template #header>
          {{ stock.name }}
      </template>
  </master>
</template>

<script>

import Master from '@/Layouts/Authenticated'

export default {
    components: {
        Master
    },

    props: {
        stock: Object
    }
}
</script>

<style>

</style>