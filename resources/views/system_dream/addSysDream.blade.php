<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{csrf_token()}}"/>
  <title>WiseOwl Dream App | Admin Panel| User Roles </title>

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
        <a href="index3.html" class="nav-link">Home</a>
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
            <h1>System Dream Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">System Dream Add</li>
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
              <h3 class="card-title">User Dream Add</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <!-- <div class="form-group">
                <label for="inputName"> Dream ID</label>
                <input type="text" id="DreamID" class="form-control" value="Dream ID">
              </div> -->

              <div class="form-group">
                    <label class="col-form-label">Dream Type Name.</label>
                      <select class="form-control select2 " id="DreamType"  style="width: 100%;" autocomplete='off'>
                        <option value="0" selected>Select One</option>
                        @foreach($dreamType  as $dreamType)
                          <option value="{{ $dreamType->dream_type_id }}">{{ $dreamType->dream_type_name }}</option>
                        @endforeach 
                      </select>
              </div>

              <!-- 
              <div class="form-group">
                <label for="inputName">Dream Type Name</label>
                <input type="text" id="DreamTypeName" class="form-control" placeholder="Dream Type Name">
              </div> -->

               <div class="form-group">
                <label for="inputDescription">Dream Type Details</label>
                <textarea id="DreamTypeDet" class="form-control" rows="10"></textarea>
              </div>

              <div class="form-group">
                <label>Dream Meanings.</label>
                <select class="select2" id="DreamMeanings" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                        @foreach($DreamMeaning  as $DreamMeaning)
                        <option value="{{ $DreamMeaning->dream_meaning_id }}">{{ $DreamMeaning->dream_meaning }}</option>
                        @endforeach 
                </select>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{route('systemDreamIndex')}}" class="btn btn-secondary">Cancel</a>
            <input type="button" id="saveDetails" value="Save" class="btn btn-success">

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

$("#saveDetails").click(function(){
     var DreamType   = $("#DreamType").val();
     var DreamTypeDet    = $("#DreamTypeDet").val();
     var DreamMeanings  = $("#DreamMeanings").val(); 

        $.ajax({             
            type:"POST",
            cache:false,
            url:"{{route('systemDreamSaveDetails')}}",  

            data:{
                "DreamType":DreamType,
                "DreamTypeDet":DreamTypeDet,
                "DreamMeanings":DreamMeanings,
                },
            success: function(result) {
                if(result.data == 1){
                    swal("Successfully!", "Click the button!", "success");
                    window.location.href = '/system_dream';
                    
                }else{
                    swal(result.message, "Click the button!", "error");
                }
            }
        });

}); 


    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

</script>
</body>
</html>
