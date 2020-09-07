@extends('backend/layouts.app')

@section('content')
<form>
  <div class="form-group">
    <label for="org_id">Org Id</label>
    <input type="text" class="form-control">
  </div>
  <div class="form-group">
    <label for="org_nama">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection