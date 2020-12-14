<template>
    <!-- <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
        <td class="border-t">
            {{ usuario.name }}
        </td>
        <td class="border-t text-c">
            {{ usuario.email }}
        </td>
        <td class="border-t">
            {{ usuario.rol.nombre }}
        </td>
          <td class="border-t">
            <div v-if="usuario.deleted_at">
                Desactivada
            </div>
            <div v-else>
                Activa
            </div>
        </td>

    </tr> -->

    <tr>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <!-- <div class="flex-shrink-0 h-10 w-10">
                    <img
                        class="h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                        alt=""
                    />
                </div> -->
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
            <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-2 mr-2">Editar</a>
            <a href="#" class="text-indigo-600 hover:text-indigo-900">Eliminar</a>
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
    methods: {}
};
</script>
