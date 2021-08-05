@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h3 class="display-5">Add Delivery</h3>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('deliveries.store') }}">
          @csrf
          <div class="form-group">    
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{old('title')}}"/>
          </div>

          <div class="form-group">
              <label for="date">Date:</label>
              <input type="datetime-local" class="form-control" name="date" value="{{old('date')}}"/>
          </div>

                                 
          <button type="submit" class="btn btn-primary">Add Delivery</button>
      </form>
  </div>
</div>
</div>
@endsection