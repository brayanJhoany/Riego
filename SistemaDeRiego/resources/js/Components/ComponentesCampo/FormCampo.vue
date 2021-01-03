<template>
    <form
        @submit.prevent="$emit('submit')"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        enctype="multipart/form-data"
    >
        <div v-if="$page.user.rol_id==1" class="mb-4">
            <div class="mb-4">
                <label :class="{ 'text-red-400': errors.user_id }"
                    class="block text-gray-700 text-sm font-bold mb-2" >
                    Seleccione el usuario
                </label>
                <select
                required
                    v-model="form.user_id"
                    :error="errors.user_id"
                    v-bind="$attrs"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                <!-- <option selected="true" disabled="disabled"  >seleccione la marca</option> -->
                    <option v-for="usuario in listaUsuarios" :key="usuario.id" v-bind:value="usuario.id" >
                        {{ usuario.name }}
                    </option>
                </select>
                <div v-if="errors.user_id" class="text-red-500">
                    {{ errors.user_id }}
                </div>
            </div>

        </div>
        <div class="mb-4">
            <text-input
                label="Nombre del campo"
                v-model="form.nombre"
                :error="errors.nombre"
            />
        </div>
        <div class="mb-4">
            <label :class="{ 'text-red-400': errors.texturaDeSuelo_id }"
                    class="block text-gray-700 text-sm font-bold mb-2" >
                    Seleccione la textura de su campo
                </label>
                <select
                    required
                
                    v-model="form.texturaDeSuelo_id"
                    :error="errors.texturaDeSuelo_id"
                    v-bind="$attrs"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                <!-- <option selected="true" disabled="disabled"  >seleccione la marca</option> -->
                    <option v-for="textura in texturas" :key="textura.id" v-bind:value="textura.id" >
                        {{ textura.nombre }}
                    </option>
                </select>
                <div v-if="errors.texturaDeSuelo_id" class="text-red-500">
                    {{ errors.texturaDeSuelo_id }}
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
import ImagenInput from '../Formulario/ImagenInput.vue';
import Input from '../../Jetstream/Input.vue';
import ListInputUsuario from '../Formulario/ListInputUsuario.vue';
import ListInputCampo from '../Formulario/ListInputCampo.vue';
export default {
    name:"FormCampo",
    components: {
        TextInput,
        TextAreaInput,
        ImagenInput,
        Input,
        ListInputUsuario,
        ListInputCampo
    },
    props: {
        errors: Object,
        form: Object,
        texturas: Array,
        listaUsuarios:Array
    },
    data(){
        return{
            tipo:"Number",
        }
    }

};
</script>
