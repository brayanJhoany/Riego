<template>
    <app-layout>
        <template #header>
            <p class="col-start-1 col-end-2">
                Editar Campo
            </p>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form-campo
                    :errors="errors"
                    :form="form"
                    @submit="submit"
                    :texturas="texturasSuelo"
                    :listaUsuarios="listaUsuarios"
                >
                    <template #buttons>
                        <div class="grid grid-cols-6 gap-2">
                            <div class="col-start-2">
                                <inertia-link :href="route('usuarios.index')">
                                    <button
                                        class="px-6 py-2 |   bg-red-700  hover:bg-indigo-900 focus:ring-opacity-50 | text-white font-bold  rounded-lg |transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none"
                                    >
                                        Cancelar
                                    </button>
                                </inertia-link>
                            </div>
                            <div class="col-start-4">
                                <loading-button
                                :loading="processing"
                                class=" px-6 py-2 |   bg-indigo-700  hover:bg-indigo-900 focus:ring-opacity-50 | text-white font-bold  rounded-lg |transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none"
                                type="submit
                            "
                            >
                                <p class="my-auto mx-auto">Registrar</p>
                            </loading-button>
                            </div>
                        </div>
                    </template>
                </form-campo>
            </div>
        </div>
    </app-layout>
</template>

<script>
import FormCampo from "../../Components/ComponentesCampo/FormCampo.vue";
import LoadingButton from "../../Components/Formulario/LoadingButton.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
export default {
    name: "EditCampo",
    components: { AppLayout, LoadingButton, FormCampo },
    props: {
        campo: null,
        texturasSuelo: null,
        listaUsuarios: null,
        errors: Object
    },
    data() {
        return {
            processing: false,
            form: {
                id: this.campo.id,
                nombre: this.campo.nombre,
                texturaDeSuelo_id: this.campo.texturaDeSuelo_id,
                user_id: this.campo.user_id
            }
        };
    },
    methods: {
        submit() {
            console.log(this.form);
            // if (this.$page.user.rol_id == 2) {
            //     this.form.user_id = this.$page.user.id;
            // }
            this.processing = true;
            this.$inertia
                .put(this.route("campos.update", this.form.id), this.form)
                .then(() => (this.processing = false));
        }
    }
};
</script>
