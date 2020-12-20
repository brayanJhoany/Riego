<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-3 gap-1">
                <div class="col-start-1">
                    <h2
                        class="font-semibold text-xl text-gray-800 leading-tight"
                    >
                        Lista de Campos
                    </h2>
                </div>
                <div class="col-start-2   md:w-45 px-3 mb-6 md:mb-0">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >
                        Busca Campo
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text"
                        placeholder="Nombre del usuario"
                    />
                </div>
                <div class=" col-start-3 text-center    ">
                    <button class="bg-green-500 rounded-lg">
                        <svg
                            width="30"
                            height="30"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </template>
        <!-- Para usuarios regulares -->
        <div
            class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4  mt-5 ml-5 mr-5 "
            v-if="$page.user.rol_id == 2"
        >
            <CardCam
                class="flex flex-wrap  w-64"
                v-for="campo in campos.data"
                :key="campo.id"
                :campo="campo"
            />
        </div>
        <!-- Para administradores -->
        <div
            class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4  mt-5 ml-5 mr-5"
            v-else
        >
            <!-- <div
                class="flex flex-wrap  w-64"
                v-for="usuario in campos.data"
                :key="usuario.id"
            > -->
                <CardCam
                    class="flex flex-wrap  w-64"
                    v-for="campo in campos.data"
                    :key="campo.id"
                    :campo="campo"
                />
            <!-- </div> -->
        </div>
            <div v-if="$page.user.rol_id == 1">
                <pagination :links="campos.links" />
            </div>
    </app-layout>
</template>

<script>
import CardCam from "../../Components/CardCam.vue";
import Pagination from "../../Components/TablaUsuario/Pagination.vue";
import Button from "../../Jetstream/Button.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
export default {
    name: "IndexCampo",
    components: { AppLayout, Button, CardCam, Pagination },
    data() {
        return {
            card: {
                imageUrl: "/storage/MisImagenes/fondo.jpg"
            }
            // form: {
            //     search: this.filters.search,
            //     trashed: this.filters.trashed
            // }
        };
    },
    props: {
        campos: Object,
        filters: Object
    },
    watch: {
        // form: {
        //     handler: debounce(function() {
        //         let query = pickBy(this.form);
        //         this.$inertia.replace(this.route("usuarios.index", query));
        //     }, 500),
        //     deep: true
        // }
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null);
        }
    }
};
</script>

