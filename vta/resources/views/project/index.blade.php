

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
        @foreach($projects as $project)
        <tr>
            <td>{{$project->id}}</td>
            <td>{{$project->title}}</td>
            <td>{{$project->description}}</td>
            <td><a href="{{ route('project.show', $project->id)}}" class="btn btn-primary">View</a></td>
            <td><a href="{{ route('project.edit', $project->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('project.destroy', $project->id)}}" method="post">
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
{!! $projects->links() !!}
@endsection
