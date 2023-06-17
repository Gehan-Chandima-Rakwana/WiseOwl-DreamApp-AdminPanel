<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- include Header Link -->
  @include('headerLink')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

    <!-- Sidebar -->
        <!-- iSidebar -->
        @include('sidebar')
    <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<!--------------------------------------------------------------------------------------------------------------------------------------->
<!--Dashboard Start-->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h1>
                   @if($totRegisterCount)
                      {{ $totRegisterCount }}
                    @else
                      0
                   @endif
                  </h1>
                <h4>Total Registered user count</h4>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h1>
                   @if($totOnlineUserCount)
                      {{ $totOnlineUserCount }}
                    @else
                      0
                   @endif
                </h1>
                <h4>Total online user count</h4>
              </div>
              <div class="icon">
                <i class="ion ion-checkmark"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h1>@if($totDreamPostCount)
                      {{ $totDreamPostCount }}
                    @else
                      0
                    @endif
                </h1>
                <h4>Total dream posts</h4>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h1>@if($totDPostLastDayCount)
                      {{ $totDPostLastDayCount }}
                    @else
                      0
                    @endif
                  </h1>
                <h4>Total dream posts for last 7 days</h4>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h1>0</h1>
                <h4>Total dream posts with voice memos</h4>
              </div>
              <div class="icon">
                <i class="ion ion-star"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
</section>
<br><br>
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!--Dream Clarity-->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12">
        <h2>Total posts for Dream Clarity</h2>
      </div>
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">
            <h3>    @if($superClearCount)
                      {{ $superClearCount }}
                    @else
                      0
                    @endif
            </h3></div>
          <div class="card-body">
            <h1>🌞</h1>
            <h4>Super Clear</h4>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
          <div class="card-header">
            <h3>    @if($clearCount)
                      {{ $clearCount }}
                    @else
                      0
                    @endif
            </h3></div>
          <div class="card-body">
            <h1>🌤️</h1>
            <h4>Clear</h4>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header">
          <h3>      @if($normalCount)
                      {{ $normalCount }}
                    @else
                      0
                    @endif
            </h3>
          </div>
          <div class="card-body">
            <h1>🌥️</h1>
            <h4>Normal</h4>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
          <div class="card-header">
          <h3>      @if($notClearCount)
                      {{ $notClearCount }}
                    @else
                      0
                    @endif
            </h3>
          </div>
          <div class="card-body">
            <h1>☁️</h1>
            <h4>Not Clear</h4>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
          <div class="card-header">
            <h3>    @if($didntDreamCount)
                      {{ $didntDreamCount }}
                    @else
                      0
                    @endif
            </h3>
          </div>
          <div class="card-body">
            <h1>🌧️</h1>
            <h4>Didn't Dream</h4>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div>
</section>
<br><br>
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!--Dream Mood-->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12">
        <h2> Total posts for Dream Mood</h2>
      </div>
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">
            <h3>@if($wOWCount)
                      {{ $wOWCount }}
                    @else
                      0
                    @endif
            </h3></div>
          <div class="card-body">
            <h1>😄</h1>
            <h4>WOW</h4>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
          <div class="card-header">
                <h3>@if($nICECount)
                      {{ $nICECount }}
                    @else
                      0
                    @endif
            </h3>
          </div>
          <div class="card-body">
            <h1>🙂</h1>
            <h4>NICE</h4>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header">            
                <h3>@if($nORMALCount)
                      {{ $nORMALCount }}
                    @else
                      0
                    @endif
            </h3></div>
          <div class="card-body">
            <h1>😐</h1>
            <h4>NORMAL</h4>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
          <div class="card-header">            
                <h3>@if($nEGATIVECount)
                      {{ $nEGATIVECount }}
                    @else
                      0
                    @endif
            </h3></div>
          <div class="card-body">
            <h1>🙁</h1>
            <h4>NEGATIVE</h4>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
          <div class="card-header">            
                <h3>@if($vERYBADCount)
                      {{ $vERYBADCount }}
                    @else
                      0
                    @endif
            </h3></div>
          <div class="card-body">
            <h1>😞</h1>
            <h4>VERY BAD</h4>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div>
</section>
<br><br><br>
<!--------------------------------------------------------------------------------------------------------------------------------------->
<section class="content">
  <div class="container">
    <div class="row">

      <div class="col-lg-2">

      </div>

      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <canvas id="pieChart" style="max-width: 1000px;"></canvas>
          </div>
        </div>


      </div>

      <div class="col-lg-2">

      </div>

    </div>
  </div>

</section>
<br><br><br>
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!--Table-->
<section class="content">
  <div class="row">
    <div class="col-lg-2">

    </div>

    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Recent Dream Posts</h3>
          <div class="card-body table-responsive p-0">
            <table id="example1" class="table table-bordered table-striped">

                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>User</th>
                      <th>Category</th>
                      <th>Date&Time</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dreamPostLastDays  as $uDream)
                    <tr>
                      <td>{{ $uDream->dream_title }}</td>
                      <td>{{ $uDream->user->username }}</td>
                      <td>{{ $uDream->dreamType->dream_type_name }}</td>
                      <td>{{ $uDream->dream_datetime }}</td>
                    </tr>
                    @endforeach 

                  <tfoot>
                  </tfoot>
                </table>

          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-2">

    </div>

  </div>
</section>
<!--------------------------------------------------------------------------------------------------------------------------------------->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; WiseOwl IT Solutions 2022</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

  <!-- include Footer Link -->
  @include('footerLink')

<!--Pie chart script-->
<script>


$(document).ready(function(){
      $.ajax({
            type:"GET",
            cache:false,
            url:"{{route('getDreamTypeDetails')}}",  
            data:{

            },
            success: function(data) {
              var ctxP = document.getElementById("pieChart").getContext('2d');
              var myPieChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                  labels: data['dream_type'],
                  datasets: [{
                    data: data['dream_count'],
                    backgroundColor: data['backgroundColor'],
                    hoverBackgroundColor: data['hoverBackgroundColor']
                  }]
                },
                options: {
                  responsive: true
                }
              });
              
            }
        });

});


// var ctxP = document.getElementById("pieChart").getContext('2d');
// var myPieChart = new Chart(ctxP, {
//   type: 'pie',
//   data: {
//     labels: ["Daydreams", "False Awakening Dreams", "Lucid Dreams", "Nightmares",
//     "Recurring Dreams", "Healing Dreams", "Prophetic Dreams", "Epic Dreams", "Progressive Dreams", "Mutual Dreams", "SignalDreams"],
//     datasets: [{
//       data: data,
//       backgroundColor: ["#DFFF00", "#FFBF00", "#FF7F50", "#DE3163", "#9FE2BF","#40E0D0","#6495ED","#CCCCFF","#FF00FF","#800080","#800000"],
//       hoverBackgroundColor: ["#c66765", "#be726f", "#d97875", "#e06c6b", "#e97573","#9FE2BF","#1F618D","#A6ACAF","#FADBD8","#5B2C6F","#A93226"]
//     }]
//   },
//   options: {
//     responsive: true
//   }
// });


</script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "paging": true,
      "lengthChange": false, 
      "autoWidth": false,
      "searching": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
