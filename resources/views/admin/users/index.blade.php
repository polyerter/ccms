@extends('admin.layouts.app')

@section('title', 'Пользователи кооператива')

@push('css')

  <link href="{{ asset('css/admin/users/css/users.css') }}" rel="stylesheet" type="text/css">

@endpush

@push('scripts')

  <script src="{{ asset('js/admin/users/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/admin/users/js/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('js/admin/users/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('js/admin/users/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/admin/users/js/jszip.min.js') }}"></script>
  <script src="{{ asset('js/admin/users/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('js/admin/users/js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('js/admin/users/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('js/admin/users/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('js/admin/users/js/buttons.colVis.min.js') }}"></script>

  <script src="{{ asset('js/admin/users/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('js/admin/users/js/responsive.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('js/admin/init/table-datatable-init.js') }}"></script>

@endpush

@section('content')
  <!-- Start XP Col -->
  <div class="col-lg-12">
    <div class="card m-b-30">

      <div class="card-header bg-white">
        <div class="row">
          <div class="col-lg-10">
            <h5 class="card-title text-black">Все пользователи системы</h5>
            {{--<h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>--}}
          </div>
          <div class="col-lg-2">
            @if (Auth::user()->hasPermission('users-add')) {{-- todo проверка прав на создание пользователя --}}
              <a href="{{route('admin.users.create')}}" class="btn btn-primary">Создать пользователя</a>
            @endif
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
            <tr>
              <th>id</th>
              <th>ФИО</th>
              <th>Email</th>
              @if (Auth::user()->hasPermission('users-edit')) {{-- todo проверка прав на редактирование пользователя --}}

                <th>Действия</th>

              @endif
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
              {{--{{ dd($user) }}--}}
            <tr>
              <td>{{ $user->id }}</td>
              <td><a href="{{ route('admin.users.show', [ 'id' => $user->id]) }}">{{ $user->familiya }} {{ $user->imya }}</a></td>
              <td>{{ $user->email }}</td>

              @if (Auth::user()->hasPermission('users-edit')) {{-- todo проверка прав на редактирование пользователя --}}

              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Действия
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('admin.users.edit', [ 'id' => $user->id]) }}"><i class="mdi mdi-account-edit"></i> Редактировать</a>
                      <a class="dropdown-item" href="{{ route('admin.users.role', [ 'id' => $user->id]) }}"><i class="ti-slice"></i> Права пользователя</a>
                      <a class="dropdown-item" href="#"><i class="mdi mdi-block-helper"></i> Заблокировать</a>
                      <a class="dropdown-item" href="#"><i class="mdi mdi-archive"></i>	Отправить в архив</a>
                  </div>
                </div>
              </td>

              @endif
            </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- End XP Col -->
@endsection

