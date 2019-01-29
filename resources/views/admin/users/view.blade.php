@extends('admin.layouts.app')

@section('title', 'Профиль пользователя')

@section('content')

    <!-- Write page content code here -->

    <!-- Start XP Row -->
    <div class="row">

      <!-- Start XP Col -->
      <div class="col-lg-6 col-xl-4">
        <div class="card bg-white text-left p-3">
          <div class="row">
            <div class="col-lg-8">
              <div class="text-black my-1">
                <span class="badge badge-pill badge-primary">{{ $users->id }}</span> <i class="icon-user"></i> <strong>{{ $users->email }}</strong>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="btn-group">
                <a href="#" title="Редактирование" class="btn btn-outline-warning pull-right">
                  <i class="fa fa-pencil-square"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <br>

        <div class="card m-b-30">
          <div class="card-header bg-white">
            <h5 class="card-title text-black mb-0">Общая информация</h5>
          </div>
          <div class="card-body">
            <div class="xp-social-profile">
              <div class="xp-social-profile-top">
                <div class="row">
                  <div class="col-12">
                    <div class="xp-social-profile-avatar text-center">
                      {{--<img src="assets/images/ui-media/media-image-8.jpg" alt="user-profile" class="rounded-circle img-fluid">--}}
                      {{--<span class="xp-social-profile-live"></span> <!-- здесь активность в сети -->--}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="xp-social-profile-middle text-center">
                <div class="row">
                  <div class="col-12">
                    <div class="xp-social-profile-title">
                      <h5 class="my-1 text-black">{{ $users->familiya }} {{ $users->imya }} {{ $users->otchestvo }}</h5>
                    </div>
                    <div class="xp-social-profile-subtitle">
                      <p class="mb-3 text-muted">Пайщик</p>
                    </div>
                    <div class="xp-social-profile-desc">
                      <p class="text-muted mb-1">Здесь будет текст для засранца</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="xp-social-profile-bottom text-center">
                <div class="row">
                  <div class="col-4">
                    <div class="xp-social-profile-media pt-3">
                      <h5 class="text-black my-1">12.20.2016</h5>
                      <p class="mb-0 text-muted"><i class="mdi mdi-account-edit"></i> Регистрация</p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="xp-social-profile-followers pt-3">
                      <h5 class="text-black my-1">09.01.2018 18:00</h5>
                      <p class="mb-0 text-muted"><i class="mdi mdi-web"></i> Был в сети</p>
                    </div>
                  </div>
                  <div class="col-4">

                  </div>
                </div>
              </div>
            </div>
            <hr>
            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab-justified" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab-justified" data-toggle="pill" href="#pills-home-justified" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-info-circle"></i> Общая</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab-justified" data-toggle="pill" href="#pills-profile-justified" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa fa-building"></i> Кооператив</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab-justified" data-toggle="pill" href="#pills-contact-justified" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fa fa-money"></i> Платежи</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tab-justifiedContent">
              <div class="tab-pane fade show active" id="pills-home-justified" role="tabpanel" aria-labelledby="pills-home-tab-justified">
                <table class="table">
                  <tr>
                    <td><i class="mdi mdi-calendar"></i> Дата рождения:</td>
                    <td><span class="pull-right">{{ $users->birthday }}</span></td>
                  </tr>
                  <tr>
                    <td><i class="mdi mdi-city-variant"></i> Город </td>
                    <td><span class="pull-right">г. {{ $users->city }}</span></td>
                  </tr>
                  <tr>
                    <td><i class="icon-phone"></i> Телефон:</td>
                    <td><span class="pull-right"><a href="tel:{{ $users->phone }}">{{ $users->phone }}</a></span></td>
                  </tr>
                </table>
              </div>
              <div class="tab-pane fade" id="pills-profile-justified" role="tabpanel" aria-labelledby="pills-profile-tab-justified">
                <table class="table">
                  <tr>
                    <td>Номер договора:</td>
                    <td>
                      <span class="pull-right">{{ $users->numberdoc }}</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Дата договора:</td>
                    <td><span class="pull-right">{{ $users->datesoc }}</span></td>
                  </tr>
                  <tr>
                    <td>Менеджер:</td>
                    <td><span class="pull-right">Нургазин Гайниден</span></td>
                  </tr>
                  <tr>
                    <td>Номер в очереди:</td>
                    <td><span class="pull-right">без номера</span></td>
                  </tr>
                  <tr>
                    <td>Адрес недвижимости:</td>
                    <td><span class="pull-right">г. Костанай, ул. Аль-Фараби д. 96 кв. 33</span></td>
                  </tr>
                  <tr>
                    <td>Дата приобретения недвижимости:</td>
                    <td><span class="pull-right">{{ $users->datepayhous }}</span></td>
                  </tr>
                  <tr>
                    <td>Стоимость жилья:</td>
                    <td><span class="pull-right">{{ $users->housing }} тг</span></td>
                  </tr>
                </table>
              </div>
              <div class="tab-pane fade" id="pills-contact-justified" role="tabpanel" aria-labelledby="pills-contact-tab-justified">
                <table class="table">
                  <tr>
                    <td>Сумма платежей:</td>
                    <td>
                      <span class="pull-right">2 720 239 тг</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Долг перед кооперативом:</td>
                    <td><span class="pull-right">2 279 761 тг</span></td>
                  </tr>
                  <tr>
                    <td>Вступительные: <span class="badge badge-pill badge-danger btn-shadow">2 шт</span></td>
                    <td><span class="pull-right">500 000 тг</span></td>
                  </tr>
                  <tr>
                    <td>Паевые: <span class="badge badge-pill badge-success btn-shadow">15 шт</span></td>
                    <td><span class="pull-right">2 440 000 тг</span></td>
                  </tr>
                  <tr>
                    <td>Членские: <span class="badge badge-pill badge-warning btn-shadow">15 шт</span></td>
                    <td><span class="pull-right">110 000 тг</span></td>
                  </tr>
                  <tr>
                    <td>Последний платёж от 19.12.2018:</td>
                    <td><span class="pull-right"><span class="badge badge-pill badge-warning btn-shadow">Членский взнос</span> 5 000 тг.</span></td>
                  </tr>
                  <tr>
                    <td>Последний членский взнос:</td>
                    <td><span class="pull-right">5 000 тг. [ 19.12.2018 ]</span></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-8">
        <div class="card m-b-30">
          <div class="card-header bg-success text-white">
            <div class="row">
              <div class="col-lg-10 col-md-12">
                <h5 class="card-title text-white mb-0 pt-2">
                  <i class="fa fa-money"></i> История платежей ( Всего платежей: 48 шт. )
                </h5>
              </div>
              <div class="col-lg-2 col-md-12">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                  <i class="fa fa-plus"></i> Добавить
                </button>

              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive m-b-30">
              <table class="table table-striped">
                <thead>
                <tr>
                  <td>№</td>
                  <td>Дата</td>
                  <td>Сумма</td>
                  <td>Документ №</td>
                  <td>Тип взноса</td>
                  <td>Действия</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>14.10.2016</td>
                  <td class="addedsumm">350 000</td>
                  <td>003</td>
                  <td>Вступительный взнос</td>
                  <td>
                    <a class="btn btn-sm btn-warning" href="#" title="Редактировать платёж">
                      <i class="fa fa-pencil white"></i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="#" title="Удалить платёж">
                      <i class="fa fa-trash white"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>14.10.2016</td>
                  <td class="addedsumm">150 000</td>
                  <td>003</td>
                  <td>Вступительный взнос</td>
                  <td>
                    <a class="btn btn-sm btn-warning" href="#" title="Редактировать платёж">
                      <i class="fa fa-pencil white"></i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="#" title="Удалить платёж">
                      <i class="fa fa-trash white"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>14.10.2016</td>
                  <td class="addedsumm">1 950 000</td>
                  <td>003</td>
                  <td>Паевой взнос</td>
                  <td>
                    <a class="btn btn-sm btn-warning" href="#" title="Редактировать платёж">
                      <i class="fa fa-pencil white"></i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="#" title="Удалить платёж">
                      <i class="fa fa-trash white"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>28.03.2017</td>
                  <td class="addedsumm">35 715</td>
                  <td>025</td>
                  <td>Ежемесячный взнос</td>
                  <td>
                    <a class="btn btn-warning" href="#" title="Редактировать платёж">
                      <i class="fa fa-pencil white"></i>
                    </a>
                    <a class="btn btn-danger" href="#" title="Удалить платёж">
                      <i class="fa fa-trash white"></i>
                    </a>
                  </td>
                </tr>
                </tbody>
                <tfoot id="navft"><tr><td colspan="6" id="navblock"></td></tr></tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- End XP Col -->

    </div>
    <!-- End XP Row -->


@endsection