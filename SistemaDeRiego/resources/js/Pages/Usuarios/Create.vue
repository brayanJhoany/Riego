<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo usuario
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
import LoadingButton from "../../Components/Formulario/LoadingButton";
import AppLayout from "../../Layouts/AppLayout.vue";
export default {
    name: "CreateUser",
    components: { AppLayout, FormUser, LoadingButton },
    props: {
        errors: Object,
        roles: Array
    },
    data() {
        return {
            processing: false,
            form: {
                name: null,
                email: null,
                password: null,
                rol_id: null,
                profile_photo_path: null
            }
        };
    },
    methods: {
        submit() {
            //Creamos el formData
            var data = new FormData();
            data.append("name", this.form.name);
            data.append("email", this.form.email);
            data.append("password", this.form.password);
            data.append("rol_id", this.form.rol_id);
            console.log(this.form);
            data.append("_method", "POST");
            data.append("profile_photo_path", this.form.profile_photo_path);

            if (this.form.profile_photo_path == null) {
                this.processing = true;
                this.$inertia
                    .post(this.route("usuarios.store"), this.form)
                    .then(() => (this.processing = false));
            } else {
                this.processing = true;
                this.$inertia
                    .post(this.route("usuarios.store"), data)
                    .then(() => (this.processing = false));
            }

            // console.log(data);
            // this.processing = true;
            // this.$inertia
            //     .post(this.route("usuarios.store"), data)
            //     .then(() => (this.processing = false));
        }
    }
};
</script>
