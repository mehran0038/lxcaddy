@extends('base')

@section('main')
<div class="row">
    
<div class="col-sm-12">
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div>
@endif
<div>
    <a style="margin: 19px;" href="{{ route('deliveries.create')}}" class="btn btn-primary">New delivery</a>
    </div> 
    <h1 class="display-6">Deliveries</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Date</td> 
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Deliveries as $delivery)
        <tr>
            <td>{{$delivery->id}}</td>
            <td>{{$delivery->title}} </td>
            <td>{{$delivery->date}}</td> 
            <td>
                <a href="{{ route('deliveries.edit',$delivery->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('deliveries.destroy', $delivery->id)}}" method="post">
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
</div>
@endsection