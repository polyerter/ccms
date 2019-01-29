<div class="xp-rightbar">

  <!-- Start XP Topbar -->
  <div class="xp-topbar">

    <!-- Start XP Row -->
    <div class="row">

      <!-- Start XP Col -->
      <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
        <div class="xp-menubar">
          <a class="xp-menu-hamburger" href="javascript:void();">
            <i class="icon-menu font-20 text-white"></i>
          </a>
        </div>
      </div>
      <!-- End XP Col -->

      <!-- Start XP Col -->
      <div class="col-10 col-md-11 col-lg-11 order-1 order-md-2">
        <div class="xp-profilebar text-right">
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <div class="xp-search">
                <a href="#" class="text-white" data-toggle="modal" data-target="#xpSearchModal"><i class="icon-magnifier"></i></a>

                <!-- Modal -->
                <div class="modal fade" id="xpSearchModal" tabindex="-1" role="dialog" aria-labelledby="xpSearchModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="xp-searchbar">
                          <form>
                            <div class="input-group">
                              <input type="search" class="form-control" placeholder="Поиск" aria-label="Search" aria-describedby="button-addon2">
                              <div class="input-group-append">
                                <button class="btn" type="submit" id="button-addon2">Вперед</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-inline-item">
              <div class="dropdown xp-message">
                <a class="dropdown-toggle text-white" href="#" role="button" id="xp-message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-speech font-18 v-a-m"></i>
                  <span class="badge badge-pill bg-success-gradient xp-badge-up">8</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-message">
                  <ul class="list-unstyled">
                    <li class="media">
                      <div class="media-body">
                        <h5 class="mt-0 mb-0 py-3 text-white text-center font-16">8 новых сообещений</h5>
                      </div>
                    </li>
                    <li class="media xp-msg">
                      {{--<img class="mr-3 align-self-center rounded-circle" src="assets/images/topbar/user-message-1.jpg" alt="Generic placeholder image">--}}
                      <div class="media-body">
                        <a href="#">
                          <h5 class="mt-0 mb-1 font-14">Ariel Blue<span class="font-12 f-w-4 float-right">3 min ago</span></h5>
                          <p class="mb-0 font-13">Thank you for attending...<span class="badge badge-pill badge-success float-right">2</span></p>
                        </a>
                      </div>
                    </li>
                    <li class="media xp-msg">
                      {{--<img class="mr-3 align-self-center rounded-circle" src="assets/images/topbar/user-message-2.jpg" alt="Generic placeholder image">--}}
                      <div class="media-body">
                        <a href="#">
                          <h5 class="mt-0 mb-1 font-14">Jammy Moon<span class="font-12 f-w-4 float-right">5 min ago</span></h5>
                          <p class="mb-0 font-13">Hey no worries! Trust me...<span class="badge badge-pill badge-success float-right">3</span></p>
                        </a>
                      </div>
                    </li>
                    <li class="media xp-msg">
                      {{--<img class="mr-3 align-self-center rounded-circle" src="assets/images/topbar/user-message-3.jpg" alt="Generic placeholder image">--}}
                      <div class="media-body">
                        <a href="#">
                          <h5 class="mt-0 mb-1 font-14">Lisa Ross<span class="font-12 f-w-4 float-right">5:25 PM</span></h5>
                          <p class="mb-0 font-13">Remedies for colic? i don't...<span class="badge badge-pill badge-success float-right">5</span></p>
                        </a>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-body">
                        <h5 class="mt-0 mb-0 py-3 text-black text-center font-14">
                          <a href="#" class="text-primary">Смотреть все</a>
                        </h5>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="list-inline-item">
              <div class="dropdown xp-notification">
                <a class="dropdown-toggle text-white" href="#" role="button" id="xp-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-bell font-18 v-a-m"></i>
                  <span class="badge badge-pill bg-danger-gradient xp-badge-up">2</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-notification">
                  <ul class="list-unstyled">
                    <li class="media">
                      <div class="media-body">
                        <h5 class="mt-0 mb-0 py-3 text-white text-center font-16">2 уведомления</h5>
                      </div>
                    </li>
                    <li class="media xp-noti">
                      <div class="mr-3 xp-noti-icon primary-rgba"><i class="icon-user-follow text-primary"></i></div>
                      <div class="media-body">
                        <a href="#">
                          <h5 class="mt-0 mb-1 font-14">Новый пайщик зарегистрирован</h5>
                          <p class="mb-0 font-12 f-w-4">2 минусы спустя</p>
                        </a>
                      </div>
                    </li>
                    <li class="media xp-noti">
                      <div class="mr-3 xp-noti-icon success-rgba"><i class="icon-basket-loaded text-success"></i></div>
                      <div class="media-body">
                        <a href="#">
                          <h5 class="mt-0 mb-1 font-14">Покупка квартиры Ивановой В.В.</h5>
                          <p class="mb-0 font-12 f-w-4">8:45 PM</p>
                        </a>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-body">
                        <h5 class="mt-0 mb-0 py-3 text-black text-center font-14">
                          <a href="#" class="text-primary">Смотреть все</a>
                        </h5>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="list-inline-item mr-0">
              <div class="dropdown xp-userprofile">
                <a class="dropdown-toggle" href="#" role="button" id="xp-userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span style="color: white">{{ Auth::user()->familiya }} {{ Auth::user()->imya }}</span>
                  {{--<img src="assets/images/topbar/user.jpg" alt="user-profile" class="rounded-circle img-fluid">--}}
                  <span class="xp-user-live"></span></a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-userprofile">
                  <span class="dropdown-item py-3 text-white text-center font-16">Добро пожаловать</span>
                  <a class="dropdown-item" href="{{ route('admin.users.show', [ 'id' => Auth::user()->id]) }}"><i class="icon-user text-primary mr-2"></i> Профиль</a>
                  <a class="dropdown-item" href="#"><i class="icon-wallet text-success mr-2"></i> Финансы</a>
                  <a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="icon-settings text-warning mr-2"></i> Настройки</a>
                  {{--<a class="dropdown-item" href="#"><i class="icon-lock text-info mr-2"></i> Блокировать</a>--}}
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="icon-power text-danger mr-2"></i> Выход
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- End XP Col -->

    </div>
    <!-- End XP Row -->

  </div>
  <!-- End XP Topbar -->

  <!-- Start XP Breadcrumbbar -->

  <div class="xp-breadcrumbbar">
    <div class="row">
      <div class="col-md-6 col-lg-6">
        <h4 class="xp-page-title">@yield('title')</h4>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="xp-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- End XP Breadcrumbbar -->

  <!-- Start XP Contentbar -->
  <div class="xp-contentbar">

    @yield('content')

  </div>
  <!-- End XP Contentbar -->

  <!-- Start XP Footerbar -->
  <div class="xp-footerbar">
    <footer class="footer">
      <p class="mb-0">© 2019 AltynShatyr</p>
    </footer>
  </div>
  <!-- End XP Footerbar -->

</div>