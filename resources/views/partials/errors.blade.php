@if($errors->any())
<div class="alert alert-error">
      <div class="alert-body">
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
    </div>
 </div>   
@endif