
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

function MODconfirm(message, title, callback, nobtn, yesbtn){

    var no = (nobtn) ? nobtn : 'Нет', yes = (yesbtn) ? yesbtn : 'Да';

    $("#modpopup").remove();

    $("body").append('<div id="modpopup" class="modal fade">\
  						<div class="modal-dialog">\
    						<div class="modal-content">\
      							<div class="modal-header">\
        							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
        							<h4 class="modal-title">' + title + '</h4>\
      							</div>\
      						<div class="modal-body">\
        						<p>'+ message +'</p>\
      						</div>\
      						<div class="modal-footer">\
        						<button type="button" class="btn btn-danger" data-dismiss="modal">'+no+'</button>\
								<button data-dismiss="modal" class="btn btn-success" id="confbtn">'+yes+'</button>\
      						</div>\
						</div>\
 					</div>\
				</div>');

    $('#modpopup').modal({ show: true, backdrop: false });
    $('#confbtn').click(function() { if( callback ) callback(); });
}

/*Функция редактирования пользователя*/
function edituser() {

    var login = $('#usrlogin').val(), uid = parseInt($('[data-uid]').data('uid'));

    $.post("/addons/ajax/fin.inc.php", { login: login, act: 'edituser' }, function (data) {
        
        if(data)  {

            MODconfirm(data, 'Редактирование пользователя: ' + login, function () {

                var formdata = $('#useredit').serialize();

                $.post("/addons/ajax/fin.inc.php", { formdata: formdata, act: 'editusersave' }, function (data) {

                    if(data) { MODalert(data, 'Произошла ошибка:'); return false; }

                    notify('fa fa-check', 'Сохранение изменений', 'Всё прошло успешно');

                    getinfo(login);

                });

            }, 'Отмена', 'Сохранить');

            $('[data-rel=birthdatewin]').datepicker({
                autoclose: true,
                format: 'dd.mm.yyyy',
                language: 'ru',
                todayBtn: 'linked'
            });

        }
        else { MODalert('Что-то пошло не так, попробуйте еще раз.', 'Редактирование пользователя: ' + login); return false; }

    });
}

/*Добавление платежа*/
function addpay() {

    var uid = $('[data-uid]').data('uid'), b = {}, prog = parseInt($('[data-prog]').data('prog')), psel;

    /*Определяем тип платеже в зависимости от программы*/
    if(prog == 1) {

        psel = "<input type='hidden' name='type' value='2'/>";

    } else {

        psel = "<div class='form-group'> <label>Наименование взноса:</label>" +
            "<select name='type' id='newpaytype' class='form-control' style='padding: .4em;'>" +
            "<option value='1'>Паевой взнос</option>" +
            "<option value='3'>Ежемесячный взнос</option>" +
            "<option value='4'>Членский взнос</option>" +
            "</select></div>"
    }

    var summfield = "<div class='form-group' id='cvz'><label>Сумма взноса:</label>" +
                    "<input type='text' name='summ' class='form-control'></div>";

    var addform = "<form id='newpay' name='newpay'><input type='hidden' name='uid' value='"+uid+"'>" +
                    psel +
                    "<div class='form-group'><label>Дата платежа:</label>" +
                    "<input type='text' name='date' data-rel='pcalendar' size='20' class='form-control'></div>" +
                    summfield +
                    "<div class='form-group'><label>Номер документа:</label>" +
                    "<input type='text' name='doc' class='form-control'></div>" +
                    "</form>";

    MODconfirm(addform, 'Добавление нового платежа:', function () {

        var formdata = $('#newpay').serialize(), login = $('#usrlogin').val();

        $.post("/addons/ajax/fin.inc.php", { formdata: formdata, act: 'newpay' }, function (data) {

            if(data) {
                notify('fa fa-check', 'Добавление платежа', 'Всё прошло успешно');
                getinfo(login);
            }

        });

    }, 'Отмена', 'Добавить');

    /*Чекбокс дробления при типе платежа членский взнос*/
    if($('#newpaytype')) {

        $('#newpaytype').on('change', function () {

            var cvzfield = "<div class='form-group' id='cvz'>" +
                                "<label>Сумма взноса: ( <span class='text-danger'>чекбокс для дробления суммы по месяцам</span> )</label>" +
                                "<div class='input-group'>" +
                                    "<span class='input-group-addon'>" +
                                        "<input type='checkbox' name='cvz' value='1'>" +
                                    "</span>" +
                                    "<input type='text' name='summ' class='form-control'>" +
                           "</div></div>";

            if($(this).val() == 4) { $('#cvz').replaceWith(cvzfield); }
            else { $('#cvz').replaceWith(summfield); }

        })

    }

    $('[data-rel=pcalendar]').datepicker({
        autoclose: true,
        format: 'dd.mm.yyyy',
        language: 'ru',
        todayBtn: 'linked'
    });
}

/*Удаление платежа*/
function delfin(fid) {

    var uid = parseInt($('[data-uid]').data('uid')), login = $('#usrlogin').val();

    MODconfirm( 'Вы действительно хотите удалить этот платёж ?', 'Удаление платежа с ID - ' + fid, function () {

        $.post("/addons/ajax/fin.inc.php", { uid: uid, fid: fid, act: 'delfin' }, function(data) {

            if(data) { MODalert(data, 'Произошла ошибка:'); return false; }

            notify('fa fa-check', 'Удаление платежа', 'Всё прошло успешно');

            getinfo(login);

        });
    });
}

/*Редактирование платежа*/
function edfin(fid) {

    $.post("/addons/ajax/fin.inc.php", { fid: fid, act: 'editfin' }, function (data) {

        MODconfirm(data, 'Редактирование платежа:', function () {

            var formdata = $('#edpay').serialize(), uid = parseInt($('[data-uid]').data('uid')), login = $('#usrlogin').val();

            $.post("/addons/ajax/fin.inc.php", { uid: uid, formdata: formdata, act: 'edsavefin' }, function (data) {

                if(data) { MODalert(data, 'Произошла ошибка:'); return false; }
                notify('fa fa-check', 'Сохранение изменений', 'Всё прошло успешно');
                getinfo(login);

            });

        }, 'Отмена', 'Сохранить');

        $('[data-rel=pcalendar]').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy',
            language: 'ru',
            todayBtn: 'linked'
        });

    });
}

