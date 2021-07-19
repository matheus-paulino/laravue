<template>
  <master>
    <template #header> Produtos </template>
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
              <inertia-link :href="route('admin.product.create')">
                  Novo produto
              </inertia-link>
          </div>
        </div>
      </div>
    </div>
    <div class="pb-12 pt-8">
      <div class="container mx-auto">
        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
              class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
            >
              <div
                class="
                  shadow
                  overflow-hidden
                  border-b border-gray-200
                  sm:rounded-lg
                "
              >
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-blue-400">
                    <tr class="text-white">
                      <th
                        scope="col"
                        class="
                          px-6
                          py-3
                          text-left text-xs
                          font-medium
                          uppercase
                          tracking-wider
                        "
                      >
                        ID
                      </th>
                      <th
                        scope="col"
                        class="
                          px-6
                          py-3
                          text-left text-xs
                          font-medium
                          uppercase
                          tracking-wider
                        "
                      >
                        Nome
                      </th>
                      <th
                        scope="col"
                        class="
                          px-6
                          py-3
                          text-left text-xs
                          font-medium
                          uppercase
                          tracking-wider
                        "
                      >
                        Preço
                      </th>
                      <th
                        scope="col"
                        class="
                          px-6
                          py-3
                          text-left text-xs
                          font-medium
                          uppercase
                          tracking-wider
                        "
                      >
                        Status
                      </th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="(product, index) in products" :key="index">
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <!-- <div class="flex-shrink-0 h-10 w-10">
                          <img
                            class="h-10 w-10 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                            alt=""
                          />
                        </div> -->
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{ product.id }}
                            </div>
                            <div class="text-sm text-gray-500"></div>
                          </div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                          {{ product.name }}
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                          {{
                            Intl.NumberFormat("pt-BR", {
                              style: "currency",
                              currency: "BRL",
                            }).format(product.price)
                          }}
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 text-green-600" v-if="product.status == 'active'">
                          Ativo
                        </div>
                        <div v-else class="text-sm text-gray-900 text-red-600">
                            Inativo
                        </div>
                      </td>
                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      >
                        <inertia-link :href="route('admin.product.show', product.id)">
                            Editar
                        </inertia-link>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </master>
</template>

<script>
import Master from "@/Layouts/Authenticated";

export default {
  components: {
    Master,
  },

  props: {
    products: Object,
  },
};
</script>

<style>
</style>