@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Update Activity
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
    <form method="post" action="{{ route('activity.update', $activity->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{ $activity->title }}"/>
          </div>
          <div class="form-group">
              <label for="descrioption">Description :</label>
              <input type="text" class="form-control" name="description" value="{{ $activity->description }}"/>
          </div>

          <button type="submit" class="btn btn-primary">Update Activity</button>
      </form>
  </div>
</div>
@endsection
