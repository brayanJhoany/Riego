<template>
    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
        <td class="border-t">
            {{ usuario.nombre }}
                <svg
                    v-if="publicacion.deleted_at"
                    class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z" />
                </svg>
        <!-- <td class="border-t text-c">
            {{ publicacion.categoria }}
        </td>
        <td class="border-t">
            {{ publicacion.nombre_autor }}
        </td> -->


        <td class="border">
            <b-button class="mr-4"  size="md" variant="primary" >Ver</b-button>
            <b-button class="mr-4" variant="warning"  >Editar</b-button>
            <b-button  variant="danger"  >Eliminar</b-button>
        </td>


  <!-- modal para editar una publicación bootstrap-->
     
    <!-- modal para ver la informacion-->



    </tr>



</template>