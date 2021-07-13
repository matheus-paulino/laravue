<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Novo usuário
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div v-for="(error, index) in errors" :key="index">
        <p class="text-red-600">
          {{ error }}
        </p>
      </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="flex justify-center p-6 border-b border-gray-200">
            <form @submit.prevent="handleForm" class="space-y-3">
              <div>
                <label for="name" class="">Nome</label>
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
                <label for="email" class="">Email</label>
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
                    placeholder="Email"
                    id="email"
                    type="email"
                    v-model="form.email"
                  />
                </div>
              </div>

              <div>
                <label for="password" class="">Senha</label>
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
                    placeholder="Senha"
                    id="password"
                    type="password"
                    v-model="form.password"
                  />
                </div>
              </div>
              <div>
                <label for="password_confirmation" class=""
                  >Confirme a senha</label
                >
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
                    placeholder="Confirme a senha"
                    id="password_confirmation"
                    type="password"
                    v-model="form.password"
                  />
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
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";

export default {
  components: {
    BreezeAuthenticatedLayout,
  },

  props: {
    errors: Object,
  },

  data: () => {
    return {
      form: {
        name: "",
        email: "",
        password: "",
      },
    };
  },

  methods: {
    handleForm() {
      this.$inertia.post(route("admin.user.store"), this.form);
    },
  },
};
</script>

<style>
</style>