/*Форма сохранения настроек*/
function savecfg (form) {

    var formdata = $(form).serialize();

    $.post("/addons/ajax/fin.inc.php", { form: formdata, act: 'savecfg' }, function(){

        $('#setupcontent').prepend('')

        salert('setupcontent', 'Сохранение настроек', 'Настройки были успешно сохранены', true);
        
        /*Форма сохраняет изменения всё ок*/
        $(form).data('serialize', formdata);

        //Редирект
        setTimeout(function () { location.reload(true); }, 2000);


    });

}

/*Функция вставки удачного алерта*/
function salert (id, title, text, act) {

    if($('#'+id+'_alert')) { $('#'+id+'_alert').fadeOut('slow').remove(); }

    if(act) {

        $('#'+id).prepend('<div id="'+id+'_alert" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> '+title+'</h4>'+text+'</div>')


    }

    window.scrollTo(0, 0);
}

/*Проверка формы на изменеия при переходах*/
function setupform() {

    var $uform = $('#msetup');
    return ($uform.serialize() !== $uform.data('serialize'));

}

/*Инит документа*/
$(document).ready(function (){

    /*Работа с формой настроек*/
    var uform = $('#msetup');
    uform.data('serialize', uform.serialize());
    uform.submit(function (e) { e.preventDefault(); savecfg(this); });

    //Tooltip
    $('.tip').tooltip();

});

/*check window on unload*/
window.onbeforeunload = function (e) { if(setupform()) { return true; } else { e = null; } };