<template>
    <div class="rounded-lg overflow-hidden border mb-4">
        <div>
            <button
                @click="abrirMenu = !abrirMenu"
                class=" overflow-hidden   absolute | rounded-lg  "
            >
                <svg
                    class="overflow-auto"
                    width="30"
                    height="30"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>

            <div
                :class="{ block: abrirMenu, hidden: !abrirMenu }"
                class="bg-gray-100 rounded-lg | p-2 py-2 mt-10 w-48 | shadow-xl absolute  "
            >
                <a
                    @click="editarCampo(campo)"
                    class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white "
                    >Editar</a
                >
                <a
                    @click="modalEliminar(campo)"
                    class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white | border-t border-gray-300 "
                    >Eliminar</a
                >
            </div>
            <img class="object-cover" :src="card.imageUrl" />
        </div>
        <div class="container mb-0">
            <div v-if="$page.user.rol_id ==1" class=" grid grid-rows-1 py-2 ">
                <p  class="mt-0 mb-1 ml-2 | flex-wrap truncate | font-semibold   ">Agricultor: {{ campo.usuario.name }}</p>
                <p class="mt-0 mb-1 ml-2 | flex-wrap truncate | font-thin ">
                    Campo: {{ campo.nombre }}
                </p>
            </div>

            <div v-else class=" grid grid-rows-1 py-2 ">
                <!-- f<p v-if="$page.user.rol_id =1" class="mt-0 mb-1 ml-2 | flex-wrap truncate | font-semibold   ">Agricultor: {{ campo.usuario.name }}</p> -->
                <p class="mt-0 mb-1 ml-2 | flex-wrap truncate | font-thin ">
                    Campo: {{ campo.nombre }}
                </p>
            </div>
            <div></div>
        </div>

        <jet-confirmation-modal :show="showModal" @close="showModal = false">
            <template #title>
                Eliminar el usuario
            </template>

            <template #content>
                ¿Estás seguro que quieres eliminar el Usuario ?
            </template>

            <template #footer>
                <jet-secondary-button @click.native="showModal = false">
                    Cancelar
                </jet-secondary-button>

                <jet-danger-button
                    @click.native="eliminarCampo"
                    class="ml-2"
                    :class="{ 'opacity-25': processing }"
                    :disabled="processing"
                >
                    Eliminar
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </div>
</template>

<script>
import Button from "../../Jetstream/Button";
import JetConfirmationModal from "../../Jetstream/ConfirmationModal";
import JetSecondaryButton from "../../Jetstream/SecondaryButton";
import JetDangerButton from "../../Jetstream/DangerButton";
export default {
    name: "TabUsuario",
    data() {
        return {
            abrirMenu: false,
            processing: false,
            showModal: false,
            card: {
                imageUrl: "/storage/MisImagenes/fondo.jpg"
            },
            campoEliminar: { id: null }
        };
    },
    components: {
        Button,
        JetConfirmationModal,
        JetDangerButton,
        JetSecondaryButton
    },
    props: {
        campo: Object,
        errors: Object
    },
    methods: {
        editarCampo(campo) {
            this.abrirMenu = false;
            this.$inertia.get(this.route("campos.edit", campo.id));
        },
        modalEliminar(campo) {
            this.showModal = true;
            this.abrirMenu = false;
            // this.usuarioEliminar.name=usuario.name;
            this.campoEliminar.id = campo.id;
        },

        /**
         * Permite el eliminado logico de la reprecentación de un campo.
         */
        eliminarCampo() {
            this.processing = true;
            this.$inertia
                .delete(this.route("campos.destroy", this.campoEliminar.id))
                .then(() => (this.processing = false));

            this.resetModalEliminarCampo();
        },
        /**
         * Restablece los campos del objeto campo a eliminar a nulos, para poder volver a
         * reutilizarlos en posteriores eliminaciones.
         */
        resetModalEliminarCampo() {
            this.campo.id = null;
            // this.usuarioEliminar.name=null;
        }
    }
};
</script>
