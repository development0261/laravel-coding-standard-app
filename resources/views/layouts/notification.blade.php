<script>
  @if(Session::has('success'))  
     toastr.success("{{ Session::get('success') }}");
     @php
       Session::forget('success');
     @endphp
  @endif

  @if(Session::has('info'))
      toastr.info("{{ Session::get('info') }}");
      @php
        Session::forget('info');
      @endphp
  @endif

  @if(Session::has('warning'))
      toastr.warning("{{ Session::get('warning') }}");
      @php
        Session::forget('warning');
      @endphp
  @endif

  @if(Session::has('error'))
      toastr.error("{{ Session::get('error') }}");        
      @php
        Session::forget('error');
      @endphp
  @endif
</script>