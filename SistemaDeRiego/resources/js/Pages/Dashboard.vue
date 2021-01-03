<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Graficos
            </h2>
        </template>

        <!-- <div
            class="grid grid-cols-3  gap-4 | mt-4 mx-4 | text-center justify-items-center "
        >
            <button
                @click="show = !show"
                class=" col-start-1 col-end-4  block | h-10 w-32 | bg-green-500 |  focus:bg-gray-600
            | transition duration-500 ease-in-out hover:bg-red-600 transform hover:-translate-y-1 hover:scale-110"
            >
                <p class="font-bold">abrir Modal</p>
            </button>
            <button
                class="col-span-1  block | bg-blue-500 |  focus:bg-gray-600"
            >
                Abrir modal span
            </button>
            <button class="block | bg-red-500 |  focus:bg-gray-600">
                Abrir modal
            </button>
            <button class="block | bg-green-500 |  focus:bg-gray-600">
                Abrir modal
            </button>
            <button class="block | bg-yellow-400 |  focus:bg-gray-600">
                Abrir modal
            </button>
        </div> -->

        <modal :show="show">
            <div class="p-2 text-left | font-extrabold ">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Corrupti quo recusandae, veniam laboriosam quisquam consequuntur
                     rerum quas eum nobis incidunt nihil illo maxime iure, nisi ipsa
                      reiciendis asperiores! Est, blanditiis.
                </p>
            </div>
            <div class="px-6 py-4 bg-gray-100 | grid grid-cols-3">
                <button
                    @click="show = !show"
                    class="py-2 px-2 | bg-red-400 | rounded-lg block | text-center | col-start-2"
                >
                    cerrar
                </button>
            </div>
        </modal>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import Modal from "../Jetstream/Modal.vue";

export default {
    components: {
        AppLayout,
        Welcome,
        Modal
    },
    data() {
        return {
            show: false,
            maxWidth: "xl"
        };
    }
};
</script>
