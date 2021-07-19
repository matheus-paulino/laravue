<template>
  <master>
      <template #header>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Cadastro de usuário
        </h2>
      </template>
        <div class="py-12">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="flex justify-center p-6 border-b border-gray-200">
            <form @submit.prevent="handleForm" class="space-y-3">
              <div>
                <label for="name" class="">Nome do estoque</label>
                <div>
                  <input
                    class="
                      rounded-md
                      border-gray-300
                      focus:border-0
                      focus:outline-none
                      focus:ring-2 focus:ring-purple-600
                      focus:border-transparent
                    "
                    placeholder="Nome"
                    id="name"
                    type="text"
                    v-model="form.name"
                  />
                </div>
              </div>

              <div>
                <label for="type" class="">O estoque {{ form.name }}, irá ser seu estoque principal?</label>
                <div>
                  <input type="checkbox" id="type" name="type" value="master" v-model="form.type">
                </div>
              </div>
              <div class="text-center p-2">
                <button type="submit" class="bg-green-300 py-2 px-3 rounded-md">
                  Cadastrar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </master>
</template>

<script>
// TODO: implement multiselectvue
import Master from '@/Layouts/Authenticated'

export default {

    components: { 
        Master
     },

    data ()  {
        return {
            form: {
                name: '',
                type: false,
            },
        }
    },

    methods: {
        handleForm() {
            this.$inertia.post(route('admin.stock.store'), this.form);
        }
    }
    
}
</script>


<style scoped>

</style>