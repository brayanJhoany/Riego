<script>
export default {
    inheritAttrs:false,//significa que las props no seran heredadas en los componentes
    props:{
        id:String,//identidicador
        value:String,//valor
        valueImg:Object,
        label:String,//la etiqueta
        error:String,// los errores
    }
}
</script>