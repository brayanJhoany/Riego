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

        <div>
            <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
                <img
                    class="w-32 h-32 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto"
                    src="/sarah-dayan.jpg"
                    alt=""
                    width="384"
                    height="512"
                />
                <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                    <blockquote>
                        <p class="text-lg font-semibold">
                            “Tailwind CSS is the only framework that I've seen
                            scale on large teams. It’s easy to customize, adapts
                            to any design, and the build size is tiny.”
                        </p>
                    </blockquote>
                    <figcaption class="font-medium">
                        <div class="text-cyan-600">
                            Sarah Dayan
                        </div>
                        <div class="text-gray-500">
                            Staff Engineer, Algolia
                        </div>
                    </figcaption>
                </div>
            </figure>
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
            // form: {
            //     search: this.filters.search,
            //     trashed: this.filters.trashed
            // }
        };
    },
    props: {
        usuarios: Object,
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
