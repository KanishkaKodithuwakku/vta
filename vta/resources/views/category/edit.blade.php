@extends('layout/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Update Category
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="{{ route('category.update', $category->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{ $category->title }}"/>
          </div>
          <div class="form-group">
              <label for="descrioption">Description :</label>
              <input type="text" class="form-control" name="description" value="{{ $category->description }}"/>
          </div>

          <button type="submit" class="btn btn-primary">Update Category</button>
      </form>
  </div>
</div>
@endsection
