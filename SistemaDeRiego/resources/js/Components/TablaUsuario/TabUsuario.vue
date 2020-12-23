<template>
    <tr>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                        {{ usuario.name }}
                    </div>
                </div>
            </div>
        </td>

        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ usuario.email }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <span
                v-if="usuario.deleted_at"
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-700 text-white"
            >
            Desactivada
            </span>
            <span
                v-else
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
            >
            Activa
            </span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ usuario.rol.nombre }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-2 mr-2">Ver</a>

                <!-- <inertia-link
                class="px-4 flex items-center"
                :href="route('usuarios.edit', usuario.id)"
            >
                <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-2 mr-2">Editar</a>
            </inertia-link> -->

            <a @click="editarUsuario(usuario)"  class="text-indigo-600 hover:text-indigo-900 ml-2 mr-2">Editar</a>
            <a @click="modalEliminar(usuario)" class="text-indigo-600 hover:text-indigo-900">Eliminar</a>
        </td>

        <jet-confirmation-modal :show="showModal" @close="showModal = false">
            <template #title>
                Eliminar el usuario {{usuarioEliminar.name}}
            </template>

            <template #content>
                ¿Estás seguro que quieres eliminar el Usuario  {{usuarioEliminar.name}}?
            </template>

            <template #footer>
                <jet-secondary-button @click.native="showModal = false">
                    Cancelar
                </jet-secondary-button>

                <jet-danger-button @click.native="eliminarUsuario" class="ml-2" :class="{ 'opacity-25': processing }" :disabled="processing">
                    Eliminar 
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>


    </tr>

    
</template>

<script>
import Button from "../../Jetstream/Button.vue";
import JetConfirmationModal from "../../Jetstream/ConfirmationModal";
import JetSecondaryButton from "../../Jetstream/SecondaryButton";
import JetDangerButton from "../../Jetstream/DangerButton";
export default {
    components: { Button , JetConfirmationModal, JetDangerButton, JetSecondaryButton },
    name: "TabUsuario",
    data(){
        return{
            processing: false,
            showModal: false,
            usuarioEliminar:{name:null, id:null},
        }
    },
    props: {
        usuario: Object,
        errors: Object
    },
    methods: {
        editarUsuario(usuario){
           this.$inertia.get(this.route('usuarios.edit',usuario.id));
        },
        modalEliminar(usuario){
            this.showModal=true;
            this.usuarioEliminar.name=usuario.name;
            this.usuarioEliminar.id=usuario.id;
        },

        eliminarUsuario() {
            this.processing=true;
            this.$inertia.delete(this.route('usuarios.destroy',this.usuarioEliminar.id))
                .then(()=> this.processing=false);
            
            this.resetModalEliminarUsuario();

        },
        /**
         * Cambia  a null los datos que componen al usuarioEliminar, el cual 
         * se utliza para mostrar informacion del usuario que se intenta eliminar
         */
        resetModalEliminarUsuario(){
            this.usuarioEliminar.id=null;
            this.usuarioEliminar.name=null;
        }
    }
};
</script>
