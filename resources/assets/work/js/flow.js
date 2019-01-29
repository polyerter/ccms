/*Хелпер обнаружения смены класса у элемента*/
(function($) {
    var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;

    $.fn.attrchange = function(callback) {
        if (MutationObserver) {
            var options = {
                subtree: false,
                attributes: true
            };

            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(e) {
                    callback.call(e.target, e.attributeName);
                });
            });

            return this.each(function() {
                observer.observe(this, options);
            });

        }
    }
})(jQuery);

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

/*Переуступка*/
function pereustupka(uid) {

    var oldfnum = parseInt($('[data-uid="'+uid+'"]').data('fnum')),
        oldpos = parseInt($('[data-uid="'+uid+'"]').data('pos')),
        fio = $('[data-uid="'+uid+'"]').data('fio');

    $.post("/addons/ajax/fin.inc.php", { uid: uid, oldfnum: oldfnum, oldpos: oldpos, act: 'getustupka' }, function (data) {

        if(data)  {
            
            MODconfirm(data, 'Переуступка: ' + fio, function () {

                var formdata = $('#pereform').serialize(), touser = $('[name="touser"]');

                if(!touser.val().length) { return false; }

                $.post("/addons/ajax/fin.inc.php", { formdata: formdata, act: 'saveustupka' }, function (data) {

                    if(data) { MODalert(data, 'Произошла ошибка:'); return false; }

                    notify('fa fa-exchange', 'Переуступка', 'Прошла успешно');

                    //Редирект
                    setTimeout(function () { location.reload(true); }, 850);

                });


            }, 'Отмена', 'Переуступить');
        }
        else { MODalert('Что-то пошло не так, попробуйте еще раз.', 'Переуступка пайщиков'); return false; }


    });

}

/*замещение пользователя*/
function flowreplace(uid) {

    var oldfnum = parseInt($('[data-uid="'+uid+'"]').data('fnum')),
        oldpos = parseInt($('[data-uid="'+uid+'"]').data('pos')),
        fio = $('[data-uid="'+uid+'"]').data('fio');

    $.post("/addons/ajax/fin.inc.php", { uid: uid, oldfnum: oldfnum, oldpos: oldpos, rep: 1, act: 'getustupka' }, function (data) {

        if(data)  {

            MODconfirm(data, 'Удаление: ' + fio, function () {

                var formdata = $('#pereform').serialize(), touser = $('[name="touser"]');

                if(!touser.val().length) { return false; }

                $.post("/addons/ajax/fin.inc.php", { formdata: formdata, act: 'flowreplace' }, function (data) {

                    if(data) { MODalert(data, 'Произошла ошибка:'); return false; }

                    notify('fa fa-retweet', 'Сохранение изменений', 'Всё прошло успешно');
                    
                    //Редирект
                    setTimeout(function () { location.reload(true); }, 850);


                });


            }, 'Отмена', 'Заменить');
        }
        else { MODalert('Что-то пошло не так, попробуйте еще раз.', 'Удаление с заменой'); return false; }


    });
}

/*Удаление юзера со смещением очереди*/
function deluser(uid) {

    var fio = $('[data-uid="'+uid+'"]').data('fio'), fnum = $('[data-uid="'+uid+'"]').data('fnum');

    MODconfirm( 'Вся история платежей будет полностью удалена, как и сам пользователь, а очередь сдвинется на одного вверх.<br><br><strong class="text-danger">Вы действительно хотите удалить этого пользователя ?</strong> ', 'Удаление: ' + fio, function () {

        $.post("/addons/ajax/fin.inc.php", { uid: uid, fnum: fnum, act: 'deluser' }, function(data) {

            if(data) { MODalert(data, 'Произошла ошибка:'); return false; }

            notify('fa fa-user', 'Удаление пайщика', 'Успешно');

            //Редирект
            setTimeout(function () { location.reload(true); }, 850);


        });

        $('.tooltip').remove();
        $('.tip').tooltip();

    });

}


/*Cохранение сортировки*/
function savepos(){

    /*Cоставляем список для сохранения сортировки*/
    var fusers = [];

    $('#flowblock > tr.sortable').each( function(){

        var pid = parseInt($(this).data('uid'));
        fusers.push({id: pid});
    });

    ShowLoading();
    $.post("/addons/ajax/fin.inc.php", { usort: fusers, act: 'savepos' }, function(data){

        HideLoading();

        notify('fa fa-save', 'Позиции в таблице', 'Сохранены успешно');
        
    });

}

/*Сохранение и экспорт таблички*/
function saveposhard () {
    var sdata = [], pid, prog, addedsum, totalcost;

    MODconfirm( '<strong class="text-danger">Внимание!</strong> Данное действие изменит номер очереди у каждого пользователя на данной странице таблицы, а также и перераспределит позиции заново. ', 'Перераспределение очереди и позиций пользователей', function () {


        $('#flowblock > tr.sortable').each(function () {

            pid = parseInt($(this).data('uid'));
            prog = parseInt($(this).data('prog'));
            addedsum = parseInt($(this).data('addedsum'));
            totalcost = parseInt($(this).data('totalcost'));

            sdata.push({id: pid, prog: prog, addedsum: addedsum, totalcost: totalcost});

        });

        ShowLoading();
        $.post("/addons/ajax/fin.inc.php", { usort: sdata, act: 'saveposhard' }, function(data){

            HideLoading();

            notify('fa fa-refresh', 'Очередь и позиции', 'Сохранены успешно');

            //Редирект
            setTimeout(function () { location.reload(true); }, 850);


        });
    });
}

/*Постраничная навигация для платежей*/
function list_submit(prm){

    ShowLoading();

    $.post("/addons/ajax/fin.inc.php", { page: prm, act: 'flowajxpages'  }, function(data){

        HideLoading();

        if(data.tbl) {
            $('#flowblock').html(data.tbl);
            $('#fcount').html(data.count);

            /*Построение навигации*/
            if(data.nav) {

                $('#navblock').html(data.nav);
                if(!$('#navft').is(':visible')) { $('#navft').fadeIn('slow'); }

            }
        }
        else {
            $('#fcount').html('0');
            $('#flowblock').html('<tr><td colspan="7">Нет информации для отображения</td></tr>');
        }


    }, 'json');
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

/*Инит загрузка*/
$(document).ready(function (){

    //Tooltip
    $('.tip').tooltip();

    var selem = document.getElementById('flowblock'),
        sortable = new Sortable(selem, {
            group: "sorting",
            sort: true,  // sorting inside list
            delay: 0, // time in milliseconds to define when the sorting should start
            disabled: false, // Disables the sortable if set to true.
            store: null,  // @see Store
            animation: 100,  // ms, animation speed moving items when sorting, `0` — without animation
            handle: ".draghandle",  // Drag handle selector within list items
            filter: ".ignore-elements",  // Selectors that do not lead to dragging (String or Function)
            draggable: ".sortable",  // Specifies which items inside the element should be sortable
            ghostClass: "sortable-ghost",  // Class name for the drop placeholder
            dataIdAttr: 'data-pos',

            scroll: true, // or HTMLElement
            scrollSensitivity: 50, // px, how near the mouse must be to an edge to start scrolling.
            scrollSpeed: 20 // px

        });
    
});