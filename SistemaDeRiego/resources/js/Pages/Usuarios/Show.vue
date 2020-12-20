<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-6">
                <p class="col-start-1 col-end-2">
                    Usuario
                </p>
                <!-- Filtrar usuarios -->
                <div class="col-start-3 col-end-4   md:w-45 px-3 mb-6 md:mb-0">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >
                        Busca Usuario
                    </label>
                    <input
                        v-model="form.search"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text"
                        placeholder="Nombre del usuario"
                    />
                </div>
                <div class="col-start-5 col-end-6  text-center mr-10   ">
                <inertia-link :href="route('usuarios.create')">
                    <button class="bg-green-500 rounded-lg hover:bg-green-800">
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
    </app-layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'
export default {
    name:"showUser",
    data(){
        return{

        }
    },
    components:{AppLayout},

}
</script>

