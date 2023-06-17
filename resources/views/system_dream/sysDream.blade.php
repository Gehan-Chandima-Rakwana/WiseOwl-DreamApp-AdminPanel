<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{csrf_token()}}"/>
  <title>WiseOwl Dream App | Admin Panel| System Dreams </title>

  <!-- include Header Link -->
  @include('headerLink')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">

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
            <h1>System Dreams</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item active">System Dreams</li>
            </ol>
          </div>
        </div>
        <button type="button" class="btn btn-primary" onclick="location.href='/add_system_dream'"><i class="fas fa-edit"></i>Add</button>

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">System Dream list table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                    <tr>
                      <th>Dream Id</th>
                      <th>Dream</th>
                      <th>Dreame Type</th>
                      <th>Dream Updated Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($sysDream  as $sysDream)
                    <tr>
                      <td>{{ $sysDream->sys_dream_id }}</td>
                      <td>{{ $sysDream->sys_dream }}</td>
                      <td>{{ $sysDream->dreamType->dream_type_name }}</td>
                      <td>{{ $sysDream->last_updated_date }}</td>
                      <td>
                        <button type="button" class="btn btn-primary" onclick="location.href='/system_dream_view/{{$sysDream->sys_dream_id}}'"><i class="far fa-eye"></i></button>
                        <button type="button" class="btn btn-success" onclick="location.href='/system_dream_edit/{{$sysDream->sys_dream_id}}'"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"  onclick="deleteDetails({{$sysDream->sys_dream_id}})"><i class="far fa-trash-alt"></i></button>
                      </td>
                      </tr>
                   @endforeach 

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; WiseOwl IT Solutions 2022. </strong>
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

<script type="text/javascript">
jQuery(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

});

function deleteDetails(id){
 
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this!",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal("Successfully!", "Click the button!", "success").then(function() {
              $.ajax({             
                    type:"DELETE",
                    cache:false,
                    url:"{{route('deletesystemDreamDetails')}}",  

                    data:{
                        "id":id,
                        },
                    success: function(result) {
                        if(result.data == 1){
                            window.location.href = '/system_dream';
                        }
                    }
                });
            });
          } else {
            swal("Request is canceled!", "Click the button!", "error");
          }
        });
}
</script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "paging": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
