<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Novo usuário
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div v-for="(error, index) in errors" :key="index">
              <p class="text-red-600">
                {{ error }}
              </p>
            </div>
            <form @submit.prevent="handleForm">
              <label for="name">Nome</label>
              <input id="name" type="text" v-model="form.name"/>
              <br>

              <label for="name">Email</label>
              <input id="email" type="email" v-model="form.email" />
              <br>

              <label for="name">Senha</label>
              <input id="password" type="password" v-model="form.password" />
              <br>
              <button type="submit">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";

export default {
  components: {
    BreezeAuthenticatedLayout,
  },

  props: {
    errors: Object
  },

  data: () => {
    return {
      form: {
        name: '',
        email: '',
        password: '',
      }
    }
  },

  methods: {
    handleForm() {
      this.$inertia.post(route('admin.user.store'), this.form)
    }
  }
};
</script>

<style>
</style>