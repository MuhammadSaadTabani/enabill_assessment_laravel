<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assessment</title>
  
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/backend_assets/dist/css/adminlte.min.css')}}">
  
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/toastr/toastr.min.css')}}">
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    {{-- <div class="card-header text-center">
      <a href="javascript:;" class="h1"><b>Admin</b> Panel</a>
    </div> --}}
    <div class="card-body">
      <p class="login-box-msg">Sign up to start your session</p>
    
      <form action="{{url('register')}}" method="post">
      	@csrf

        
        <div class="input-group mb-3">
            <input required name="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="First Name" value="{{ old('firstname') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('firstname')
            <div class="row col-12">
                  <span class="text-danger">{{ $message }}</span>
            </div>
                @enderror
        </div>
        <div class="input-group mb-3">
            <input required name="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Last Name" value="{{ old('lastname') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('lastname')
            <div class="row col-12">
              <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input required name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
        <div class="row col-12">
          <span class="text-danger">{{ $message }}</span>
        </div>
        @enderror
        <div class="input-group mb-3">
          <input required name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        
          @error('password')
          <div class="row col-12">
            <span class="text-danger">{{ $message }}</span>
          </div>
          @enderror
        </div>

        <!-- Bootstrap Switch -->
        <div class="form-group">
          <label>Subcription</label>

          <div class="input-group ">
            <input id="subscriptionOption" name="subscriptionCheckbox" type="checkbox" name="my-checkbox" data-bootstrap-switch>

            
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group" id="subscriptionPeriods" style="display: none;">
          <label>Selection Subscription Options</label>
          <select name="subscription" class="form-control select2" style="width: 100%;">
            <option>Weekly</option>
            <option>Monthly</option>
            <option>Yearly</option>
          </select>
        </div>
        <!-- /.card -->

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
        <p class="mb-1">
          <a href="{{url('/')}}">Already a user?</a>
        </p>
          <!-- /.col -->
        </div>
      </form>
	</div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/backend_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend_assets/dist/js/adminlte.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('assets/backend_assets/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/backend_assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/backend_assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
@if(session('SUCCESS'))
  toastr.success("{{session('SUCCESS')}}");
@endif
@if(session('ERROR'))
  toastr.error("{{session('ERROR')}}")
@endif
</script>
<script>

$('#subscriptionOption').on('switchChange.bootstrapSwitch', function (event, state) {
  
    if($(this).is(':checked')) {
      $("#subscriptionPeriods").show('slow');
  }else{
    $("#subscriptionPeriods").hide('slow');
  }
});
// $("#subscriptionOption").change(function(){
//   console.log('asdas');
//   if($(this).is(':checked')){
//     $("#subscriptionPeriods").css('display','block');
//   }else{
//     $("#subscriptionPeriods").css('display','none');
//   }
// })

 $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })  </script>

</body>
</html>
