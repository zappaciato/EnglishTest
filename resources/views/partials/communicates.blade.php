
@if($errors->count()) 
    <div class="message bg-warning">
    {{-- teraz przelatujemy przez wszystkie bledy --}}
        @foreach($errors->all() as $error)
            <p>The error: {{$error}}</p>
        @endforeach
    </div>
@endif

@if(session('message'))

<div class="message alert alert-success">
  <h3>{{session('message')}}</h3>
  <a class="close">&times;</a>
</div>

@endif



{{-- @if(session('verified'))
<div class="message">Your email has been verified!</div>
@endif
@if(session('resend'))
<div class="message">Verification link has been resent!</div>
@endif --}}

{{-- @php
dd(session());    
@endphp --}}


<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    $(".close").click(function() {
  $(this)
    .parent(".alert")
    .fadeOut();
});
</script>