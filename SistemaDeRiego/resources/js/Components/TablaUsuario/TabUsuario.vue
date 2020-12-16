<template>
    <tr>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                        {{ usuario.name }}
                    </div>
                </div>
            </div>
        </td>

        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ usuario.email }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <span
                v-if="usuario.deleted_at"
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-700 text-white"
            >
            Desactivada
            </span>
            <span
                v-else
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
            >
            Activa
            </span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ usuario.rol.nombre }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-2 mr-2">Ver</a>

                <!-- <inertia-link
                class="px-4 flex items-center"
                :href="route('usuarios.edit', usuario.id)"
            >
                <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-2 mr-2">Editar</a>
            </inertia-link> -->

            <a @click="editarUsuario(usuario)"  class="text-indigo-600 hover:text-indigo-900 ml-2 mr-2">Editar</a>
            <a @click="destroy(usuario.id)" class="text-indigo-600 hover:text-indigo-900">Eliminar</a>
        </td>
    </tr>
</template>

<script>
import Button from "../../Jetstream/Button.vue";
export default {
    components: { Button },
    name: "TabUsuario",
    props: {
        usuario: Object,
        errors: Object
    },
    methods: {
        editarUsuario(usuario){
           this.$inertia.get(this.route('usuarios.edit',usuario.id));
        },
        destroy($id) {
            this.processing=true;
            this.$inertia.delete(this.route('usuarios.destroy',$id))
                .then(()=> this.processing=false)
        }
    }
};
</script>
