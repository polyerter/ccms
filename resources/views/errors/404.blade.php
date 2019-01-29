@extends('admin.layouts.errors')

@section('error')
  <h1 class="xp-error-title mb-3"><span class="text-black">4</span><span class="text-black">0</span><span class="text-black">4</span>
  </h1>
  <h4 class="xp-error-subtitle text-black m-b-30"><i class="mdi mdi-emoticon-sad text-danger font-32"></i>Упс! Страница не найдена</h4>
  <p class="text-muted m-b-30">Данная страница не найдена</p>
  <a href="{{ route('admin.index') }}" class="btn btn-primary btn-rounded mb-3"><i class="icon-home"></i>  Вернуться на главную</a>
@endsection