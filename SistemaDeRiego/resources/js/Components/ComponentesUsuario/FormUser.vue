<template>
    <form
        @submit.prevent="$emit('submit')"
        class="bg-white shadow-md rounded px-8 pt-2 pb-8 mb-4"
        enctype="multipart/form-data"
    >
        <div class="grid grid-cols-12 | mt-5">
            <div class=" col-start-1 col-end-5">
                <div class="flex w-full flex-wrap | mb-4 | items-stretch | relative  ">
                    <label :class="{ 'text-red-400': errors.name }"
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Nombre 
                    </label>

                    <input
                        v-model="form.name"
                        :error="errors.name"
                        type="text"
                        class="px-3 py-2 w-full pr-10  | placeholder-gray-400 text-gray-700 relative  bg-white rounded border | text-sm shadow outline-none focus:outline-none focus:shadow-outline "
                            />
                    <div v-if="errors.name" class="text-red-500">
                        {{ errors.name }}
                    </div>
                    <span
                        class="z-10 h-full leading-snug font-normal  text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-8"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="h-6 w-6 text-gray-500"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                        </svg>
                    </span>
                </div>
                <div class="flex w-full flex-wrap | mb-4 | items-stretch | relative  ">
                    <label :class="{ 'text-red-400': errors.password }"
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Contraseña 
                    </label>

                    <input
                        v-model="form.password"
                        :error="errors.password"
                        type="password"
                        class="px-3 py-2 w-full pr-10  | placeholder-gray-400 text-gray-700 relative  bg-white rounded border | text-sm shadow outline-none focus:outline-none focus:shadow-outline "
                            />
                    <div v-if="errors.password" class="text-red-500">
                        {{ errors.password }}
                    </div>
                    <span
                        class="z-10 h-full leading-snug font-normal  text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-8"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        
                            class="h-6 w-6 text-gray-500"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                </div>
                <div class="flex w-full flex-wrap | mb-4 | items-stretch | relative  ">
                    <label :class="{ 'text-red-400': errors.email }"
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Correo electronico
                    </label>

                    <input
                        v-model="form.email"
                        :error="errors.email"
                        type="text"
                        class="px-3 py-2 w-full pr-10  | placeholder-gray-400 text-gray-700 relative  bg-white rounded border | text-sm shadow outline-none focus:outline-none focus:shadow-outline "
                            />
                    <div v-if="errors.email" class="text-red-500">
                        {{ errors.email }}
                    </div>
                    <span
                        class="z-10 h-full leading-snug font-normal  text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-8"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6 text-gray-500"
                        
                        >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </span>
                </div>
                
                
                <div class="mb-4 ">
                    <label
                        :class="{ 'text-red-400': errors.rol_id }"
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Seleccione el rol del usuario
                    </label>
                    <select
                        required9
                        v-model="form.rol_id"
                        :error="errors.rol_id"
                        v-bind="$attrs"
                        type="password"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <!-- <option selected="true" disabled="disabled"  >seleccione la marca</option> -->
                        <option
                            v-for="rol in roles"
                            :key="rol.id"
                            v-bind:value="rol.id"
                        >
                            {{ rol.nombre }}
                        </option>
                    </select>
                    <div v-if="errors.rol_id" class="text-red-500">
                        {{ errors.rol_id }}
                    </div>
                </div>

                

               
            </div>
            <div class="col-start-6 col-end-12  | text-left | r">
                <div class="grid grid-cols-8">
                    <div class=" col-start-2 col-end-7 |  py-4 items-center">
                    <label
                        :class="{ 'text-red-400': errors.profile_photo_path }"
                        class=" block text-gray-700 text-sm font-bold mb-2"
                    >
                        Seleccione una imagen
                    </label>
                    <input
                        :name="form.profile_photo_path"
                        type="file"
                        accept="image/*"
                        :error="errors.profile_photo_path"
                        class="w-auto py-2  | leading-tight  | text-gray-700 |  |   form-control-file  border  appearance-none rounded-lg   "
                        @change="obtenerImagen"
                    />
                    <div v-if="errors.profile_photo_path" class="text-red-500">
                        {{ errors.profile_photo_path }}
                    </div>
                </div>
                <div class="mb-4  col-start-3 col-end-7 text-center">
                    <figure v-show="imagen != null">
                        <img
                            width="200"
                            height="400"
                            :src="imagen"
                            alt="foto perfil"
                            class="rounded-lg justify-items-center"
                        />
                    </figure>
                </div>
                </div>
            </div>
        </div>

        <!-- Botones -->
        <div
            class="px-8 py-4 border-t border-gray-200 flex justify-center items-center"
        >
            <slot name="buttons" />
        </div>
    </form>
</template>

<script>
import TextInput from "../Formulario/TextInput";
import TextAreaInput from "../Formulario/TexAreaInput";
import ListInput from "../Formulario/ListInput.vue";
import ImagenInput from "../Formulario/ImagenInput.vue";
import Input from "../../Jetstream/Input.vue";
export default {
    name: "FormUsuer",
    data() {
        return {
            mostrar: true,
            show: true,
            typePassword: "password",
            imagenMiniatura: this.form.profile_photo_path
        };
    },
    components: {
        TextInput,
        TextAreaInput,
        ListInput,
        ImagenInput,
        Input
    },
    props: {
        errors: Object,
        form: Object,
        roles: Array
    },
    computed: {
        imagen() {
            return this.imagenMiniatura;
        }
    },
    methods: {
        updatePhotoPreview() {
            const reader = new FileReader();

            reader.onload = e => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(this.$refs.photo.files[0]);
        },
        obtenerImagen(e) {
            let file = e.target.files[0];
            // console.log(file);
            this.form.profile_photo_path = file;
            this.cargarImagen(file);
        },
        cargarImagen(file) {
            let reader = new FileReader();

            reader.onload = e => {
                this.imagenMiniatura = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }
};
</script>
