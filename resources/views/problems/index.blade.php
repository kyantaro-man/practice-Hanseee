@extends('layout')

@section('content')
  <div class="container">
    <ul class="nav justify-content-center mb-5">
      @foreach($categories as $category)
        <li class="nav-item nav-category {{ $current_category_id === $category->id ? 'act' : '' }}">
          <a class="nav-link" href="{{ route('problems.index', ['category' => $category->id]) }}">
            {{ $category->name }}
            <form class="d-inline-block" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <input type='submit' value='×' class='btn btn-danger btn-xs'>
            </form>
          </a>
        </li>
      @endforeach
      <li class="nav-item">
        <a class="nav-link btn btn-success" href="{{ route('categories.create') }}">カテゴリ追加</a>
      </li>
    </ul>
    <div class="row">
      <div class="col col-md-6">
        <nav class="panel panel-success">
          <div class="panel-heading">課題一覧</div>
          <div class="panel-body">
            <a href="{{ route('problems.create', ['category' => $current_category_id]) }}" class="btn btn-default btn-block">
              課題を追加する
            </a>
          </div>
          <table class="table">
            <thead>
            <tr>
              <th>課題</th>
              <th></th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach($problems as $problem)
                <tr class="table-problem">
                  <td><a href="{{ route('steps.index', ['category' => $current_category_id, 'problem' => $problem->id]) }}">{{ $problem->title }}</a></td>
                  <td><a class='btn btn-primary btn-xs' href="{{ route('problems.edit', ['category' => $current_category_id, 'problem' => $problem->id]) }}">編集</a></td>
                  <td>
                    <form action="{{ route('problems.destroy', ['category' => $current_category_id, 'problem' => $problem->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type='submit' value='削除' class='btn btn-danger btn-xs'>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </nav>
      </div>
    </div>
  </div>
@endsection