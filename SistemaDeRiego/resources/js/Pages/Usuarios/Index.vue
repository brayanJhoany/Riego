<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Usuarios
            </h2>
        </template>
        <div class="grid grid-cols-3 gap-2 my-2">
            <div class="text-center mr-10  col-start-3 ">
                    <inertia-link :href="route('usuarios.create')" >
                    <button 
                        class="bg-green-500 rounded-lg hover:bg-green-800">
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
        

            <!-- Modal -->

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

            <div  v-if="nuevoUsuarioModal" class="fixed overflow-x-hidden overflow-y-auto inset-0 flex justify-center items-center z-50">
                <div
                    class="relative mx-auto w-auto max-w-2xl"
                >
                    <div class="bg-white w-full  rounded max-w-2xl flex flex-col">
                        <div class="text-2xl font-bold text-center">Nuevo usuario</div>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Necessitatibus laborum aut sit culpa quisquam harum nesciunt rerum saepe 
                            officia ex enim delectus, aspernatur nulla? Repudiandae animi reiciendis eum quos aut!
                        </span>
                        <button class=" rounded bg-green-500 text-white px-6 mt-1 py-2 w-3/12 m-auto mb-4" @click="nuevoUsuarioModal=false">Close</button>
                    </div>
                </div>
            </div>

            <div v-if="nuevoUsuarioModal"
            class="absolute z-40 inset-0  opacity-25 bg-black">

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
            nuevoUsuarioModal:false,
            fields: ["titulo", "categoria", "nombre_autor"],

            form: {
                search: this.filters.search,
                trashed: this.filters.trashed
            },
            usuario:{
                nombre:null,
                rol_id:null,
                email:null,
                password:null
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
        },
        

    }
};
</script>
