<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{csrf_token()}}"/>
  <title>WiseOwl Dream App | Admin Panel| Tags</title>

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
            <h1>Tags</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tags</li>
            </ol>
          </div>
        </div>
        <button type="button" class="btn btn-primary" onclick="location.href='{{route('addtagsIndex')}}'"><i class="fas fa-edit"></i>Add</button>

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tags list table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                    <tr>
                      <th>Tag Id</th>
                      <th>Tag</th>
                      <th>ISO Code</th>
                      <th>Created User</th>
                      <th>Created Date</th>
                      <th>Active</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($tags  as $tag)
                    <tr>
                      <td>{{ $tag->tag_id }}</td>
                      <td>{{ $tag->tag }}</td>
                      <td>{{ $tag->sysLang->language }}</td>
                      <td>{{ $tag->created_user_id }}</td>
                      <td>{{ $tag->created_date }}</td>
                      <td>@if($tag->is_active == 1)
                            YES 
                          @else 
                            NO
                          @endif
                      </td>

                      <td>
                        <button type="button" class="btn btn-success" onclick="location.href='/tag_edit/{{$tag->tag_id}}'"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"  onclick="deleteDetails({{$tag->tag_id}})"><i class="far fa-trash-alt"></i></button>
                      </td>
                    </tr>
                  @endforeach 

                  <tfoot>
                  </tfoot>
                </table>
                
            </div>
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
                    url:"{{route('deleteTagDetails')}}",  

                    data:{
                        "tagid":id,
                        },
                    success: function(result) {
                        if(result.data == 1){
                            window.location.href = '/tags';
                        }
                    }
                });
            });
          } else {
            swal("Something Wrong!", "Click the button!", "error");
          }
        });
}


</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "paging": true,
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
