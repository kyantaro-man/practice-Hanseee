@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-success">
          <div class="panel-heading">課題を編集する</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('problems.update', ['category' => $category->id, 'problem' => $problem->id]) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="title">課題タイトル</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $problem->title }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">更新</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection