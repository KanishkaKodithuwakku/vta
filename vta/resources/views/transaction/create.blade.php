@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Transaction
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
      <form method="post" action="{{ route('transaction.store') }}">
        <input name="activity_id" type="hidden" value="{{$id}}">
          <div class="form-group">
              @csrf
              <label for="programe">Transaction Programme:</label>
              <input type="text" class="form-control" name="programe"/>
          </div>
          <div class="form-group">
              <label for="advance">Advance :</label>
              <input type="text" class="form-control" name="advance"/>
          </div>
          <div class="form-group">
            <label for="advance_date">Advance Date :</label>
            <input type="date" class="form-control" name="advance_date"/>
        </div>
        <div class="form-group">
            <label for="settlement">Settlement :</label>
            <input type="text" class="form-control" name="settlement"/>
        </div>
        <div class="form-group">
            <label for="settlement_date">Settlement Date :</label>
            <input type="date" class="form-control" name="settlement_date"/>
        </div>
        <div class="form-group">
            <label for="file_no">File No :</label>
            <input type="text" class="form-control" name="file_no"/>
        </div>

          <button type="submit" class="btn btn-primary">Create Transaction</button>
      </form>
  </div>
</div>
@endsection
