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
            <h1>System Dream Meaning Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item active">System Dream Meaning Edit</li>
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
              <h3 class="card-title">System Dream Meaning Edit</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName"> Dream Meaning ID</label>
                <input type="text" Disabled value="{{ $sysDream->dream_meaning_id }}" id="DreamMeaningID" class="form-control" placeholder="Dream Meaning ID" autocomplete='off'>
              </div>

              <div class="form-group">
                <label for="inputDescription">Dream Meaning Detail</label>
                <textarea id="DreamMeaning" class="form-control" rows="20" autocomplete='off'>{{ $sysDream->dream_meaning }}</textarea>
              </div>
<!-- 
              <div class="form-group">
                <label for="inputName">ISO Code</label>
                <input type="text" id="isoCode" value="{{ $sysDream->lang_iso_code }}" class="form-control" placeholder="ISO Code" autocomplete='off'>
              </div> -->

              <div class="form-group">
                <label class="col-form-label">Language</label>
                <select class="form-control select2 " id="isoCode"  style="width: 100%;" autocomplete='off'>
                    <option value="0" selected>Select One</option>
                    @foreach($sysLang  as $sysLang)
                          @if($sysLang->lang_iso_code == $sysDream->lang_iso_code)
                            <option selected value="{{ $sysLang->lang_iso_code }}">{{ $sysLang->language }}</option>
                          @else
                            <option value="{{ $sysLang->lang_iso_code }}">{{ $sysLang->language }}</option>
                          @endif
                    @endforeach 
                </select>
              </div>

            </div>

            <div class="row">
              <div class="col-12">
                <a href="{{route('userSysDreamIndex')}}" class="btn btn-secondary">Cancel</a>
                <input type="button" id="saveDetails" value="Save Changes" class="btn btn-success float-right">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
     var DreamMeaningID   = $("#DreamMeaningID").val();
     var DreamMeaning   = $("#DreamMeaning").val();
     var isoCode   = $("#isoCode").val();


        $.ajax({             
            type:"PUT",
            cache:false,
            url:"{{route('sysDreamUpdateDetails')}}",  

            data:{
                "DreamMeaningID":DreamMeaningID,
                "DreamMeaning":DreamMeaning,
                "isoCode":isoCode,
                },
            success: function(result) {
                if(result.data == 1){
                    swal("Successfully!", "Click the button!", "success");
                    window.location.href = '/sys_dream';
                    
                }else{
                    swal(result.message, "Click the button!", "error");
                }
            }
        });

}); 

</script>
</body>
</html>
