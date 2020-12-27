<template>
  <app-layout>
      <template #header>
          <p class="col-start-1 col-end-2">
                Nuevo campo
            </p>

      </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form-campo
                    :errors="errors"
                    :form="form"
                    @submit="submit"
                    :texturas="texturasSuelo"
                    :listaUsuarios="listaUsuarios"
                >
                    <template #buttons>
                        <inertia-link :href="route('campos.index')">
                            <button
                                class="mr-10 bg-red-400 rounded-lg transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none"
                            >
                                Cancelar
                            </button>
                        </inertia-link>
                        <loading-button
                            :loading="processing"
                            class="bg-indigo-400 rounded-lg hover:bg-indigo-900 focus:ring-opacity-50
                             text-white font-bold transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none"
                            type="submit
                            "
                        >
                            <p class="my-auto mx-auto">Registrar usuario</p>
                        </loading-button>
                    </template>
                </form-campo>
            </div>
        </div>
  </app-layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'
import LoadingButton from "../../Components/Formulario/LoadingButton";
import FormCampo from '../../Components/ComponentesCampo/FormCampo.vue';
export default {
    name:"nuevoCampo",
    components:{
        AppLayout,LoadingButton,FormCampo
    },
    props: {
        errors: Object,
        texturasSuelo: Array,
        listaUsuarios:Array
    },
    data() {
        return {
            processing: false,
            form: {
                nombre: null,
                texturaDeSuelo_id:null,
                user_id:null,
            }
        };
    },
    methods: {
        submit() {
            // if(this.$page.user.rol_id == 2){
            //     this.form.nombreUsuario=this.$page.user;
            // }
                console.log(this.form);
               this.processing=true;
               this.$inertia.post(this.route('campos.store'),this.form)
                 .then(()=>this.processing=false);
        }
    }

}
</script> 
