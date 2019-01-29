@extends('admin.layouts.app')

@section('title', 'Управление ролями пользователей')

@push('css')
  {{--  <link href="{{ asset('css/admin/users/css/jstree.min.css') }}" rel="stylesheet" type="text/css">--}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css"/>
@endpush

@push('scripts')

  {{--  <script src="{{ asset('js/admin/users/js/jstree.min.js') }}"></script>--}}
  {{--  <script src="{{ asset('js/admin/init/jstree-init.js') }}"></script>--}}
  {{--генератор пароля--}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

  <script>
      function updatePermissions(id, li) {
          var items = [];
          /* Формирует массив прав к отправке */
          for (var i = 0; i < li.length; i++) {
              items.push(parseInt(li[i].id));
          }
          if (items.length) {
              $.ajax({
                  type: 'post',
                  url: '{{ url('admin/permissions/set') }}',
                  data: {
                      user: id,
                      data: items,
                      _token: '{!! csrf_token() !!}',
                  },
                  success: function (data) {
                  }
              });
          }
      }
      $(document).ready(function ($) {
          /**
           //  todo Получение прав пользователя, проходит по всем элементам с классом permissions
           **/

          $('.permissions').each(function (ind, el) {
              var id = $(el).data('id'); // получение id пользователя
              $.post('{{ url('admin/permissions/get') }}', {user: id}, function (data) { // запрос на получение прав
                  /* Построение дерева прав */
                    console.log(data);  // todo вывод в консоль запроса массива
                  $('.permissions').jstree({
                      'plugins': [
                          "wholerow",
                          "checkbox"
                      ],
                      "checkbox": {
                          "real_checkboxes": false,
                          "three_state": true
                      },
                      'core': {
                          "themes": {
                              "icons": true
                          },
                          'data': data
                      }
                  })

                      .on('deselect_node.jstree', function (e, data) {
                          updatePermissions(id, data.instance.get_selected(true));
                      })
                      .on('select_node.jstree', function (e, data) {
                          updatePermissions(id, data.instance.get_selected(true));
                      })
                      .on('ready.jstree', function () {
                          $(this).jstree("close_all");
                      });

              });
          });

      })
  </script>

@endpush

@section('content')
  <div class="row">

    <!-- Start XP Col -->
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header bg-white">
          <h5 class="card-title text-black">Управление ролью для пользователя {{ $users->familiya }} {{ $users->imya }}</h5>
        </div>

        <div class="card-body">
          <div class="permissions" data-id="{{ $users->id }}"></div>
      </div>
    </div>
    <!-- End XP Col -->

    </div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group text-center">
            <a href="{{ route('admin.users.index') }}" class="btn btn-warning">Назад</a>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection