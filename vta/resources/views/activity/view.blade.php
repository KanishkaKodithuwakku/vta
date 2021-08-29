@extends('layouts.app')

@section('content')
<div class="card uper">
    {{-- <a href="{{ route('transaction.create', $activity->id)}}" class="btn btn-primary">Add New</a> --}}
    <div class="card-header">

        {{$activity->title}}
        <p style="font-size:8px;"> {{$activity->created_at}}</p>

    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Title</td>
                  <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($activity->transaction as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->programe}}</td>

                    <td><a href="{{ route('transaction.show', $transaction->id)}}" class="btn btn-primary">View</a></td>
                    <td><a href="{{ route('transaction.edit', $transaction->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('transaction.destroy', $transaction->id)}}" method="post">
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
        {{-- {!! $activity->links() !!} --}}


    </div>
</div>

@endsection
