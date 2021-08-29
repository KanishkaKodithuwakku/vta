@extends('layouts.app')

@section('content')
<div class="card uper">
    {{-- <a href="{{ route('transaction.create', $activity->id)}}" class="btn btn-primary">Add New</a> --}}
    <div class="card-header">

        {{$transaction->activity->title}}
        <p style="font-size:8px;"> {{$transaction->activity->created_at}}</p>

    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Project</td>
                  <td>Category</td>
                  <td>Activity</td>
                  <td>Programe</td>
                  <td>Advance</td>
                  <td>Advance Date</td>
                  <td>Settlement</td>
                  <td>Settlement Date</td>
                  <td>File No</td>
                  <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->activity->category->project->title}}</td>
                    <td>{{$transaction->activity->category->title}}</td>
                    <td>{{$transaction->activity->title}}</td>
                    <td>{{$transaction->programe}}</td>
                    <td>{{$transaction->advance}}</td>
                    <td>{{$transaction->advance_date}}</td>
                    <td>{{$transaction->settlement}}</td>
                    <td>{{$transaction->settlement_date}}</td>
                    <td>{{$transaction->file_no}}</td>

                    <td><a href="{{ route('transaction.edit', $transaction->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('transaction.destroy', $transaction->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

            </tbody>
          </table>
        <div>
        {{-- {!! $transactions->links() !!} --}}


    </div>
</div>

@endsection