/*Смена стоимости жилья*/
function newtotalcost() {

    var uid = $('[data-uid]').data('uid'), prog = parseInt($('[data-prog]').data('prog'));

    if(prog == 4) { MODalert('Пользователь уже заселён, невозможно сменить стоимость жилья', 'Произошла ошибка:'); return false; }

    var data = "<form id='newcost' name='newcost' onsubmit='return false;'><input type='hidden' name='uid' value='"+uid+"'> \
                <div class='form-group'><label>Введите новую стоимость жилья:</label> \
                <input type='text' name='totalcost' class='form-control'> \
                </div></form>";

    MODconfirm(data, 'Смена стоимости жилья: ', function () {

        var formdata = $('#newcost').serialize(), login = $('#usrlogin').val();

        $.post("/addons/ajax/fin.inc.php", { formdata: formdata, act: 'newcost' }, function (data) {

            if(data) { MODalert(data, 'Произошла ошибка:'); return false; }

            notify('fa fa-retweet', 'Изменение ст-ти жилья', 'Всё прошло успешно');

            getinfo(login);


        });


    }, 'Отмена', 'Изменить');


}

/*Format thousands*/
function thousands(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ' ' + '$2');
    }
    return x1 + x2;
}

/*Получаем инфу о пользователе*/
function getinfo(login) {

    $.post("/addons/ajax/fin.site.php", { login: login, act: 'getinfo' }, function(data){

        if(data) {

            if($('#searchuser').is(':visible')) { $('#searchusrhide').click(); } // Скрываем панель поиска

            $('#userinfoblock').html(data.info);

            getpayments(data.uid);

        } else {

            notify('fa fa-warning', 'Пайщик', 'не найден, повторите поиск', 'danger');
        }

    }, 'json');
}

/*Получаем инфу о платежах*/
function getpayments(uid) {

    $.post("/addons/ajax/fin.site.php", { uid: uid, act: 'finance' }, function(data) { if(data) { $('#userfinblock').html(data); } });

}

/*Постраничная навигация для платежей*/
function list_submit(prm){
    var uid = parseInt($('[data-uid]').data('uid'));

    ShowLoading();

    $.post("/addons/ajax/fin.site.php", { uid: uid, page: prm, act: 'finance'  }, function(data){

        HideLoading();

        if(data) { $('#userfinblock').html(data); }


    });
}

/*Нотифер*/
function notify(icon, title, msg, type) {

    var icon = (icon) ? icon : 'fa fa-check', title = (title) ? title : 'Сохранено', msg = (msg) ? msg : '', type = (type) ? type : 'success';

    $.notify({
        icon: icon,
        title: title,
        message: msg
    },{
        type: type,
        template: '<div data-notify="container" class="col-xs-11 col-sm-2 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<div data-notify="message">{2}</div>' +
        '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>'

    });

}

$(window).ready(function () {

    /*Поиск юзера по логину*/
    $('#usrlogin').autocomplete({
        source: 'addons/ajax/fin.inc.php?act=getlogin',
        minLength: 2,
        delay: 200,
        autoFill: true,
        search: function( event, ui ) {
            if($('#getinfo').is(':visible')) { $('#getinfo').fadeOut('slow'); }
        },
        select: function (event, ui) {

            if(!$('#getinfo').is(':visible')) { $('#getinfo').fadeIn('slow'); }
        },
        response: function(event, ui) {

            if (ui.content.length === 0) {
                if($('#getinfo').is(':visible')) { $('#getinfo').fadeOut('slow'); }
            }
        }
    });
    /*Кнопка вывода инфы о пользователе*/
    $('#getinfo').on('click', function () {

        var login = $('#usrlogin').val();
        getinfo(login);

    });

    /*Фишка по поиску истории если есть хеш в урле*/
    var hash = window.location.hash.substring(1);
    if(hash) {

        if(!$('#getinfo').is(':visible')) { $('#getinfo').fadeIn('slow'); }

        $('#usrlogin').val(hash).focus();
        $('#getinfo').click();

    }

    /*Тултипы*/
    $('.tip').tooltip();
});