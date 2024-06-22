@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить Книгу</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Главная</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <input type="text" name="title" class="form-control" placeholder="Наименование">
            </div>
            <div class="form-group">
              <input type="text" name="description" class="form-control" placeholder="Автор">
            </div>
            <div class="form-group">
              <textarea name="content" class="form-control" cols="50" rows="10" placeholder="Описание"></textarea>
            </div>

            <div class="form-group">
                  <select name="category_id" class="categories" multiple="multiple" data-placeholder="Выберите жанр" style="width: 100%;">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
                  <select name="tag_id" class="tags" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузить</span>
                      </div>
                    </div>
            </div>

            <div class="form-group">
              <textarea name="main_content" class="form-control" cols="50" rows="10" placeholder="Содержание"></textarea>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Добавить">
            </div>
          </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection