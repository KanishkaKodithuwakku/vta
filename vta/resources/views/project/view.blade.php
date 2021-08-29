@extends('layouts.app')

@section('content')
<div class="card uper">
    <a href="{{ route('category.create', ['project_id'=>$project->id])}}" class="btn btn-primary">Add New</a>
    <div class="card-header">

        {{$project->title}}
        <p style="font-size:8px;"> {{$project->created_at}}</p>

    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Category Title</td>
                  <td>Description</td>
                  <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($project->categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->description}}</td>
                    <td><a href="{{ route('category.show', $category->id)}}" class="btn btn-primary">View</a></td>
                    <td><a href="{{ route('category.edit', $category->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('category.destroy', $category->id)}}" method="post">
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
