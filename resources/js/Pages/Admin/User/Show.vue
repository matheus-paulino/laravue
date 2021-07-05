<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Usuário: {{ user.name }}
      </h2>
    </template>
    <div class="pt-8">
      <div
        class="
          container
          bg-white
          shadow
          overflow-hidden
          sm:rounded-lg
          mx-auto
          px-12
        "
      >
        <div class="flex flex-row justify-end">
          <div class="px-4 py-5 sm:px-6">
            <p class="mt-1 max-w-2xl text-sm text-gray-300">
              Data de cadastro: {{ formattedCreatedAt }}
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container mx-auto pt-8">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Perfil</h3>
            <p class="mt-1 text-sm text-gray-600">
              Mostra as informações do usuário
            </p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form>
            <div class="shadow sm:rounded-md sm:overflow-hidden">
              <div class="px-4 py-3 bg-white space-y-6 sm:p-6">
                <div class="grid gird-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label
                      for="user-name"
                      class="block font-medium text-gray-700"
                    >
                      Nome
                    </label>
                  </div>
                  <input
                    type="text"
                    name="user-name"
                    id="user-name"
                    class="
                      flex-1
                      block
                      w-full
                      rounded-none rounded-r-md rounded-l-md
                      sm:text-sm
                      border-gray-300
                    "
                    v-model="user.name"
                  />
                </div>
              </div>
              <div class="px-4 py-3 bg-white space-y-6 sm:p-6">
                <div class="grid gird-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label
                      for="email-name"
                      class="block font-medium text-gray-700"
                    >
                      Email
                    </label>
                  </div>
                  <input
                    type="email"
                    name="email-name"
                    id="email-name"
                    class="
                      flex-1
                      block
                      w-full
                      rounded-none rounded-r-md rounded-l-md
                      sm:text-sm
                      border-gray-300
                    "
                    v-model="user.email"
                  />
                </div>
              </div>
            </div>
          </form>
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
    user: Object,
  },

  computed: {
    formatterDate() {
      var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
      };

      return new Intl.DateTimeFormat("pt-BR", options);
    },

    formattedCreatedAt() {
      return this.formatterDate.format(Date.parse(this.user.created_at));
    },
  },
};
</script>

<style>
</style>