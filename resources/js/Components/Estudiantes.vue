<template>
    <div class="p-3">
        <h1>Tabla de Estudiantes</h1>
        <table class="border-collapse w-full">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Nombre</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Apellido</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Email</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Estatus</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0" v-for="estudiante in estudiantes" :key="estudiante.email">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nombre</span>
                        {{ estudiante.nombre }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                        {{ estudiante.apellido }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                        {{ estudiante.email }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                        <span class="bg-blue-400 rounded py-1 px-3 text-xs font-bold">
                            {{ (estudiante.estatus == '1') ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                        <a :href="route('editar_estudiante', [estudiante.id])" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                        <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6" @click="eliminar( estudiante.id )">Remove</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';


    export default {
        mounted() {
            axios.get(process.env.MIX_BASEURL + '/estudiante').then(res=> {
                this.estudiantes = res.data
            })
        },
        data() {
            return {
                estudiantes: []
            }
        }, 
        methods: {
            eliminar(id) {
                axios.post(process.env.MIX_BASEURL + '/estudiante/' + id, {
                    _method: 'DELETE'
                }).then(res=> {
                    this.estudiantes = this.estudiantes.filter((e) => {
                        return e.id !== id;
                    })
                })
            }
        }
    }
</script>
