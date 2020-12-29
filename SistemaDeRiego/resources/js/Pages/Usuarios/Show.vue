<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-6">
                <p class="col-start-1 col-end-2">
                    Usuario
                </p>
               
            </div>
        </template>
    </app-layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout.vue'
export default {
    name:"showUser",
    data(){
        return{

        }
    },
    props:{
        usuario:null
    },
    components:{AppLayout},

}
</script>

