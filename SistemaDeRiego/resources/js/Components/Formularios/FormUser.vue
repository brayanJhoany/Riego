<template>
    <form
        @submit.prevent="$emit('submit')"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        enctype="multipart/form-data"
    >
        <div class="mb-4">
            <text-input
                label="Nombre del usuario"
                v-model="form.name"
                :error="errors.name"
            />
        </div>
        <div class="mb-4">
            <text-input
                label="Correo del usuario"
                v-model="form.email"
                :error="errors.email"
            />
        </div>
        <div class="mb-4">
            <text-input
                label="Contraseña del usuario"
                v-model="form.password"
                :tipo="typePassword"
                :error="errors.password"
            />
        </div>
        <!-- <img :src="form.image" >
        <div class="mb-4">
            <imagen-input
            label="Seleccione un imagen"
            v-model="form.imagen"
            :error="errors.imagen"
            />
        </div> -->

        <!-- <div class="mt-2" v-show="photoPreview">
            <span class="block rounded-full w-20 h-20"
                    :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
            </span>
        </div> -->

       <div class="mb-4">
            <input type="file" class="hidden"
            :ref="form.imagen"
            @change="updatePhotoPreview" />
       </div>


        <!-- ================================= -->
        <div class="mb-4">
            <list-input
                label="Seleccione un rol"
                v-model="form.rol_id"
                :error="errors.rol_id"
                :roles="roles"
            >
            </list-input>
        </div>
        <!-- ============================================ -->
        <div
            class="px-8 py-4 border-t border-gray-200 flex justify-center items-center"
        >
            <slot name="buttons" />
        </div>
    </form>
</template>

<script>
import TextInput from "./TextInput";
import TextAreaInput from "./TexAreaInput";
import ListInput from "./ListInput.vue";
import ImagenInput from './ImagenInput.vue';
import Input from '../../Jetstream/Input.vue';
export default {
    name: "FormUsuer",
    data(){
        return{
            typePassword:"password",
            photoPreview: null,
        }
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
    methods:{
        updatePhotoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.photo.files[0]);
            },
    }
};
</script>
