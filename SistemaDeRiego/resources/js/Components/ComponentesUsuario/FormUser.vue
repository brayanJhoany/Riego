<template>
    <form
        @submit.prevent="$emit('submit')"
        class="bg-white shadow-md rounded px-8 pt-2 pb-8 mb-4"
        enctype="multipart/form-data"
    >
        
        
        <div class="grid grid-cols-3 gap-4">
            <div class="col-start-1 col-end-1 ">
            <div class="mb-4   ">
                <label
                    :class="{ 'text-red-400': errors.name }"
                    class="block text-gray-700 text-sm font-bold mb-2"
                >
                    Nombre del usuario
                </label>
                <input
                    v-model="form.name"
                    :error="errors.name"
                    type="text"
                    class="border shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                />
                <div v-if="errors.name" class="text-red-500">{{ errors.name }}</div>
            </div>
            <div class="mb-4   ">
                <label
                    :class="{ 'text-red-400': errors.password }"
                    class="block text-gray-700 text-sm font-bold mb-2"
                >
                    contraseña del usuario
                </label>
                 <input
                        v-model="form.password"
                        :error="errors.password"
                        type="password"
                        class="border shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    />
                <div v-if="errors.password" class="text-red-500">{{ errors.password }}</div>
                <!-- Extra -->
               
            </div>
            <div class="mb-4  ">
                <label
                    :class="{ 'text-red-400': errors.email }"
                    class="block text-gray-700 text-sm font-bold mb-2"
                >
                    Correo del usuario
                </label>
                <input
                    v-model="form.email"
                    :error="errors.email"
                    type="text"
                    class="border shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                />
                <div v-if="errors.email" class="text-red-500">
                    {{ errors.email }}
                </div>
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
                <option v-for="rol in roles" :key="rol.id" v-bind:value="rol.id" >
                    {{ rol.nombre }}
                </option>
            </select>
            <div v-if="errors.rol_id" class="text-red-500">
                {{ errors.rol_id }}
            </div>
            </div>
        </div>

        <div class="col-start-2 col-end-3  ">


            <div class="mb-4">
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
                    class="form-control-file  border shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    @change="obtenerImagen"
                />
                </div>
                <div v-if="errors.profile_photo_path" class="text-red-500">
                    {{ errors.profile_photo_path }}
                </div>
                <div class="mb-4">
                    <figure>
                        <img v-show="imagen != null" width="200" height="400" :src="imagen" alt="foto perfil"
                            class="rounded-full"
                        >
                    </figure>
                </div>
            </div>
        </div>
        

        
        


  

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
            show:true,
            typePassword: "password",
            imagenMiniatura: null
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
    computed:{
        imagen(){
            return this.imagenMiniatura
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
        obtenerImagen(e){
            let file = e.target.files[0];
           // console.log(file);
            this.form.profile_photo_path = file;
            this.cargarImagen(file);
        },
        cargarImagen(file){
            let reader = new FileReader();

            reader.onload = (e) =>{
                this.imagenMiniatura = e.target.result
            }

            reader.readAsDataURL(file);
        }
    }
};
</script>
