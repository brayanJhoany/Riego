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
            @input="$emit('input', $event.target.value2)"
            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >   
            <option value selected disabled> Regular</option>
            <option v-for="rol in roles" :key="rol.id" v-bind:value2="rol.id"
            >
                {{ rol.nombre }} 
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
        roles:Array,
    }
};
</script>
