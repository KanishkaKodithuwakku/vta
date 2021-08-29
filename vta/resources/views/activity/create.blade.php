@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Activity
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
      <form method="post" action="{{ route('activity.store') }}">
        @isset($id)
        <input name="category_id" type="hidden" value="{{$id}}">
        @endisset


        <div class="form-group">
            <label for="exampleFormControlSelect1">Projects</label>
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach ($projects as $project)
                <option  value="{{ $project->id }}" >{{ $project->title }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                @foreach ($categories as $category)
                <option  value="{{ $category->id }}" >{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

          <div class="form-group">
              @csrf
              <label for="title">Activity Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          <button type="submit" class="btn btn-primary">Create Activity</button>
      </form>
  </div>
</div>
@endsection
