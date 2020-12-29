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
                        <inertia-link :href="route('campos.index')">
                            <button
                                class="mr-10 bg-red-400 rounded-lg transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none"
                            >
                                Cancelar
                            </button>
                        </inertia-link>
                        <loading-button
                            :loading="processing"
                            class="bg-indigo-400 rounded-lg hover:bg-indigo-900 focus:ring-opacity-50
                             text-white font-bold transform motion-safe:hover:scale-110 hover:scale-110 motion-reduce:transform-none"
                            type="submit
                            "
                        >
                            <p class="my-auto mx-auto">Editar Campo</p>
                        </loading-button>
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
