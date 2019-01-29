@extends('admin.layouts.app')

@section('title', 'Настройки системы')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">

        <div class="card-header bg-white">
          <div class="row">
            <div class="col-lg-10">
              <h5 class="card-title text-black">Настройки системы CoopCMS</h5>
            </div>
            <div class="col-lg-2">
              {{--todo если есть хоть одна записть скрывать кнопку--}}
              @forelse($settings as $setting)
              @empty
                @if (Auth::user()->hasPermission('settings-add')){{-- todo проверка прав на добавление настроек системы --}}
                  <a href="{{route('admin.settings.create')}}" class="btn btn-primary">Создать настройку</a>
                @endif
              @endforelse
            </div>

          </div>

        </div>

        <div class="card-body">
          <div class="table-responsive">

            <table class="table table-striped table-bordered" id="sortable">
              <thead>
              <tr>
                <th>id</th>
                <th>Название сайта</th>
                <th>URL сайта</th>
                @if (Auth::user()->hasPermission('settings-edit') and Auth::user()->hasPermission('settings-delete')){{-- todo проверка прав на редактирование настроек системы --}}
                  <th>Действия</th>
                @endif
              </tr>
              </thead>
              <tbody>
              @forelse($settings as $setting)
                <tr>
                  <td>
                    {{ $setting->id }}
                  </td>
                  <td>
                    @if (Auth::user()->hasPermission('settings-edit')){{-- todo проверка прав на просмотр настроек системы --}}
                      <a href="{{ route('admin.settings.edit', ['id' => $setting->id]) }}">{{ $setting->sitename }}</a>
                    @else
                      <p>{{ $setting->sitename }}</p>
                    @endif
                  </td>
                  <td>
                    <p>{{ $setting->siteurl }}</p>
                  </td>

                  @if (Auth::user()->hasPermission('settings-edit') and Auth::user()->hasPermission('settings-delete')){{-- todo проверка прав на редактирование настроек системы --}}

                  <td>
                    @if (Auth::user()->hasPermission('settings-edit')){{-- todo проверка прав на редактирование настроек системы --}}

                      <a class="btn btn-sm btn-warning" href="{{ route('admin.settings.edit', ['id' => $setting->id]) }}" title="Редактировать настройку">
                        <i class="fa fa-pencil white"></i>
                      </a>

                    @endif

                    @if (Auth::user()->hasPermission('settings-delete')){{-- todo проверка прав на удаление настроек системы --}}

                      {{Form::open(['route'=>['admin.settings.destroy', $setting->id], 'method'=>'delete'])}}
                      <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-sm btn-danger" title="Удалить настройку">
                        <i class="fa fa-trash white"></i>
                      </button>
                      {{Form::close()}}

                    @endif

                  </td>

                  @endif
                </tr>
              @empty
                <tr>
                  <td colspan="4">Настроек пока нет</td>
                </tr>
              @endforelse
              {{--<tfoot>--}}
              {{--<tr>--}}
              {{--<td class="pagination pull-right">--}}
              {{--{{ $settings->links() }}--}}
              {{--</td>--}}
              {{--</tr>--}}
              {{--</tfoot>--}}
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

  </div>
@endsection