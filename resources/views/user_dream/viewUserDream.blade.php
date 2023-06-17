<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WiseOwl Dream App | Admin Panel| User Dreams </title>

  <!-- include Header Link -->
  @include('headerLink')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>

    </ul>

  </nav>
  <!-- /.navbar -->

      <!-- Sidebar -->
        <!-- Sidebar -->
        @include('sidebar')
    <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Dream Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item active">User Dream</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User Dreams</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-6 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Bad Dreams</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $badCount }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Normal Dreams</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $normalCount }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Good Dreams</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $goodCount }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>User Profile</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="" alt="">
                        <span class="username">
                          <a href="#">{{ $userDream->user->username }}</a>
                        </span>
                        <span class="description">{{ $userDream->dream_datetime }}</span>
                      </div>
                      <!-- /.user-block -->
                      <!-- <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p> -->

                    </div>


                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <div class="text-muted">
                <h6 class="text-primary"><i class="fas fa-paint-point"></i>Dream Type</h6>
                <p class="text-sm">{{ $userDream->dreamType->dream_type_name }}
                  <b class="d-block"></b>
                </p>
              </div>
              <div class="text-muted">
                <h6 class="text-primary"><i class="fas fa-paint-point"></i>Dream Clarity</h6>
                <p class="text-sm">{{ $userDream->dreamClarity->dream_clarity }}
                  <b class="d-block"></b>
                </p>
              </div>
              <div class="text-muted">
                <h6 class="text-primary"><i class="fas fa-paint-point"></i>Dream Mood</h6>
                <p class="text-sm">{{ $userDream->dreamMood->dream_mood }}
                  <b class="d-block"></b>
                </p>
              </div>
              <div class="text-muted">
                <h6 class="text-primary"><i class="fas fa-paint-point"></i>Sleep Quality</h6>
                <p class="text-sm">{{ $userDream->sleepQuality->sleep_quality }}
                  <b class="d-block"></b>
                </p>
              </div>
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i>Dream meaning</h3>
              <p class="text-muted">{{ $userDream->dream_story }}</p>
              <br>
              
              <h5 class="text-primary"><i class="fas fa-paint-brush"></i>Tags</h5>
              @foreach($UserDreamTags  as $UserDreamTags)
                <p class="text-sm">{{ $UserDreamTags->tag->tag }}</p>
              @endforeach 

              <h5 class="text-primary"><i class="fas fa-paint-brush"></i>Dream Meanings</h5>
              @foreach($UserDreamMeaning  as $UserDreamMeaning)
                <p class="text-sm">{{ $UserDreamMeaning->SystemDream->dream_meaning }}</p>
              @endforeach 

            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">

    <strong>Copyright &copy; WiseOwl IT Solutions 2022.</strong> All rights reserved.
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

</body>
</html>
