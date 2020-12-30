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
            <a
                @click="showUsuario(usuario)"
                class="text-indigo-600 hover:text-indigo-900 ml-2 mr-2"
                >Ver</a
            >

            <a
                @click="editarUsuario(usuario)"
                class="text-indigo-600 hover:text-indigo-900 ml-2 mr-2"
                >Editar</a
            >
            <a
                @click="modalEliminar(usuario)"
                class="text-indigo-600 hover:text-indigo-900"
                >Eliminar</a
            >
        </td>

        <jet-confirmation-modal :show="showModal" @close="showModal = false">
            <template #title>
                Eliminar el usuario {{ usuarioEliminar.name }}
            </template>

            <template #content>
                ¿Estás seguro que quieres eliminar el Usuario
                {{ usuarioEliminar.name }}?
            </template>

            <template #footer>
                <jet-secondary-button @click.native="showModal = false">
                    Cancelar
                </jet-secondary-button>

                <jet-danger-button
                    @click.native="eliminarUsuario"
                    class="ml-2"
                    :class="{ 'opacity-25': processing }"
                    :disabled="processing"
                >
                    Eliminar
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>

        <modal :show="verUsuario">
            <div class="px-6 py-4">
                <div class="mt-4 text-center">
                        <div class="flex justify-center mr-5">
                            <img
                                class=" h-28 w-28 |    text-center   rounded-2xl object-cover"
                                :src="usuarioMostrar.foto"
                            />

                            <div class="flex flex-col text-center mt-3 mb-4 ml-5">
                                <span class="text-2xl font-extrabold uppercase" >
                                     {{usuarioMostrar.name}}
                                    </span
                                >
                                <span class="text-md text-gray-400" >
                                    Correo: {{usuarioMostrar.email}}
                                </span>
                                <span class="text-md text-gray-400" >
                                    Rol: {{usuarioMostrar.rol}}
                                </span>
                                    
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>

            <div class="px-6 py-4 bg-gray-100 | grid grid-cols-3">
                <button @click="verUsuario = !verUsuario" 
                class="py-2 px-2 | col-start-2 | bg-red-400  text-white | rounded-lg block | text-center font-bold | col-start-2">cerrar</button>
            </div>
        </modal>
    </tr>
</template>

<script>
import Button from "../../Jetstream/Button.vue";
import JetConfirmationModal from "../../Jetstream/ConfirmationModal";
import JetSecondaryButton from "../../Jetstream/SecondaryButton";
import JetDangerButton from "../../Jetstream/DangerButton";
import DialogModal from "../../Jetstream/DialogModal";
import Modal from "../../Jetstream/Modal.vue";
export default {
    components: {
        Button,
        JetConfirmationModal,
        JetDangerButton,
        JetSecondaryButton,
        DialogModal,
        Modal
    },
    name: "TabUsuario",
    data() {
        return {
            processing: false,
            showModal: false,
            verUsuario: false,
            usuarioEliminar: { name: null, id: null },
            usuarioMostrar: { name: null, id: null, email:null, rol:null, foto:null }
        };
    },
    props: {
        usuario: Object,
        errors: Object
    },
    methods: {
        showUsuario(usuario) {
            //vamos a mostrarlo en un modal.
            console.log(usuario);
            this.usuarioMostrar.id=usuario.id;
            this.usuarioMostrar.name=usuario.name;
            this.usuarioMostrar.email=usuario.email;
            this.usuarioMostrar.rol=usuario.rol.nombre;
            this.usuarioMostrar.foto=usuario.profile_photo_path;
            console.log(this.usuarioMostrar);
            this.verUsuario = true;
        },
        editarUsuario(usuario) {
            this.$inertia.get(this.route("usuarios.edit", usuario.id));
        },
        modalEliminar(usuario) {
            this.showModal = true;
            this.usuarioEliminar.name = usuario.name;
            this.usuarioEliminar.id = usuario.id;
        },

        eliminarUsuario() {
            this.processing = true;
            this.$inertia
                .delete(this.route("usuarios.destroy", this.usuarioEliminar.id))
                .then(() => (this.processing = false));

            this.resetModalEliminarUsuario();
        },
        /**
         * Cambia  a null los datos que componen al usuarioEliminar, el cual
         * se utliza para mostrar informacion del usuario que se intenta eliminar
         */
        resetModalEliminarUsuario() {
            this.usuarioEliminar.id = null;
            this.usuarioEliminar.name = null;
        }
    }
};
</script>
