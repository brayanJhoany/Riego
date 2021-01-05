<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-6 |">
                <p class="col-start-1 col-end-2">Lista de Usuarios</p>
                <!-- Filtrar usuarios -->
                <div class="col-start-3 col-end-4 md:w-45 px-3 mb-6 md:mb-0">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >
                        Busca Usuario
                    </label>
                    <input
                        v-model="form.search"
                        class="appearance-none block w-full | bg-gray-200 text-gray-700 border border-gray-200 focus:bg-white focus:border-gray-500| rounded leading-tight focus:outline-none | py-2 px-4"
                        type="text"
                        placeholder="Nombre del usuario"
                    />
                </div>
                <div class="col-start-5 col-end-6 text-center mr-10">
                    <inertia-link :href="route('usuarios.create')">
                        <button
                            class="bg-green-500 rounded-lg hover:bg-green-800"
                        >
                            <svg
                                width="35"
                                height="35"
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
                    </inertia-link>
                </div>
            </div>
        </template>

        <div class="flex flex-col | py-4 px-6 | bg-red-300 ">
            <div class="overflow-x-auto max-h-96 ">
                <table class="divide-y divide-gray-200 min-w-full min-h-full ">
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
                <tbody v-else class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="text-sm text-gray-500">
                            <div class="text-sm text-gray-500 mr-2">
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
            <div class="flex self-center flex-">
                <pagination :links="usuarios.links" />
            </div>
        </div>

        <!-- Tabla de los usuarios -->
        <!-- <div class="flex flex-col | pt-4 px-6 | min-h-full">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                >
                    <div
                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg | h-full"
                    >
                        <table
                            class="divide-y divide-gray-200 min-w-full min-h-full"
                        >
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
                                        <div class="text-sm text-gray-500 mr-2">
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

                            </tbody>
                        </table>
                    </div>
                    <div class="flex self-center flex-">
                        <pagination :links="usuarios.links" />
                    </div>
                </div>
            </div>
        </div> -->
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import TabUsuario from "@/Components/ComponentesUsuario/TabUsuario";
import debounce from "lodash/debounce";
import pickBy from "lodash/pickBy";
import mapValues from "lodash/mapValues";
import Pagination from "../../Components/Global/Pagination.vue";

export default {
    components: { AppLayout, TabUsuario, Pagination },
    data() {
        return {
            nuevoUsuarioModal: false,
            fields: ["titulo", "categoria", "nombre_autor"],

            form: {
                search: this.filters.search,
                trashed: this.filters.trashed
            },
            usuario: {
                nombre: null,
                rol_id: null,
                email: null,
                password: null,
                profile_photo_path: null
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

<style></style>
