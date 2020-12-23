<template>
  <app-layout>
      <template #header>
          <p class="col-start-1 col-end-2">
                Nuevo campo
            </p>

      </template>

  </app-layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'
export default {
    name:"nuevoCampo",
    components:{
        AppLayout
    }

}
</script>
