<template>
  <div class="h-screen flex justify-center items-center">
        <div class="border-4 p-12">
            <h3 class="text-center p-4 font-black text-6xl tracking-tighter text-red-600">
                {{ status }}
            </h3>
            <p class="text-2xl text-center tracking-tighter font-extrabold">{{ message }}</p>
            <div class="pt-3 text-center">
                <inertia-link
                :href="route"
                class="
                text-indigo-600 
                hover:text-indigo-900
                "
                >
                    Voltar
                </inertia-link>
            </div>
        </div>
    </div>
</template>

<script>



export default {
    components: {
        
    },
    props: {
        status: Number,
        message: String,
        route: String,
    }
}
</script>

<style>

</style>