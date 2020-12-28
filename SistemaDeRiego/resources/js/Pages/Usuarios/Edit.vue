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
                            <p class="my-auto mx-auto">Editar usuario</p>
                        </loading-button>
                    </template>
                </form-user>
            </div>
        </div>

    </app-layout>
</template>

<script>
import FormUser from '../../Components/ComponentesUsuario/FormUser.vue';
import LoadingButton from '../../Components/Formulario/LoadingButton.vue';
import AppLayout from "../../Layouts/AppLayout.vue";
import axios from 'axios';
export default {
    components: { AppLayout, FormUser,LoadingButton },
    props: {
        errors: Object,
        usuario: Object,
        roles: Array
    },
    data() {
        return {
            processing: false,
            form: {
                name: this.usuario.name,
                email: this.usuario.email,
                password: this.usuario.password,
                rol_id: this.usuario.rol_id,
                profile_photo_path : this.usuario.profile_photo_path
            }
        };
    },
    methods: {
        submit() {
                var data2 = new  FormData();
                
                data2.append('name', this.form.name);
                data2.append('email', this.form.email);
                data2.append('password', this.form.password);
                data2.append('rol_id', this.form.rol_id);
                data2.append('profile_photo_path', null);
                // PUT|PATCH

            console.log(data2);
            this.processing = true
                this.$inertia.put(this.route('usuarios.update', this.usuario.id), this.form)
                    .then(() => this.processing = false)
        },

    }
};
</script>
