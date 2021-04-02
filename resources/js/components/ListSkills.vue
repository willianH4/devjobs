<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
            :class="verificarClaseActiva(skill)"
                v-for="( skill, i ) in this.skills"
                v-bind:key="i"
                @click="activar($event)"
            >{{ skill }}</li>
        </ul>

        <input type="hidden" name="skills" id="skills">
    </div>
</template>

<script>
export default {
    props: ['skills', 'oldskills'],
    data() {
        return {
            habilidades: new Set()
        }
    },

    created() {
        if (this.oldskills) {
            const skillsArray = this.oldskills.split(',');
            skillsArray.forEach(skill => this.habilidades.add(skill));
        }
    },

    mounted() {
        document.querySelector('#skills').value = this.oldskills;
    },
    methods: {
        activar(e) {
            if ( e.target.classList.contains('bg-indigo-300') ) {
                // cuando el skill esta seleccionado remueve la clase css
                e.target.classList.remove('bg-indigo-300');

                // eliminar del set de habilidades
                this.habilidades.delete(e.target.textContent);
            } else {
                // no esta activo agrega el css
                e.target.classList.add('bg-indigo-300');
                // agregar al set de habilidades
                this.habilidades.add(e.target.textContent);
            }

            // agregar al input hidden las habilidades
            const stringHabilidades = [...this.habilidades];
            document.querySelector("#skills").value = stringHabilidades;
        },

        verificarClaseActiva(skill) {
            return this.habilidades.has(skill) ? 'bg-indigo-300' : '';
        }
    }
}
</script>