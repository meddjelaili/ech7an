{{-- success message --}}
@if (session('success'))
<div class="col-sm-6" style="position: fixed;z-index: 9999;top: 85%;width: 350px;">
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      {{ session('success') }}  
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif
{{-- End success message --}}

{{-- warning message --}}
@if (session('warning'))
<div class="col-sm-6" style="position: fixed;z-index: 9999;top: 85%;width: 350px;">
<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  {{ session('warning') }}  
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif
{{-- End warning message --}}

{{-- error message --}}
@if (session('error'))
<div class="col-sm-6" style="position: fixed;z-index: 9999;top: 85%;width: 350px;">
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
{{ session('error') }}  
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif
{{-- End error message --}}