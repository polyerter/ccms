<!-- Start XP Navigationbar -->
<div class="xp-navigationbar">
  <ul class="xp-vertical-menu">
    <li class="xp-vertical-header">Главное меню</li>
    <li>
      <a href="{{ route('admin.index') }}">
        <i class="icon-speedometer"></i>
        <span>Личный кабинет</span>
      </a>
    </li>
    <li>
      <a href="flow.html">
        <i class="icon-people"></i>
        <span>Очередь</span>
      </a>
    </li>
    <li>
      <a href="user-pays.html">
        <i class="mdi mdi-home-currency-usd"></i>
        <span>Платежи</span>
      </a>
    </li>

    <li class="xp-vertical-header">Документальная база</li>

    <li>
      <a href="#">
        <i class="icon-docs"></i><span>Документы кооператива</span>
      </a>
    </li>
    <li class="xp-vertical-header">Общие собрания</li>

    <li>
      <a href="#">
        <i class="mdi mdi-bullhorn-outline"></i><span>Общие собрания</span>
      </a>
    </li>
    <li class="xp-vertical-header">Информационный блок</li>
    <li>
      <a href="javaScript:void();">
        <i class="mdi mdi-newspaper"></i><span>Новости</span><i class="icon-arrow-right pull-right"></i>
      </a>
      <ul class="xp-vertical-submenu">
        <li>
          <a href="news-list.html">Новости</a>
        </li>
        <li>
          <a href="#">Категории</a>
        </li>
        <li><a href="#">Метки</a></li>
      </ul>
    </li>
    <li>
      <a href="#">
        <i class="dripicons-article"></i><span>Статьи</span>
      </a>
    </li>
    <li class="xp-vertical-header">Административные функции</li>
    <li>
      <a href="admin-flow.html">
        <i class="mdi mdi-account-switch"></i><span>Управление очередью</span>
      </a>
    </li>
    @if (Auth::user()->hasPermission('user-list')){{-- todo проверка прав на просмотр и добавление пользователя --}}
      <li>
        <a href="href="javaScript:void();">
          <i class="dripicons-user"></i><span>Пользователи</span><i class="icon-arrow-right pull-right"></i>
        <ul class="xp-vertical-submenu">
          @if (Auth::user()->hasPermission('users-add')) {{-- todo проверка прав на добавление пользователя --}}
          <li>
            <a href="{{ route('admin.users.create') }}">
              <span> Добавить пользователя</span>
            </a>
          </li>
          @endif
          <li>
            <a href="{{ route('admin.users.index') }}">Все пользователи</a>
          </li>
        </ul>
        </a>
      </li>
    @endif
    <li>
      <a href="javaScript:void();">
        <i class="mdi mdi-settings-outline"></i><span>Настройки</span><i class="icon-arrow-right pull-right"></i>
        <ul class="xp-vertical-submenu">
          <li>
            <a href="{{ route('admin.pays.index') }}">
              <span>Наименование платежей</span>
            </a>
          </li>
          @if (Auth::user()->hasPermission('settings-list')){{-- todo проверка прав на просмотр настроек системы --}}
            <li>
              <a href="{{ route('admin.settings.index') }}">Общие настройки системы</a>
            </li>
          @endif
        </ul>
      </a>
    </li>
  </ul>
</div>
<!-- End XP Navigationbar -->