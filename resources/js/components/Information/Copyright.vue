<template>
    <div v-if="!showCopyright">
        <div class="bodyfootermain">
            <div class="bodyconteiner">
                <h1>Fabila | Авторское право</h1><br>
                <h1>Защита авторских прав.</h1>
                <div>
                    <p style="text-align: justify">
                        <span style="font-size: 11pt;">
                            Мы соблюдаем Закон о защите авторских прав в цифровую эпоху (DMCA) и другие действующие законы об авторских правах.<br><br>
                            Мы можем не знать, что использование соответствующих результата интеллектуальной деятельности или средства индивидуализации, содержащихся в таком материале, является неправомерным. Поэтому, в случае получения в письменной форме заявления правообладателя о нарушении интеллектуальных прав с указанием страницы сайта и (или) сетевого адреса в сети "Интернет", на которых размещен такой материал, мы своевременно принимаем необходимые и достаточные меры для прекращения нарушения интеллектуальных прав.<br><br>
                            <h1 style="font-size: 20px;">Уведомление о нарушении авторских прав</h1>
                            Если вы считаете, что материал на сайте Fabila нарушает ваши авторские права, вы можете написать уведомление о нарушении прав и отправить его на адрес contactfabila@gmail.com незамедлительно осуществит блокировку перечисленных в уведомлении материалов.<br><br>
                            Часть 512(c) Акта об авторских правах (Digital Millennium Copyright Act) предъявляет определенные требования к форме этого уведомления. В соответствии с этим, оно должно быть предоставлено в письменном виде и обязательно содержать следующую информацию:<br><br>
                            Материальную или электронную подпись лица, имеющего право представлять интересы человека, чьи авторские права на материал были нарушены.<br><br>
                            Указание на работы (материалы), в отношении которых нарушены права. В случае, когда уведомление сообщает о нарушениях авторского права на несколько таких материалов (текстов, изображений), в нем должны быть приведены указания на каждый из них.<br><br>
                            Указание на материал, нарушающий авторские права или являющийся субъектом поведения, нарушающего авторские права, каковой материал должен быть удален с серверов Fabila или заблокирован для доступа. Вы также должны предоставить исходный адрес (URL) этого материала.<br><br>
                            Информация о том, как связаться с вами, например адрес электронной почты, почтовый адрес.<br><br>
                            Утверждение, что вы действительно считаете, что использование данного материала в таком виде не разрешено ни владельцем авторских прав, ни его агентом, ни законодательством РФ.<br><br>
                            Заявление, сделанное ввиду возможных штрафных санкций за предоставление ложных сведений, что представленные вами факты не содержат ошибок и искажений, и вы имеете право действовать от лица владельца авторских прав.<br><br>
                            Удаление или блокирование доступа к материалу. После получения указанного выше уведомления о нарушении в течение 3 (трех) рабочих дней сервис Fabila либо предпринимает меры по ограничению доступа к спорным материалам, либо, если информации в требовании недостаточно, сервис не обязан делать работы ответственного представителя. В таком случае сервис попросту игнорирует все не адекватные обращения.<br><br>
                            При определенных обстоятельствах Fabila прекращает предоставление сервиса владельцам аккаунтов, которые были замечены в многократных нарушениях авторских прав.<br><br>
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
            showCopyright: false,
        };
    },
});
</script>
      
<style>

</style>