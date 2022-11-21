<template>
    <div>
        <main>
            <div class="container">
                <RouterView />
            </div>
        </main>
    </div>
</template>

<script setup>
import { ref } from "vue";

const count = ref(0);
const addCount = () => {
    count.value++;
};
</script>
