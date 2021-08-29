

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">

    <form  action="{{ route('transaction.index')}}" method="get">

        <div class="container">
            <div class="row">
                <div class="col-sm">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Project</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="project">
                        <option>Select...</option>
                        @foreach ($projects as $project)
                             <option value="{{$project->id}}">{{ $project->title }}</option>
                        @endforeach
                    </select>
                  </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>

                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                        <option>Select...</option>
                        @foreach ($categorys as $category)
                             <option value="{{$category->id}}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Activity</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="activity">
                        <option>Select...</option>
                        @foreach ($activitys as $activity)
                             <option value="{{$activity->id}}">{{ $activity->title }}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Transaction</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="transaction">
                        <option>Select...</option>
                        @foreach ($alltransactions as $transactionf)
                             <option value="{{$transactionf->id}}">{{ $transactionf->programe }}</option>
                        @endforeach
                    </select>
                  </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label></label>
                    <button class="btn btn-primary btn-block filter" type="submit" style="margin-top:7px;">Search</button>
                </div>
            </div>


        </div>
        </div>

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
{{-- {!! $transactions->links() !!} --}}
@endsection
