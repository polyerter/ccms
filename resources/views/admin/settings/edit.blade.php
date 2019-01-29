@extends('admin.layouts.app')

@section('title', 'Настройки системы')

@push('css')

  <link href="{{ asset('css/admin/settings.css') }}" rel="stylesheet" type="text/css">

@endpush

@push('scripts')

  <script src="{{ asset('js/admin/settings.js') }}"></script>

  <script src="{{ asset('js/admin/plugins/jquery.bootstrap-touchspin.min.js') }}"></script>
  <script src="{{ asset('js/admin/init/form-touchspin-init.js') }}"></script>

  <script src="{{ asset('js/admin/plugins/switchery.min.js') }}"></script>
  <script src="{{ asset('js/admin/init/switchery-init.js') }}"></script>

@endpush

@section('content')
  <div class="row">

    <!-- Start XP Col -->
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header bg-white">
          <h5 class="card-title text-black">Все настройки системы CoopCMS</h5>
        </div>
        {!! Form::open(['route' => ['admin.settings.update', $settings->id],
        'files'	=>	true,
        'method' => 'put']) !!}

        <div class="card-body">

          @include('admin.layouts.bodyerrors')

          <ul class="nav nav-tabs nav-justified mb-3" id="defaultTabJustified" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" id="home-tab-justified" data-toggle="tab" href="#main-justified" role="tab" aria-controls="main" aria-selected="true">Общие настройки</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="bank-tab-justified" data-toggle="tab" href="#bank-justified" role="tab" aria-controls="bank" aria-selected="false">Банковские реквизиты</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="finace-tab-justified" data-toggle="tab" href="#finance-justified" role="tab" aria-controls="finance" aria-selected="false">Движение финансов</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="flow-tab-justified" data-toggle="tab" href="#flow-justified" role="tab" aria-controls="flow" aria-selected="false">Очередь</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pay-tab-justified" data-toggle="tab" href="#pay-justified" role="tab" aria-controls="pay" aria-selected="false">Пайщики</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="notif-tab-justified" data-toggle="tab" href="#notif-justified" role="tab" aria-controls="notif" aria-selected="false">Уведомления</a>
            </li>
          </ul>
          <div class="tab-content" id="defaultTabJustifiedContent">

            <div class="tab-pane fade active show" id="main-justified" role="tabpanel" aria-labelledby="home-tab-justified">
              <div class="form-group row">
                <label class="col-sm-3 control-label">Название сайта: <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="sitename" class="form-control" required placeholder="например: Моя домашняя страница" value="{{ $settings->sitename }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 control-label">URL сайта (без http или https): <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="siteurl" class="form-control" required placeholder="например: mail.ru" value="{{ $settings->siteurl }}" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 control-label">Описание (Description) сайта: <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="sitedescription" class="form-control" placeholder="Краткое описание, не более 200 символов" value="{{ $settings->sitedescription }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Ключевые слова (Keywords) для сайта: <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                  <textarea class="form-control" id="val-suggestions" name="sitekeywords" rows="5" placeholder="Введите через запятую основные ключевые слова для вашего сайта">{{ $settings->sitekeywords }}</textarea>
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Логотип фирмы: </label>
                <div class="col-lg-9">
                  @if(!empty($settings->sitelogo))
                    <img src="{{ asset($settings->getImage()) }}" alt="" width="200" >
                  @endif
                  <input type="file" class="form-control" name="sitelogo" id="inputFile">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Количество новостей на страницу: </label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="xp-touchspin-value-attribute" name="amountnews" value="{{ $settings->amountnews }}">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Выключить сайт: </label>
                <div class="col-lg-9">
                  <div class="xp-switchery">
                    {{ Form::checkbox('offsite','on',$settings->offsite,['class'=>'js-switch-primary']) }}
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Причина отключения сайта: </label>
                <div class="col-lg-9">
                  <textarea class="form-control" id="val-suggestions" name="textoffsite" rows="5" placeholder="Сообщение для отображения в режиме отключенного сайта">{{ $settings->textoffsite }}</textarea>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="bank-justified" role="tabpanel" aria-labelledby="bank-tab-justified">
              <div class="form-group row">
                <label class="col-sm-3 control-label">Юридическое название организации: </label>
                <div class="col-sm-9">
                  <input type="text" name="nameorg" class="form-control" placeholder="например: АО Рога и копыта»" value="{{ $settings->nameorg }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 control-label">Юридическое адрес организации: </label>
                <div class="col-sm-9">
                  <input type="text" name="adressorg" class="form-control" placeholder="например: г. Астана, Мира 10»" value="{{ $settings->adressorg }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 control-label">БИН организации: </label>
                <div class="col-sm-9">
                  <input type="text" name="binorg" class="form-control" placeholder="максимум 12 символов" value="{{ $settings->binorg }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 control-label">Название банка: </label>
                <div class="col-sm-9">
                  <input type="text" name="bankname" class="form-control" placeholder="например: АО «Народный Банк Казахстана»" value="{{ $settings->bankname }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 control-label">БИК банка: </label>
                <div class="col-sm-9">
                  <input type="text" name="bankbik" class="form-control" placeholder="максимум 8 символов" value="{{ $settings->bankbik }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Расчетный счет: <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                  <input type="text" name="bankrs" class="form-control" placeholder="максимум 20 символов" value="{{ $settings->bankrs }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">КБЕ: <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                  <input type="text" name="bankkbe" class="form-control" placeholder="максимум 2 символа" value="{{ $settings->bankkbe }}">
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="finance-justified" role="tabpanel" aria-labelledby="finance-tab-justified">
              <div class="form-group row">
                <label class="col-sm-3 control-label">Вкл/Выкл отображения истории платежей: </label>
                <div class="col-lg-9">
                  <div class="xp-switchery">
                    {{ Form::checkbox('offpays','on',$settings->offpays,['class'=>'js-switch-primary']) }}
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 control-label">Вкл/Выкл отображения очереди: </label>
                <div class="col-sm-9">
                  <div class="xp-switchery">
                    {{ Form::checkbox('offrow','on',$settings->offrow,['class'=>'js-switch-primary']) }}
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="flow-justified" role="tabpanel" aria-labelledby="flow-tab-justified">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Получение очереди в процентах: </label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="xp-touchspin-value-attribute" name="rowdec" value="{{ $settings->rowdec }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Кол-во записей на страницу (очередь): </label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="xp-touchspin-value-attribute" name="rowam" value="{{ $settings->rowam }}">
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="pay-justified" role="tabpanel" aria-labelledby="pay-tab-justified">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Количество символов в пароле пайщика (админ): </label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="xp-touchspin-value-attribute" name="userampass" value="{{ $settings->userampass }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Кол-во записей на страницу (главная страница): </label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="xp-touchspin-value-attribute" name="userampay" value="{{ $settings->userampay }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">Кол-во записей в блоке истории платежей пайщика: </label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="xp-touchspin-value-attribute" name="userampays" value="{{ $settings->userampays }}">
                </div>
              </div>

            </div>

            <div class="tab-pane fade" id="notif-justified" role="tabpanel" aria-labelledby="notif-tab-justified">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="val-suggestions">За сколько дней до конца месяца начинать уведомлять пайщика об отсутствии платежей: </label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="xp-touchspin-value-attribute" name="daysoffpays" value="{{ $settings->daysoffpays }}">
                </div>
              </div>
            </div>

          </div> <!-- tab-content -->
          <input type="submit" class="btn btn-primary" value="Сохранить">
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- End XP Col -->

  </div>
@endsection