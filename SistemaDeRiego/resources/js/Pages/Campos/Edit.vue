<template>
    <app-layout>
              <template #header>
          <p class="col-start-1 col-end-2">
                Editar Campo
            </p>

      </template>
    </app-layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'
export default {
    name:"EditCampo",
    components:{AppLayout},
    props:{
        campo:null,
        texturas:null,
    }
}
</script>