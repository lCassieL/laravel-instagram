<!-- resources/views/photos/index.blade.php -->

@extends('layouts.app')

@section('content')

  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{ url('photo') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Имя задачи -->
      <div class="form-group">
        <label for="photo" class="col-sm-3 control-label">Фото</label>

        <div class="col-sm-6">
          <input type="file" name="name" id="photo-name" class="form-control">
        </div>
      </div>

      <!-- Кнопка добавления задачи -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Добавить фото
          </button>
        </div>
      </div>
    </form>

    @foreach ($photos as $photo)
    <img src="{{asset('storage/images/'.$photo->name)}}" width="400" height="200">

    <form action="{{ url('photo/'.$photo->id) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button type="submit" id="delete-photo-{{ $photo->id }}" class="btn btn-danger">
        <i class="fa fa-btn fa-trash"></i>Удалить
      </button>
    </form>
    @endforeach
  </div>
  <a href="#">Все картинки</a>
 
@endsection
