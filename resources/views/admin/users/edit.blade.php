@php $global = DB::table('settings')->first(); @endphp

@extends('admin.layouts.app')

@section('title', 'Добавить пользователя в кооператив')

@push('css')
    <link href="{{ asset('css/admin/users/css/create_user.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/settings.css') }}" rel="stylesheet" type="text/css">

    {{--  <link href="{{ asset('css/admin/users/css/jstree.min.css') }}" rel="stylesheet" type="text/css">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css"/>--}}


@endpush

@push('scripts')
    <script src="{{ asset('js/admin/users/js/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin/init/form-inputmask-init.js') }}"></script>

    <script src="{{ asset('js/admin/plugins/switchery.min.js') }}"></script>
    <script src="{{ asset('js/admin/init/switchery-init.js') }}"></script>

    <script src="{{ asset('js/admin/users/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/users/js/datepicker.en.js') }}"></script>
    <script src="{{ asset('js/admin/init/form-datepicker-init.js') }}"></script>


    {{--  <script src="{{ asset('js/admin/users/js/jstree.min.js') }}"></script>--}}
    {{--  <script src="{{ asset('js/admin/init/jstree-init.js') }}"></script>--}}
    {{--генератор пароля--}}
    <script type="text/javascript">
        function urlLit(w, v) {
            var tr = 'a b v g d e ["zh","j"] z i y k l m n o p r s t u f h c ch sh ["shh","shch"] ~ y ~ e yu ya ~ ["jo","e"]'.split(' ');
            var ww = '';
            w = w.toLowerCase();
            for (i = 0; i < w.length; ++i) {
                cc = w.charCodeAt(i);
                ch = (cc >= 1072 ? tr[cc - 1072] : w[i]);
                if (ch.length < 3) ww += ch; else ww += eval(ch)[v];
            }
            return (ww.replace(/[^a-zA-Z0-9\-]/g, '-').replace(/[-]{2,}/gim, '-').replace(/^\-+/g, '').replace(/\-+$/g, ''));
        }

        $(document).ready(function ($) {
            $('#val-fam').bind('change keyup input click', function () {
                $('#mail-pay').val(urlLit($('#val-fam').val(), 0))
            });
            $('#val-name').on('input', function () {
                var fname = urlLit($('#val-fam').val(), 0);
                var newname = urlLit($('#val-name').val(), 0)
                var totalname = fname + newname;
                $('#mail-pay').val(totalname);
            });
        });
    </script>
    <script>
        function generate() {
            var pass = "";
            var strong = {{ $global->userampass }};
            var dic = "abcdefghijklmnopqrstuvwxyz1234567890!@#$%&";

            for (var i = 0; i < strong; i++) {
                pass += dic.charAt(Math.floor(Math.random() * dic.length));
            }
            $('#pass').val(pass);
        }
    </script>

    {{--<script>--}}
    {{--$.ajaxSetup({--}}
    {{--beforeSend: function(xhr, type) {--}}
    {{--if (!type.crossDomain) {--}}
    {{--xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));--}}
    {{--}--}}
    {{--},--}}
    {{--});--}}
    {{--function updatePermissions(id, li) {--}}
    {{--var items = [];--}}
    {{--/* Формирует массив прав к отправке */--}}
    {{--for (var i = 0; i < li.length; i++) {--}}
    {{--items.push(parseInt(li[i].id));--}}
    {{--}--}}
    {{--if (items.length) {--}}
    {{--$.ajax({--}}
    {{--type: 'post',--}}
    {{--url: '{{ url('admin/permissions/set') }}',--}}
    {{--data: {--}}
    {{--user: id,--}}
    {{--data: items,--}}
    {{--_token: '{!! csrf_token() !!}',--}}
    {{--},--}}
    {{--success: function (data) {--}}
    {{--}--}}
    {{--});--}}
    {{--}--}}
    {{--}--}}
    {{--$(document).ready(function () {--}}
    {{--/**--}}
    {{--//  todo Получение прав пользователя, проходит по всем элементам с классом permissions--}}
    {{--**/--}}

    {{--$('.permissions').each(function (ind, el) {--}}
    {{--var id = $(el).data('id'); // получение id пользователя--}}
    {{--$.post('{{ url('admin/permissions/get') }}', {user: id}, function (data) { // запрос на получение прав--}}
    {{--/* Построение дерева прав */--}}
    {{--// console.log({data}); todo вывод в консоль запроса массива--}}
    {{--$('.permissions').jstree({--}}
    {{--'plugins': [--}}
    {{--"wholerow",--}}
    {{--"checkbox"--}}
    {{--],--}}
    {{--"checkbox": {--}}
    {{--"real_checkboxes": false,--}}
    {{--"three_state": true--}}
    {{--},--}}
    {{--'core': {--}}
    {{--"themes": {--}}
    {{--"icons": false--}}
    {{--},--}}
    {{--'data': data--}}
    {{--}--}}
    {{--})--}}

    {{--.on('deselect_node.jstree', function (e, data) {--}}
    {{--updatePermissions(id, data.instance.get_selected(true));--}}
    {{--})--}}
    {{--.on('select_node.jstree', function (e, data) {--}}
    {{--updatePermissions(id, data.instance.get_selected(true));--}}
    {{--})--}}
    {{--.on('ready.jstree', function () {--}}
    {{--$(this).jstree("close_all");--}}
    {{--});--}}

    {{--});--}}
    {{--});--}}

    {{--})--}}
    {{--</script>--}}

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>--}}

@endpush

@section('content')

    <div class="row">

        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header bg-white">
                    <h5 class="card-title text-black">Основные данные </h5>
                    <h6 class="card-subtitle">Введите основные данные</h6>
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => [ 'admin.users.update', $users->id], 'method' => 'put']) !!}

                    @include('admin.layouts.bodyerrors')

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-fam">Фамилия <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="val-fam" name="familiya"
                                   placeholder="Введите фамилию пайщика.." value="{{ $users->familiya }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-name">Имя <span
                                    class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="val-name" name="imya"
                                   placeholder="Введите имя пайщика.." value="{{ $users->imya }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-otch">Отчество </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="val-otch" name="otchestvo"
                                   placeholder="Введите отчество пайщика.." value="{{ $users->otchestvo }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-email">Логин </label>
                        <div class="col-lg-9 input-group">
                            <input type="text" name="name" id="mail-pay" class="form-control" placeholder=""
                                   aria-label="Recipient's username" aria-describedby="basic-addon2" readonly=""
                                   value="{{ $users->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-email">Email </label>
                        <div class="col-lg-9 input-group">
                            <input type="text" name="email" id="mail-pay" class="form-control" placeholder=""
                                   aria-label="Recipient's username" aria-describedby="basic-addon2"
                                   value="{{ $users->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-password">Пароль </label>
                        <div class="col-lg-9 input-group">
                            <input type="text" id="pass" name="password" class="form-control" placeholder="Пароль"
                                   aria-label="Пароль" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="passgen" onclick="generate()"><i
                                            class="mdi mdi-key"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-currency">Телефон <span
                                    class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="xp-inputmask-phone" name="phone"
                                   placeholder="+7 (___) ___-__-__" value="{{ $users->phone }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-currency">Дата рождения <span
                                    class="text-danger">*</span></label>
                        <div class="input-group col-lg-9">
                            <input type="text" id="xp-default-date" class="datepicker-here form-control" name="birthday"
                                   aria-describedby="basic-addon2" value="{{ $users->birthday }}"/>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header bg-white">
                    <h5 class="card-title text-black">Дополнительные данные </h5>
                    <h6 class="card-subtitle">Введите дополнительные данные пайщика</h6>
                </div>

                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-username">Стоимость жилья <span
                                    class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="val-username" name="housing"
                                   placeholder="Примерная стоимость жилья" value="{{ $users->housing }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-username">Откуда (Город) </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="val-username" name="city" placeholder="Город"
                                   value="{{ $users->city }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-username">Договор № <span
                                    class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="xp-inputmask-dogovor" name="numberdoc"
                                   placeholder="___-__/__-____" value="{{ $users->numberdoc }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-currency">Дата договора <span
                                    class="text-danger">*</span></label>
                        <div class="input-group col-lg-9">
                            <input type="text" id="xp-default-date" class="datepicker-here form-control" name="datesoc"
                                   placeholder="дд.мм.гггг" aria-describedby="basic-addon2"
                                   value="{{ $users->datesoc }}"/>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-currency">Дата покупки кв.</label>
                        <div class="input-group col-lg-9">
                            <input type="text" id="xp-default-date" class="datepicker-here form-control"
                                   name="datepayhous" placeholder="дд.мм.гггг" aria-describedby="basic-addon2"
                                   value="{{ $users->datepayhous }}"/>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-currency">Роль в системе</label>
                        <div class="input-group col-lg-9">
                            {{ Form::select('role', [
                                  'Администрация' => ['1' => 'Администратор', '2' => 'Помошник администратора'],
                                  'Менеджеры' => ['3' => 'Менеджер', '4' => 'Помошник менеджера'],
                                  'Пайщики и родня' => ['5' => 'Пайщик', '6' => 'Родственник пайщика']
                              ], '5', ['class' => 'form-control', 'id' => 'formControlSelect']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-suggestions">Уже заселен: </label>
                        <div class="col-lg-3">
                            <div class="xp-switchery">
                                {{ Form::checkbox('inhabited','on', $users->inhabited, ['class'=>'js-switch-primary']) }}
                            </div>
                        </div>
                        <label class="col-lg-3 col-form-label" for="val-suggestions">В очередь: </label>
                        <div class="col-lg-3">
                            <div class="xp-switchery">
                                {{ Form::checkbox('rowup','on', $users->rowup, ['class'=>'js-switch-info']) }}
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="val-suggestions">В архив: </label>
                        <div class="col-lg-3">
                            <div class="xp-switchery">
                                {{ Form::checkbox('archive','on', $users->archive, ['class'=>'js-switch-warning']) }}
                            </div>
                        </div>
                        <label class="col-lg-3 col-form-label" for="val-suggestions">Заблокировать: </label>
                        <div class="col-lg-3">
                            <div class="xp-switchery">
                                {{ Form::checkbox('status','on', $users->status, ['class'=>'js-switch-danger']) }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Сохранить">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>

@endsection
