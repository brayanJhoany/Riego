<script>
export default {
    inheritAttrs:false,//significa que las props no seran heredadas en los componentes
    props:{
        id:String,//identidicador
        value:String,//valor
        label:String,//la etiqueta
        error:String,// los errores
    }
}
</script>