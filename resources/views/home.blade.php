@if(Auth::user()->roles->first()->name === 'agent')
<script>
    window.location = "/agent";
</script>
@elseif(Auth::user()->roles->first()->name === 'admin')
<script>
    window.location = "/admin";
</script>
@else
<script>
    window.location = "/login";
</script>
@endif