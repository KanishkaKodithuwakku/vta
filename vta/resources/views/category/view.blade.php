@extends('layouts.app')

@section('content')
<div class="card uper">
    <a href="{{ route('activity.create', $category->id)}}" class="btn btn-primary">Add New Activity</a>
    <div class="card-header">

        {{$category->title}}
        <p style="font-size:8px;"> {{$category->created_at}}</p>

    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Activity Title</td>
                  <td>Description</td>
                  <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($category->activities as $activity)
                <tr>
                    <td>{{$activity->id}}</td>
                    <td>{{$activity->title}}</td>
                    <td>{{$activity->description}}</td>
                    <td><a href="{{ route('transaction.create', ['activity_id'=>$activity->id])}}" class="btn btn-primary">Create Tranaction</a></td>
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
        {{-- {!! $projects->links() !!} --}}


    </div>
</div>

@endsection
