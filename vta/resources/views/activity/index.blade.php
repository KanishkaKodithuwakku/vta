

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Description</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
        <tr>
            <td>{{$activity->id}}</td>
            <td>{{$activity->title}}</td>
            <td>{{$activity->description}}</td>
            <td><a href="{{ route('activity.show', $activity->id)}}" class="btn btn-primary">View</a></td>
            <td><a href="{{ route('activity.edit', $activity->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('activity.destroy', $activity->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
{!! $activities->links() !!}
@endsection
