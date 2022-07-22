@extends('admin/layouts/app')

@section('title', 'Queries')

@section('page_heading', 'Queries')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Queries</li>
    </ol>
@endsection

@section('content')

<div class="container-fluid">

  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Queries</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive">
        <table class="table table-hover ">
          <thead>
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Query</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($query as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->user->firstname.' '.$row->user->lastname}}</td>
                <td>{{$row->query}}</td>
                <td><span class="tag tag-success">{{$row->status}}</span></td>
                <td>{{$row->created_at}}</td>
                <td>
                  <select class="form-select" aria-label="Change Status">
                    <option value="Pending">Pending</option>
                    <option value="Resolved">Resolve</option>
                    <option value="Rejected">Reject</option>
                  </select>
                </td>
              </tr>
            @endforeach
            
           
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
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