<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    <h2
                        class="font-semibold text-xl text-gray-800 leading-tight"
                    >
                        Lista de Campos
                    </h2>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
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
                <div class="text-right  bg-teal-800  ">
                    <button class="bg-yellow-400">
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
        <!-- v-for="campo in campos.data" :key="campo.id" -->
         <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4  mt-5 ml-5 mr-5">
            <div
                class="flex flex-wrap  w-64"
                v-for="campo in campos.data"
                :key="campo.id"
            >
                <div class="rounded-lg overflow-hidden border mb-4">
                    <div>
                        <img class="object-cover" :src="card.imageUrl" />
                    </div>
                    <div class="container mb-0">
                        <div class=" grid grid-rows-1 py-2 ">
                            <p class="mt-0 mb-1">Nombre: {{campo.nombre}}</p>
                        </div>
                        <div class="grid grid-cols-2 col-end-10 py-2 mb-0">
                            <p class="mt-0 mb-1  col-start-1 col-end-10">
                                Tipo de suelo: arcilloso
                            </p>
                            <button class=" mx-auto col-start-11">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import Button from "../../Jetstream/Button.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
export default {
    name: "IndexCampo",
    components: { AppLayout, Button },
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
<style>
border {
  border-top-color: #CC0000;
  border-right-color: blue;
  border-bottom-color: #00FF00;
  border-left-color: #CCC;
}
</style>
