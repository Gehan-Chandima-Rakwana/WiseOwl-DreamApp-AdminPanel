<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{csrf_token()}}"/>
  <title>WiseOwl Dream App | Admin Panel| Add Tags</title>
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
            <h1>Add Tags</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Add Tags</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Tags</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <!-- <div class="form-group">
                <label for="inputName"> Tag ID</label>
                <input type="text" id="tagID" class="form-control" value="Tag ID">
              </div> -->
              <div class="form-group">
                <label for="inputName"> Tag</label>
                <input type="text" id="tag" class="form-control" placeholder="Tag Name" autocomplete='off'>
              </div>
              <!-- <div class="form-group">
                <label for="inputName"> ISO Code</label>
                <input type="text" id="isoCode" class="form-control" placeholder="ISO Code" autocomplete='off'>
              </div> -->

              <div class="form-group">
                <label class="col-form-label">Language</label>
                <select class="form-control select2 " id="isoCode"  style="width: 100%;" autocomplete='off'>
                    <option value="0" selected>Select One</option>
                    @foreach($sysLang  as $sysLang)
                    <option value="{{ $sysLang->lang_iso_code }}">{{ $sysLang->language }}</option>
                    @endforeach 
                </select>
              </div>
              <!-- <div class="form-group">
                <label for="inputDescription">Created Date</label>
                <input type="datetime-local" id="createdDate" name="createdDate">
              </div> -->

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{route('tagsIndex')}}" class="btn btn-secondary">Cancel</a>
            <input type="button" id="saveTagDetails" value="Save" class="btn btn-success">

        </div>
      </div>
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

<script type="text/javascript">

/////////////////////////////////////////////// 
jQuery(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

});

$("#saveTagDetails").click(function(){
     var tag        = $("#tag").val();
     var isoCode    = $("#isoCode").val();

        $.ajax({             
            type:"POST",
            cache:false,
            url:"{{route('tagSaveDetails')}}",  

            data:{
                "tag":tag,
                "isoCode":isoCode,
                },
            success: function(result) {
                if(result.data == 1){
                    swal("Successfully!", "Click the button!", "success");
                    window.location.href = '/tags';
                    
                }else{
                    swal(result.message, "Click the button!", "error");
                }
                
            }
        });

}); 

</script>

</body>
</html>
