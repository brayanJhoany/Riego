<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Usuarios
            </h2>
        </template>
        <div class="container py-5">
            <!-- me esta aliniando de dos columnas -->
            <div class="grid grid-rows-1 text-center">
                <div class="grid grid-cols-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label
                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        >
                            Busca por nombre
                        </label>
                        <input
                            v-model="form.search"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="text"
                            placeholder="Nombre del usuario"
                        />
                    </div>
                    <div>
                        <button
                            class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-3 mt-5 px-4 rounded"
                            type="button"
                            @click="reset"
                        >
                            Restablecer filtros
                        </button>
                    </div>

                    <div class="p-4 m-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            >
                                Estados
                            </label>
                            <div class="relative">
                                <select
                                    v-model="form.trashed"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                >
                                    <option value="with"
                                        >Todos los usuarios</option
                                    >
                                    <option value="only"
                                        >Sólo usuarios borrados</option
                                    >
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                                >
                                    <svg
                                        class="fill-current h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div
                        class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                    >
                        <div
                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                        >
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Nombre
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Correo
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Estado
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Rol
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                    v-if="usuarios.total > 0"
                                >
                                    <TabUsuario
                                        v-for="usuario in usuarios.data"
                                        :key="usuario.id"
                                        :usuario="usuario"
                                    />
                                </tbody>
                                <tbody
                                    v-else
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr>
                                        <td class="text-sm text-gray-500">
                                            <div
                                                class="text-sm text-gray-500 mr-2"
                                            >
                                                No hay datos
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                No hay datos
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                        >
                                            No hay datos
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                        >
                                            No hay datos
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                        ></td>
                                    </tr>

                                    <!-- More rows... -->
                                </tbody>
                            </table>
                        </div>
                        <pagination :links="usuarios.links" />
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import TabUsuario from "@/Components/TablaUsuario/TabUsuario";
import debounce from "lodash/debounce";
import pickBy from "lodash/pickBy";
import mapValues from "lodash/mapValues";
import Pagination from "../../Components/TablaUsuario/Pagination.vue";
export default {
    components: { AppLayout, TabUsuario, Pagination },
    data() {
        return {
            fields: ["titulo", "categoria", "nombre_autor"],

            form: {
                search: this.filters.search,
                trashed: this.filters.trashed
            } 
        };
    },
    props: {
        usuarios: Object,
        filters: Object
    },
    watch: {
        form: {
            handler: debounce(function() {
                let query = pickBy(this.form);
                this.$inertia.replace(this.route("usuarios.index", query));
            }, 500),
            deep: true
        }
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null);
        }
    }
};
</script>
