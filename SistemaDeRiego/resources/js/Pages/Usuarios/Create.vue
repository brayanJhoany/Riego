<template>
    <app-layout>
         <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo usuario
            </h2>
        </template>
        <div class="py-12"> 
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form-user :errors="errors" :form="form" @submit="submit"> 
                    <template #buttons>
                        <inertia-link :href="route('usuarios.index')">
                        <button class="mr-10 bg-red-400 rounded-lg transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none">Cancelar</button>
                        </inertia-link>
                        <loading-button
                            :loading="processing"
                            class="bg-indigo-400 rounded-lg hover:bg-indigo-900 focus:ring-opacity-50 
                             text-white font-bold transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none"
                            type="submit"
                        >
                            Crear proyecto
                        </loading-button>
                    </template>
                </form-user>
            </div>
        </div>
    </app-layout>
</template>

<script>
import FormUser from '../../Components/Formularios/FormUser.vue'
import LoadingButton from '../../Components/Formularios/LoadingButton'
import AppLayout from '../../Layouts/AppLayout.vue'
export default {
    name:"CreateUser",
  components: { AppLayout, FormUser, LoadingButton },
  props:{
      errors:Object,

  },
  data(){
      return{
          processing:false,
          form:{
              name:null,
              email:null,
              password:null,
              rol_id:2
          }
      }
  },
  methods:{
      submit(){
          this.processing=true;
          this.$inertia.post(this.route('usuarios.store'),this.form)
            .then(()=>this.processing=false);

      }
  }
}
</script>