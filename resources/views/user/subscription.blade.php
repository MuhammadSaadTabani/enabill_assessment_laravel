
<?php
use Carbon\Carbon;
?>
@extends('user/layouts/app')

@section('title', 'Subscription')

@section('page_heading', 'Subsciption')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Subscription</li>
    </ol>
@endsection

@section('content')

<div class="container-fluid">

  <section class="content">
    <div class="container-fluid">
        
    @if(isset($subscription))
        <h5>Details</h5>
        <div class="row col-md-6 center">
            <label>Subcription Start Date</label>
            <p style="padding-left: 100px">{{$subscription->created_at}}</p>
        </div>  
        <div class="row col-md-6 center">
            <label>Subcription Time Period Interval</label>
            <p style="padding-left: 100px">{{$subscription->period}}</p>
        </div>       
        <div class="row col-md-6 center">
            <label>Subcription End Date</label>
            @if($subscription->period == "Monthly")
                <p style="padding-left: 100px">{{(new Carbon($subscription->created_at))->addMonth()->toDateTimeString();}}</p>
            @elseif($subscription->period == "Weekly")
                <p style="padding-left: 100px">{{(new Carbon($subscription->created_at))->addWeek()->toDateTimeString();}}</p>
            @elseif($subscription->period == "Yearly")
                <p style="padding-left: 100px">{{(new Carbon($subscription->created_at))->addYear()->toDateTimeString();}}</p>
            @endif

        </div>       
        </div><!-- /.container-fluid -->
    @else
        <div class="row">
            <div class="col-md-12">
            <h5>Details</h5>
            <p class="text-danger">You are not subscribed to any subscription yet</p>
            </div>
        </div>
        @endif

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