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
                        <inertia-link :href="route('usuarios.index')">
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
                            <p class="my-auto mx-auto">Registrar usuario</p>
                        </loading-button>
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
                rol_id:null,
                profile_photo_path:File
            }
        };
    },
    methods: {
        submit() {

            //Creamos el formData
                var data = new  FormData();
                data.append('name', this.form.name);
                data.append('email', this.form.email);
                data.append('password', this.form.password);
                data.append('rol_id', this.form.rol_id);
                data.append('profile_photo_path', this.form.profile_photo_path);
                data.append('_method', 'POST');

            console.log(data);
               this.processing=true;
               this.$inertia.post(this.route('usuarios.store'),data)
                 .then(()=>this.processing=false);
        }
    }
};
</script>
