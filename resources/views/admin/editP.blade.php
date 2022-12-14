@extends('layouts.layoutAdmin')
@include('layouts.sidebarAdmin')
@include('layouts.navbarAdmin')
@section('content')
 
<div class="container mt-5">
 
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem; margin-top: 50px;">
            <div class="card-header">
             Edit Pembeli
            </div>
         <div class="card-body">
 @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
 @endif
 <form method="post" action="{{ route('pembeli.update', $users->id) }}" enctype="multipart/form-data" id="myForm">
 @csrf
 @method('PUT')
 <div class="form-group">
    <label for="username">Username</label> 
        <input type="text" name="username" class="form-control" id="username" aria-describedby="username" value="{{ $users->username }}"> 
    </div>
    <div class="form-group">
        <label for="name">Nama</label> 
        <input type="name" name="name" class="form-control" id="name" aria-describedby="name" value="{{ $users->name}}"> 
    </div>
    <div class="form-group">
        <label for="email">Email</label> 
        <input type="text" name="email" class="form-control" id="email" aria-describedby="email" value="{{ $users->email }}"> 
        <br><label><input type="checkbox" name="checkfield" id="g01-01"  onchange="doalert(this)" /> Ganti password</label>
    </div>
    <div class="form-group" id='passwordU'>
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name='password'>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
    </div>
</div>
<script>
    function doalert(checkboxElem) {
  if (checkboxElem.checked) {
    $("#passwordU").show();
  } else {   
    $("#passwordU").hide();
  }
}
  </script>
@endsection