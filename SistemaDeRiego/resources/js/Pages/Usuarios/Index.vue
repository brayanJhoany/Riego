<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Usuarios
            </h2>
        </template>
        <!-- <div class="container  py-5">
            <div class="grid grid-rows-2 md:grid-rows-6 ">
              <div class="flex  flex-wrap">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Busca por nombre
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text"
                        placeholder="Nombre del usuario"
                    />
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">

                </div>
            </div>
            </div>

        </div> -->

        <!-- <div class="container  py-5">
            <div class="flex  flex-wrap">
                <div class="bg-orange-800  p-4 m-2">Hola</div>
                <div class="bg-blue-700  p-4 m-2">Hola</div>
                <div class="bg-orange-500  p-4 m-2">Hola</div>
                <div class="bg-orange-800  p-4 m-2">Hola</div>
                <div class="bg-blue-700  p-4 m-2">Hola</div>
            </div>
            <div class="grid grid-rows-2 md:grid-rows-6 ...">
             <div class="bg-orange-500  p-4 m-2">Hola</div>
                <div class="bg-orange-800  p-4 m-2">Hola</div>
                <div class="bg-blue-700  p-4 m-2">Hola</div>
            </div>
        </div> -->

        <div class="container  py-5">
            <!-- me esta aliniando de dos columnas -->
            <div class="grid grid-rows-1 text-center">
                <div class="grid grid-cols-2">
                    <div>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                          Busca por nombre
                      </label>
                      <input
                          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                          type="text"
                          placeholder="Nombre del usuario"
                      />
                    </div>

                    <div class="bg-blue-700  p-4 m-2">como</div>
                    <div class="bg-orange-500  p-4 m-2">estas</div>
                </div>
            </div>
            <div class="grid grid-rows-1 text-center">
                <div class="grid grid-cols-1">
                    <div class="bg-white rounded shadow overflow-x-auto">
                        <table class="w-full whitespace-no-wrap ml-6">
                            <tr class="text-left font-bold">
                                <th class=" text-center ml-6 pt-4 pb-4">titulo</th>
                                <th class=" text-center ml-6 pt-4 pb-4">categoria</th>
                                <th class=" text-center ml-6 pt-4 pb-4">nombre del autor</th>
                                <th class=" text-center ml-6 pt-4 pb-4">acciones</th>
                            </tr>
                                <!-- <tab-usuario
                                    v-for="usuario in Usuarios.data"
                                    :key="usuario.id"
                                    :usuario="usuario"
                                /> -->

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
// import TabUsuario from "@/Components/TablaUsuario/TabUsuario";
export default {
    components: { AppLayout },
    data() {
        return {
            fields: ["titulo", "categoria", "nombre_autor"],
            options: [
                { value: null, text: "Seleccione una opción" },
                { value: null, text: "Solo elementos borrados" },
                { value: null, text: "Todos" }
            ],
            form: {}
        };
    },
    props: {
       // Usuarios: Object,
        //filters: Object
    }
};
</script>
