<template>
    <div v-if="!showAboutUs">
        <div class="bodyfootermain">
            <div class="bodyconteiner">
                <h1>О Fabila</h1>
                <div>
                    <p style="text-align: justify">
                        <span style="font-size: 11pt;">
                            Fabila - это сайт для просмотра и чтения книг)
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
    
<script>
    import {defineComponent} from 'vue';

export default defineComponent({
    components: {},
    setup () {
        return {
            showAboutUs: false,
        };
    },
});
</script>
      
<style>

</style>