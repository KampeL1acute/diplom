<template>
    <div v-if="!showFAQ">
        <div class="bodyfootermain">
            <div class="bodyconteiner">
                <h1>FAQ (вопросы и ответы)</h1><br>
                <h1>Вопросы и Ответы</h1>
                <div>
                    <p style="text-align: justify">
                        <span style="font-size: 11pt;">
                            Здесь собраны все вопросы и ответы, касаемые Fabila. Если вы не нашли здесь ответ, напишите Администрации в личку паблика <a href="https://vk.com/im?media=&sel=-224993247" class="hoverLink" title="Задать вопрос" target="_blank" rel="noreferrer">Вконтакте</a><br><br>
                            <h1 style="color: red">FAQ (Вопросы и Ответы) находятся на стадии производства из-за нехватки времени(</h1>
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
            showFAQ: false,
        };
    },
});
</script>
      
<style>

</style>