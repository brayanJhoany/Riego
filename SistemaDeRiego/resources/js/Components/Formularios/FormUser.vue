<template>
    <form
        @submit.prevent="$emit('submit')"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
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
export default {
    name: "FormUsuer",
    data(){
        return{
            typePassword:"password"
        }
    },
    components: {
        TextInput,
        TextAreaInput,
        ListInput
    },
    props: {
        errors: Object,
        form: Object,
        roles: Array
    }
};
</script>
