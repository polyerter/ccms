/*Функция задержки*/
var delay = (function(){ var timer = 0; return function(callback, ms){ clearTimeout (timer); timer = setTimeout(callback, ms); }; })();

/*Функция алерта*/
function MODalert(message, title){

    $("#modpopup").remove();

    $("body").append('<div id="modpopup" class="modal">\
  						<div class="modal-dialog">\
    						<div class="modal-content">\
      							<div class="modal-header">\
        							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
        							<h4 class="modal-title">' + title + '</h4>\
      							</div>\
      						<div class="modal-body">\
        						'+ message +'\
      						</div>\
      						<div class="modal-footer">\
        						<button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>\
      						</div>\
						</div>\
 					</div>\
				</div>');

    $('#modpopup').modal({ show: true, backdrop: false });
}

/*Функция вставки удачного алерта*/
function salert (id, title, text, act) {

    if($('#'+id+'_alert')) { $('#'+id+'_alert').fadeOut('slow').remove(); }

    if(act) {

        $('#'+id).prepend('<div id="'+id+'_alert" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> '+title+'</h4>'+text+'</div>')


    }

    window.scrollTo(0, 0);
}

/*Функция проверки логина*/
function checkname(name) {

    $.post("/addons/ajax/fin.inc.php", { name: name, act: 'namecheck' }, function (data) {

        if(data) {

            $('#nregbl').html(data);

        } else { $('#nregbl').html(''); }

    });

}
/*Функция проверки мыла*/
function checkemail(email) {

    $.post("/addons/ajax/fin.inc.php", { email: email, act: 'emailcheck' }, function (data) {

        if(data) {

            $('#eregbl').html(data);

        } else { $('#eregbl').html(''); }

    });

}
/*Функция генерации пароля*/
function passgen() {

    $.post("/addons/ajax/fin.inc.php", { act: 'pasgen' }, function (data) {

        if(data) { $('#regpassword').val(data); }

    });
}

/*Добавление нового юзера*/
function newuser(form) {

    var formdata = $(form).serialize(), regname = $('#regname'), regemail = $('#regemail'), regpass = $('#regpassword'), totalcost = $('#totalcostfield');

    /*Проверка логина*/
    if(!regname.val().length) { MODalert('Поле логин обязательно к заполнению', 'Ошибка'); return false; }
    if(regname.val().length <= 3) { MODalert('Поле логин не менее 3х символов', 'Ошибка'); return false; }
    if(regname.next().text()) { MODalert('Проверьте поле логин на ошибки', 'Ошибка'); return false; }
    /*Проверка почты*/
    if(!regemail.val().length) { MODalert('Поле email обязательно к заполнению', 'Ошибка'); return false; }
    if(regemail.val().length <= 5) { MODalert('Поле email не может быть таким коротким', 'Ошибка'); return false; }
    if(regemail.next().text()) { MODalert('Проверьте поле email на ошибки', 'Ошибка'); return false; }
    /*Проверка пароля*/
    if(!regpass.val().length) { MODalert('Поле пароль обязательно к заполнению', 'Ошибка'); return false; }
    if(regpass.val().length < 6) { MODalert('Поле паролье не может быть таким коротким', 'Ошибка'); return false; }
    /*Стоимость жилья*/
    if(!totalcost.val().length) { MODalert('Поле стоимость жилья обязательно к заполнению', 'Ошибка'); return false; }

    $.post("/addons/ajax/fin.inc.php", { form: formdata, act: 'newuser' }, function(data){

        if(data) { MODalert(data, 'Ошибки при регистрации'); }
        else {

            salert('addusercontent', 'Добавление нового пайщика', 'Новый пайщик был успешно зарегистрирован в кооперативе.', true);

            //Редирект
            setTimeout(function () { location.reload(true); }, 2000);
        }
    });

}

/*Инит дока*/
$(window).ready(function () {
    var regname = $('#regname'), regemail = $('#regemail');
    /*При вводе логина проверка*/
    regname.on('keyup',function() {
        if(regname.val().length > 3) {
            delay(function(){ checkname(regname.val()); }, 1000 );
        }
    });
    /*При вводе емайла проверка*/
    regemail.on('keyup',function() {
        if(regemail.val().length > 5) {
            delay(function(){ checkemail(regemail.val()); }, 1000 );
        }
    });

    /*Дата рождения*/
    $('[data-rel=birthdate]').datepicker({
        autoclose: true,
        format: 'dd.mm.yyyy',
        language: 'ru',
        todayBtn: 'linked'
    });

    /*Поиск города если уже есть*/
    $('#regland').autocomplete({
        source: 'addons/ajax/fin.inc.php?act=regland',
        minLength: 1,
        delay: 200,
        autoFill: true
    });

    /*Добавление нового юзера*/
    $('#adduserform').submit(function (e) { e.preventDefault(); newuser(this); });


});
