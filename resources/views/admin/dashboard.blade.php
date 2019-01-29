@extends('admin.layouts.app')

@section('title', 'Личный кабинет')
{{--@push('css')--}}

{{--<link href="{{ asset('css/admin/dashboard.css') }}" rel="stylesheet" type="text/css">--}}

{{--@endpush--}}


@push('scripts')

<script src="{{ asset('js/admin/dashboard.js') }}"></script>

@endpush


@section('content')

    <div class="row">
        <!-- Start XP Col -->
        <div class="col-md-12 col-lg-12 col-xl-7">

            <div class="row">

                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card bg-primary m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box">
                                <div class="float-left">
                                    <h4 class="xp-counter text-white">6 000 000</h4>
                                    <p class="mb-0 text-white">Стоимость квартиры</p>
                                </div>
                                <div class="float-right">
                                    <div class="xp-widget-icon xp-widget-icon-bg">
                                        <i class="mdi mdi-home font-40 text-white"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box">
                                <div class="float-left">
                                    <h4 class="xp-counter text-primary">203-17/12-18</h4>
                                    <p class="mb-0 text-muted">Номер договора</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box">
                                <div class="float-left">
                                    <h4 class="xp-counter text-primary">17.12.18</h4>
                                    <p class="mb-0 text-muted">Дата договора</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card bg-success m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box">
                                <div class="float-left ">
                                    <h4 class="xp-counter text-white">2 235 000</h4>
                                    <p class="mb-0 font-16 text-white">Внесенная сумма</p>
                                </div>
                                <div class="float-right">
                                    <div class="xp-widget-icon xp-widget-icon-bg ">
                                        <i class="mdi mdi-cash-multiple font-30 text-white"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="progress mt-3 mb-1" style="height: 15px;">
                                    <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                </div>
                                <p class="mb-0 text-white">Накоплено паевого взноса</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card bg-danger m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box">
                                <div class="float-left ">
                                    <h4 class="xp-counter text-white">3 480 000</h4>
                                    <p class="mb-0 font-16 text-white">Остаток задолженности</p>
                                </div>
                                <div class="float-right">
                                    <div class="xp-widget-icon xp-widget-icon-bg ">
                                        <i class="mdi mdi-cash-refund font-30 text-white"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="progress mt-3 mb-1" style="height: 15px;">
                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">100%</div>
                                </div>
                                <p class="mb-0 text-white">Осталось выплатить</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box text-center">
                                <div class="xp-widget-icon xp-widget-icon-bg bg-warning-rgba">
                                    <i class="mdi mdi-home font-30 text-warning"></i>
                                </div>
                                <h4 class="xp-counter text-warning m-t-20">г. Костанай, пр. Абая д. 10 кв. 46</h4>
                                <p class="text-muted">Адрес недвижимости</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box text-center">
                                <div class="xp-widget-icon xp-widget-icon-bg bg-warning-rgba">
                                    <i class="mdi mdi-calendar font-30 text-warning"></i>
                                </div>
                                <h4 class="xp-counter text-warning m-t-20">17.04.2017</h4>
                                <p class="text-muted">Дата покупки жилья</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start XP Col -->

                <!-- End XP Col -->
            </div>

        </div>
        <!-- End XP Col -->

        <!-- Start XP Col -->
        <div class="col-md-12 col-lg-12 col-xl-5">
            <div class="row">
                <!-- Start XP Col -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card bg-success-gradient m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box text-white text-center pt-3">
                                <p class="xp-icon-timer mb-4">
                                    <i class="icon-trophy"></i>
                                </p>
                                <h4 class="mb-2 font-20">Добро пожаловать, Иванов Алексей Сергеевич!</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End XP Col -->

                <!-- Start XP Col -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card bg-danger-gradient m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box xp-widget-newsletter text-white text-center pt-3">
                                <p class="xp-icon-timer mb-4"><i class="icon-paper-plane"></i></p>
                                <h4 class="mb-2 font-20">Во время оплачивайте все платежи</h4>
                                <p class="mb-3">Не забывайте оплачивать ежемесячные платежи</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End XP Col -->
                <!-- Start XP Col -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card bg-primary-gradient m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box xp-widget-newsletter text-white text-center pt-3">
                                <p class="xp-icon-timer mb-4"><i class="icon-home"></i></p>
                                <h4 class="mb-2 font-20">Купленных квартир</h4>
                                <h2 class="mb-3">21</h2>
                                <p class="mb-3">Количество купленных квартир кооперативом за все время</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End XP Col -->
                <!-- Start XP Col -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card bg-warning-gradient m-b-30">
                        <div class="card-body">
                            <div class="xp-widget-box xp-widget-newsletter text-white text-center pt-3">
                                <p class="xp-icon-timer mb-4"><i class="icon-people"></i></p>
                                <h4 class="mb-2 font-20">Количество пайщиков</h4>
                                <h2 class="mb-3">71</h2>
                                <p class="mb-3">Количество членов нашей большой семьи</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End XP Col -->
            </div>
        </div>
        <!-- End XP Col -->

    </div>

    <div class="row">

        <!-- Start XP Col -->
        <div class="col-md-12 col-lg-12 col-xl-7 align-self-center">
            <div class="card bg-white m-b-30">
                <div class="card-header bg-white">
                    <h5 class="card-title text-black mb-0">Последние платежи</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">№</th>
                                <th class="border-top-0">Дата платежа</th>
                                <th class="border-top-0">Сумма</th>
                                <th class="border-top-0">Номер документа</th>
                                <th class="border-top-0">Тип платежа</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>01/05/2018</td>
                                <td>$100</td>
                                <td>884018</td>
                                <td>
                                    <span class="badge badge-pill badge-success btn-shadow">Паевой взнос</span>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>05/05/2018</td>
                                <td>$250</td>
                                <td>787848018</td>
                                <td>
                                    <span class="badge badge-pill badge-danger btn-shadow">Вступительный платеж</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>01/06/2018</td>
                                <td>$550</td>
                                <td>877018</td>
                                <td>
                                    <span class="badge badge-pill badge-warning btn-shadow">Членский взнос</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-5">
            <div class="card m-b-30">
                <div class="card-header bg-white">
                    <h5 class="card-title text-black mb-0">События в кооперативе</h5>
                </div>
                <div class="card-body">
                    <div class="xp-actions-history">
                        <div class="xp-actions-history-list">
                            <div class="xp-actions-history-item">
                                <h6 class="mb-1 text-black">Иванов Иван Иванович</h6>
                                <p class="text-muted font-12">17.12.2018 Куплена квартира</p>
                            </div>
                        </div>
                        <div class="xp-actions-history-list">
                            <div class="xp-actions-history-item">
                                <h6 class="mb-1 text-black">Петров Петр Сергеевич</h6>
                                <p class="text-muted font-12">17.12.2018 Программа Дом</p>
                            </div>
                        </div>
                        <div class="xp-actions-history-list">
                            <div class="xp-actions-history-item">
                                <h6 class="mb-1 text-black">Серикболсык Анвар Серикович</h6>
                                <p class="text-muted font-12">17.12.2018 Накопительная программа</p>
                            </div>
                        </div>
                        <div class="xp-actions-history-list">
                            <div class="xp-actions-history-item">
                                <h6 class="mb-1 text-black">Долгов Олег Борисович</h6>
                                <p class="text-muted font-12">17.12.2018 Накопительная программа</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End XP Col -->




        <!-- Start XP Col
        <div class="col-md-12 col-lg-12 col-xl-4">
                <div class="card m-b-30">
                        <div class="card-header bg-white">
                                <h5 class="card-title text-black mb-0">Actions History</h5>
                        </div>
                        <div class="card-body">
                                <div class="xp-actions-history">
                                        <div class="xp-actions-history-list">
                                                <div class="xp-actions-history-item">
                                                        <h6 class="mb-1 text-black">Start Web Designing</h6>
                                                        <p class="text-muted font-12">5 mins ago</p>
                                                        <p class="m-b-30">We are start working on USA Project</p>
                                                </div>
                                        </div>
                                        <div class="xp-actions-history-list">
                                                <div class="xp-actions-history-item">
                                                        <h6 class="mb-1 text-black">Completed Theme Development</h6>
                                                        <p class="text-muted font-12">15 mins ago</p>
                                                        <p class="m-b-30">We are completed a theme development into 5 days</p>
                                                </div>
                                        </div>
                                        <div class="xp-actions-history-list">
                                                <div class="xp-actions-history-item">
                                                        <h6 class="mb-1 text-black">Project Submitted</h6>
                                                        <p class="text-muted font-12">30 mins ago</p>
                                                        <p class="m-b-30">We are done process of submitted project</p>
                                                </div>
                                        </div>
                                        <div class="xp-actions-history-list">
                                                <div class="xp-actions-history-item">
                                                        <h6 class="mb-1 text-black">Received a Payment</h6>
                                                        <p class="text-muted font-12">45 mins ago</p>
                                                        <p class="m-b-30">We got monthy payment from clients</p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
         End XP Col -->

        <!-- Start XP Col
        <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                        <div class="card-header bg-white">
                                <h5 class="card-title text-black mb-0">Social Profile</h5>
                        </div>
                        <div class="card-body">
                                <div class="xp-social-profile">
                                        <div class="xp-social-profile-img">
                                                <div class="row">
                                                        <div class="col-4 px-1">
                                                                <img src="assets/images/ui-images/image-circle.jpg" class="rounded img-fluid" alt="img">
                                                        </div>
                                                        <div class="col-4 px-1">
                                                                <img src="assets/images/ui-images/image-rounded.jpg" class="rounded img-fluid" alt="img">
                                                        </div>
                                                        <div class="col-4 px-1">
                                                                <img src="assets/images/ui-images/image-thumbnail.jpg" class="rounded img-fluid" alt="img">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="xp-social-profile-top">
                                                <div class="row">
                                                        <div class="col-3">
                                                                <div class="xp-social-profile-star py-3">
                                                                        <i class="icon-star font-20"></i>
                                                                </div>
                                                        </div>
                                                        <div class="col-6">
                                                                <div class="xp-social-profile-avatar text-center">
                                                                        <img src="assets/images/ui-media/media-image-8.jpg" alt="user-profile" class="rounded-circle img-fluid"><span class="xp-social-profile-live"></span>
                                                                </div>
                                                        </div>
                                                        <div class="col-3">
                                                                <div class="xp-social-profile-menu text-right py-3">
                                                                        <i class="icon-options font-20"></i>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="xp-social-profile-middle text-center">
                                                <div class="row">
                                                        <div class="col-12">
                                                                <div class="xp-social-profile-title">
                                                                        <h5 class="my-1 text-black">karina_simons</h5>
                                                                </div>
                                                                <div class="xp-social-profile-subtitle">
                                                                        <p class="mb-3 text-muted">Karina Simons</p>
                                                                </div>
                                                                <div class="xp-social-profile-desc">
                                                                        <p class="text-muted mb-1">Lifestyle coach and photographer <br />delivering best images only...</p>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="xp-social-profile-bottom text-center">
                                                <div class="row">
                                                        <div class="col-4">
                                                                <div class="xp-social-profile-media pt-3">
                                                                        <h5 class="text-black my-1">45</h5>
                                                                        <p class="mb-0 text-muted">Posts</p>
                                                                </div>
                                                        </div>
                                                        <div class="col-4">
                                                                <div class="xp-social-profile-followers pt-3">
                                                                        <h5 class="text-black my-1">278k</h5>
                                                                        <p class="mb-0 text-muted">Fans</p>
                                                                </div>
                                                        </div>
                                                        <div class="col-4">
                                                                <div class="xp-social-profile-following pt-3">
                                                                        <h5 class="text-black my-1">552</h5>
                                                                        <p class="mb-0 text-muted">Likes</p>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
         End XP Col -->

        <!-- Start XP Col
        <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                        <div class="card-header bg-white">
                                <h5 class="card-title text-black mb-0">To do Lists</h5>
                        </div>
                        <div class="card-body">
                                <div class="xp-to-do-list">
                                        <ul id="list-group" class="list-group list-group-flush"></ul>
                                        <form class="add-items">
                                                <div class="input-group mt-3">
                                                        <input type="text" class="form-control" id="todo-list-item" placeholder="What do you need to do today?" aria-label="What do you need to do today?" aria-describedby="button-addon-to-do-list">
                                                        <div class="input-group-append">
                                                                <button class="btn btn-primary add" id="button-addon-to-do-list" type="submit">Add to List</button>
                                                        </div>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
            End XP Col -->

    </div>

@endsection