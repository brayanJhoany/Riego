<template>
    <div class="w-full">
        <label
            :class="{ 'text-red-400': error }"
            class="block text-gray-700 text-sm font-bold mb-2"
            :for="id"
        >
            {{ label }}
        </label>
        <select
            :id="id"
            v-bind="$attrs"
            :class="{ 'border-red-400': error  }"
            :value="value"
            @input="$emit('input', $event.target.value)"
            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >   
        <option value="" selected disabled>Agricultor</option>
            <option v-for="dato in listaUsuarios" :key="dato.id" v-bind:value="dato.id" 
                :selected="dato.name "
            >
                {{ dato.name }}
            </option>

        </select>
        <div v-if="error" class="text-red-500">{{ error }}</div>

       
    </div>
</template>

<script>
import FormInput from "../../Mixins/FormInput";
export default {
    name: "TextInput",
    mixins: [FormInput],
    props:{
        listaUsuarios:Array
    }
};
</script>
