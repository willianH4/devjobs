<template>
    <div>
       <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
        :class="claseEstadoVacante()"
         @click="cambiarEstado"
         :key="estadoVacanteData"
       >
                  {{ estadoVacante }}
        </span>
    </div>
</template>

<script>
export default {
    props:['estado', 'vacanteId'],
    mounted() {
        this.estadoVacanteData = Number(this.estado)
    },
    data() {
        return {
            estadoVacanteData: null
        }
    },
    methods: {
        claseEstadoVacante() {
            return this.estadoVacanteData === 1 ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800"
        },
        cambiarEstado() {
            if (this.estadoVacanteData == 1) {
                this.estadoVacanteData = 0;
            } else {
                this.estadoVacanteData = 1;
            }

            // Enviar la peticion a axios
            const params = {
                estado: this.estadoVacanteData
            }
            axios
                .post('/vacantes/' + this.vacanteId, params)
                .then((result) => {
                console.log(result)                
                }).catch((err) => {
                    console.log(err)
                });
            
        }
    },
    computed: {
        estadoVacante() {
            return this.estadoVacanteData === 1 ? 'Activa' : 'Inactiva'
        }
    },
}
</script>