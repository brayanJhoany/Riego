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
                        <div class="grid grid-cols-6 gap-2">
                            <div class="col-start-2">
                                <inertia-link :href="route('usuarios.index')">
                                    <button
                                        class="px-6 py-2 |   bg-red-700  hover:bg-indigo-900 focus:ring-opacity-50 | text-white font-bold  rounded-lg |transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none"
                                    >
                                        Cancelar
                                    </button>
                                </inertia-link>
                            </div>
                            <div class="col-start-4">
                                <loading-button
                                :loading="processing"
                                class=" px-6 py-2 |   bg-indigo-700  hover:bg-indigo-900 focus:ring-opacity-50 | text-white font-bold  rounded-lg |transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none"
                                type="submit
                            "
                            >
                                <p class="my-auto mx-auto">Registrar</p>
                            </loading-button>
                            </div>
                        </div>
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
            if(this.$page.user.rol_id == 2){
                this.form.user_id=this.$page.user.id;
            }
                console.log(this.form);
               this.processing=true;
               this.$inertia.post(this.route('campos.store'),this.form)
                 .then(()=>this.processing=false);
        }
    }

}
</script> 
