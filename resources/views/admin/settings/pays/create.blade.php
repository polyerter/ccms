@extends('admin.layouts.app')

@section('title', 'Создать платеж в системе')

@section('content')
  <div class="row">

   <!-- Start XP Col -->
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header bg-white">
          <h5 class="card-title text-black">Добавление платежа для пайщика</h5>
        </div>
        {!! Form::open(['route' => 'admin.pays.store']) !!}
        <div class="card-body">

          @include('admin.layouts.bodyerrors')

            <div class="form-group row">
              <label class="col-sm-2 control-label">Название платежа: <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="например: Паевой взнос">
              </div>
            </div>
          <div class="form-group row">
              <label class="col-sm-2 control-label">Класс оформления: <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="class" class="form-control"  placeholder="например: Паевой взнос">
              </div>
            </div>

          <input type="submit" class="btn btn-primary" value="Сохранить">
          <a href="{{ route('admin.pays.index') }}" class="btn btn-danger" >Отменить</a>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- End XP Col -->

  </div>
@endsection