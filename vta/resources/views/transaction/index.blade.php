

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">

    <form  action="transaction/index" method="get">
        <input type="text"  name="project" placeholder="Search by project"/>
        <input type="text"  name="category" placeholder="Search by category"/>
        <input type="text"  name="activity" placeholder="Search by activity"/>
        <input type="text"  name="programe" placeholder="Search by programe"/>
        <button type="submit">Search</button>
    </form>



  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
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
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
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
{!! $transactions->links() !!}
@endsection
