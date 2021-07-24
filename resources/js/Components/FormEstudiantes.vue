<template>
    <div class="bg-white shadow rounded-lg p-6">
    <div class="grid lg:grid-cols-2 gap-6">
      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="name" class="bg-white text-gray-600 px-1">Nombre *</label>
          </p>
        </div>
        <p>
          <input v-model="nombre" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
        </p>
      </div>
      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="lastname" class="bg-white text-gray-600 px-1">Apellido *</label>
          </p>
        </div>
        <p>
          <input v-model="apellido" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
        </p>
      </div>
      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="username" class="bg-white text-gray-600 px-1">Email *</label>
          </p>
        </div>
        <p>
          <input v-model="email" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
        </p>
      </div>
      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="carrera" class="bg-white text-gray-600 px-1">Carrera *</label>
          </p>
        </div>
        <p>
            <select v-model="carrera" autocomplete="false" tabindex="0" class="py-1 px-1 outline-none block h-full w-full">
              <option v-for="car in carreras" :value="car.id" >{{ car.nombre }}</option>
            </select>
        </p>
      </div>
    </div>
    <div class="border-t mt-6 pt-3">
      <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300" @click.prevent="store">
        Save
      </button>
    </div>
  </div>
</template>

<script>

export default ({
    mounted() {
        axios.get(process.env.MIX_BASEURL + '/carrera').then(res=> {
            this.carreras = res.data
        })
    },
    data() {
        return {
            nombre: '',
            apellido: '',
            email: '',
            carrera: '',
            carreras: []
        }
    },

    methods: {
        store() {
            axios.post(process.env.MIX_BASEURL + '/estudiante', {
                nombre: this.nombre,
                apellido: this.apellido,
                email: this.email,
                carrera_id: this.carrera
            }).then(res=> {
                window.location.href = '/dashboard'
            }).catch(() => {
                alert('verifique los campos');
            })
        }
    }
})
</script>

