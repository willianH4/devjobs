<template>
    <div>
        <button class="text-red-500 hover:text-red-900  mr-5"
        @click="eliminarVacante"
        >
            Elminar
        </button>
    </div>
</template>

<script>
export default {
    
    props: ['vacanteId'],

    methods: {
        eliminarVacante() {
            console.log('Eliminando ', this.vacanteId )
            this.$swal.fire({
            title: 'Deseas eliminar esta vacante?',
            text: "Una vez eliminado este registro no hay forma de recuperarlo!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No'
            }).then((result) => {
            if (result.isConfirmed) {

                const params = {
                    id: this.vacanteId,
                    _method: 'delete'
                }

                // aca se envian las peticiones hacia axios
                axios.post(`/vacantes/${this.vacanteId}`, params)
                    .then(respuesta => {
                        console.log(respuesta)
                        this.$swal.fire(
                        'Eliminado!',
                        respuesta.data.mensaje,
                        'success'
                        )

                        // Eliminar la vacante borrada del DOM
                        this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
            })
        }
    },
}
</script>