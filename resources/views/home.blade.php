@extends('layouts.app')

@section('content')
<div class="container" style="font-family: speda;">
    <form id="search" class="d-flex" role="search" method="post" action="/adminDetail">
        @csrf
        <input class="form-control ms-2" name="search" type="number" aria-label="Search" id="search" placeholder="گەڕان بە پێی ئایدی">
        <input form="search" type="submit" class="btn btn-warning" value="دۆزینەوە">
    </form>
    @yield('u&d')
    @if(Session::has('message'))
        <div style="position: relative;">
  <div id="deleteModal" class="modal container" style="font-family: speda; margin: 0; top: 50%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%); display: flex;">
  <div class="modal-content">
      <h2 style="color: white; padding: 10px;">{{Session::get('message')}}</h2>
      <span class="close">&times;</span>
    <div class="modal-footer">
      <button class="btn btn-warning" id="cancelBtn">باشە</button>
    </div>
  </div>
</div>
</div>
  @endif
</div>
<script>
    var cancelBtn = document.getElementById('cancelBtn')
    cancelBtn.onclick = function() {
    modal.style.display = "none";
}
</script>

@endsection
