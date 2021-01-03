<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar el usuario {{ usuario.name }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form-user
                    :errors="errors"
                    :form="form"
                    @submit="submit"
                    :roles="roles"
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
                </form-user>
            </div>
        </div>
    </app-layout>
</template>

<script>
import FormUser from "../../Components/ComponentesUsuario/FormUser.vue";
import LoadingButton from "../../Components/Formulario/LoadingButton.vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import axios from "axios";
export default {
    components: { AppLayout, FormUser, LoadingButton },
    props: {
        errors: Object,
        usuario: Object,
        roles: Array
    },
    data() {
        return {
            processing: false,
            form: this.$inertia.form({
                _method: "PUT",
                id:this.usuario.id,
                name: this.usuario.name,
                email: this.usuario.email,
                password: this.usuario.password,
                rol_id: this.usuario.rol_id,
                profile_photo_path: this.usuario.profile_photo_path
            })
        };
    },
    methods: {
        submit() {
            var data2 = new FormData();

            data2.append("name", this.form.name);
            data2.append("email", this.form.email);
            data2.append("password", this.form.password);
            data2.append("rol_id", this.form.rol_id);
            data2.append("profile_photo_path", null);

            if (typeof this.form.profile_photo_path == "string") {
                this.form.profile_photo_path = null;
            }
            this.processing = true;
            this.form.post(
                this.route("usuarios.update", this.usuario.id),
                this.form
            );
            this.processing = false;
        }
    }
};
</script>
