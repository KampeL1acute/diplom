<template>
    <div v-if="!showRules">
        <div class="bodyfootermain">
            <div class="bodyconteiner">
                <h1>Fabila | Правила сайта</h1><br>
                <h1>Основные положения и трактовки правил.</h1>
                <div>
                    <p style="text-align: justify">
                        <span style="font-size: 11pt;">
                            <h1 style="color: red">Правила сайта находятся на стадии производства из-за нехватки времени(</h1>
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
            showRules: false,
        };
    },
});
</script>
      
<style>

</style>