@extends('admin/layouts/app')

@section('title', 'Users')

@section('page_heading', 'Users')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Users</li>
    </ol>

@endsection

@section('content')


<div class="container-fluid">
  <div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Add New User</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{url('admin/add-user')}}">
        @csrf
    <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>First Name</label>
              <input required type="text" class="form-control  @error('fname') is-invalid @enderror"  name="fname" placeholder="Enter First Name" value="{{ old('fname') }}">
              @error('fname')
                <div class="row col-12">
                      <span class="text-danger">{{ $message }}</span>
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Password</label>
              <input  required type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Last Name</label>
              <input required type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" placeholder="Enter Last Name" value="{{ old('lname') }}">
              
            </div>
            <div class="form-group">
              <label>Email</label>
              <input required type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email Address" value="{{ old('email') }}">
              @error('email')
                <div class="row col-12">
                      <span class="text-danger">{{ $message }}</span>
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
        </div>

       
    </div>
    
    <div class="card-footer">
        <button type="submit" class="btn btn-info btn-block">Add</button>
    </div>
    
    </form>

    <!-- /.card-body -->
  </div>







  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $key => $user)
                    <tr>
                      <td>{{ ( $users->perPage() * ($users->currentPage() - 1)) + $key + 1}}</td>
                      <td>{{$user->firstname.' '.$user->lastname}}</td>
                      <td>
                        {{$user->email}}
                      </td>
                      <td><a class="btn btn-danger" href='{{url('admin/user-delete/'.$user->id) }}'>Delete</a></td>
                    </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                {{ $users->links() }}
                {{-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> --}}
              </ul>
            </div>
          </div>
          <!-- /.card -->

        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
</div><!-- /.container-fluid -->

@endsection

@push('scripts')
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/backend_assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="{{asset('assets/backend_assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/backend_assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/backend_assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/backend_assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/backend_assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/backend_assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/backend_assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/backend_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/backend_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/backend_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend_assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/backend_assets/dist/js/pages/dashboard.js')}}"></script>

<script type="text/javascript">
/*let created_at =  <?php //echo json_encode($created_at) ?>;
let total_orders = <?php //echo json_encode($total_orders) ?>;

var salesGraphChartData = {
    labels: created_at,
    datasets: [
      {
        label: 'Total Orders',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#efefef',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#efefef',
        pointBackgroundColor: '#efefef',
        data: total_orders
      }
    ]
}*/
</script>

@endpush

@push('css')

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/jqvmap/jqvmap.min.css')}}">

<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/summernote/summernote-bs4.min.css')}}">

@endpush