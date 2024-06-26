@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Книги</h1>
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
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex p-3">
                    <div class="mr-3">
                        <a href="{{ route('book.edit', $book->id ) }}" class="btn btn-primary">Редактировать</a>
                    </div>
                    <form action="{{ route('book.delete', $book->id) }}" method="post">
                      @csrf 
                      @method('delete')
                      <input type="submit" class="btn btn-danger" value="Удалить"> 
                    </form>
                </div>
            </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">  
        <tbody>
            <tr>
                <td>ID</td>
                <td>{{ $book->id }}</td>            
            </tr>
            <tr>
                <td>Наименование</td>
                <td>{{ $book->title }}</td>            
            </tr>
            <tr>
                <td>Автор</td>
                <td>{{ $book->description }}</td>            
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $book->content }}</td>            
            </tr>
        </tbody>
    </table>
</div>

</div>

</div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection