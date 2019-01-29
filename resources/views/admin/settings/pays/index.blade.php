@extends('admin.layouts.app')

@section('title', 'Настройки платежей')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">

        <div class="card-header bg-white">
          <div class="row">
            <div class="col-lg-10">
              <h5 class="card-title text-black">Настройки платежей в системе CoopCMS</h5>
            </div>
            <div class="col-lg-2">
                <a href="{{route('admin.pays.create')}}" class="btn btn-primary">Создать платеж</a>
            </div>

          </div>

        </div>

        <div class="card-body">
          <div class="table-responsive">

            <table class="table table-striped table-bordered" id="sortable">
              <thead>
              <tr>
                <th>id</th>
                <th>Название платежа</th>
                <th>Класс</th>
                <th>Действия</th>
              </tr>
              </thead>
              <tbody>
              @forelse($pays as $pay)
                <tr>
                  <td>
                    {{ $pay->id }}
                  </td>
                  <td>
                    <a href="{{ route('admin.pays.edit', ['id' => $pay->id]) }}">{{ $pay->name }}</a>
                  </td>
                  <td>
                    {{ $pay->class }}
                  </td>
                  <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('admin.pays.edit', ['id' => $pay->id]) }}" title="Редактировать платеж">
                      <i class="fa fa-pencil white"></i>
                    </a>
                    {{Form::open(['route'=>['admin.pays.destroy', $pay->id], 'method'=>'delete'])}}
                    <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-sm btn-danger" title="Удалить платеж">
                      <i class="fa fa-trash white"></i>
                    </button>
                    {{Form::close()}}
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4">Список платежей пока пуст</td>
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