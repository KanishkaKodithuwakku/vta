@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Category {{$id}}
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
      <form method="post" action="{{ route('category.store') }}">
        {{-- {{ Form::hidden('project_id', {{$id}}) }} --}}

        @isset($id)
            <input name="project_id" type="hidden" value="{{$id}}">
        @endisset

        @empty($id)
        <div class="form-group">
            <label for="exampleFormControlSelect1" >Projects</label>
            <select class="form-control" id="exampleFormControlSelect1" name="project_id">
                @foreach ($projects as $project)
                <option  value="{{ $project->id }}" >{{ $project->title }}</option>
                @endforeach
            </select>
        </div>
        @endempty


        <div class="form-group">
              @csrf
              <label for="title">Category Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          <button type="submit" class="btn btn-primary">Create Category</button>
      </form>
  </div>
</div>
@endsection
