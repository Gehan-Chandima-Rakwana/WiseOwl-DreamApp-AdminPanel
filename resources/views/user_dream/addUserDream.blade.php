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
            <h1>User Dream Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">User Dream Add</li>
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
                <label class="col-form-label">User.</label>
                <select class="form-control select2 " id="userID"  style="width: 100%;" autocomplete='off'>
                    <option value="0" selected>Select One</option>
                    @foreach($user  as $user)
                    <option value="{{ $user->user_id }}">{{ $user->username }}</option>
                    @endforeach 
                </select>
              </div>
              <div class="form-group">
                <label for="inputName"> Dream Title</label>
                <input type="text" id="DreamTitle" class="form-control" placeholder="Dream title">
              </div>
              <div class="form-group">
                <label class="col-form-label">Dream Type Name.</label>
                <select class="form-control select2 " id="DreamType"  style="width: 100%;" autocomplete='off'>
                    <option value="0" selected>Select One</option>
                    @foreach($dreamType  as $dreamType)
                    <option value="{{ $dreamType->dream_type_id }}">{{ $dreamType->dream_type_name }}</option>
                    @endforeach 
                </select>
              </div>
              <div class="form-group">
                <label for="inputDescription">Dream Story</label>
                <textarea id="DreamStory" class="form-control" rows="20"></textarea>
              </div>

              <div class="form-group">
                <label>Tags.</label>
                <select class="select2" id="Tags" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                        @foreach($tag  as $tag)
                        <option value="{{ $tag->tag_id }}">{{ $tag->tag }}</option>
                        @endforeach 
                </select>
              </div>

              <!-- Date and time -->
              <div class="form-group">
                <label>Dream Date and time:</label>
                  <div class="input-group date" id="txtDreamDate" data-target-input="nearest">
                      <input type="text" id="DreamDate" class="form-control datetimepicker-input" data-target="#txtDreamDate"/>
                      <div class="input-group-append" data-target="#txtDreamDate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Dream Clarity.</label>
                <select class="form-control select2 " id="DreamClarity"  style="width: 100%;" autocomplete='off'>
                    <option value="0" selected>Select One</option>
                    @foreach($dreamClarity  as $dreamClarity)
                    <option value="{{ $dreamClarity->sys_dream_clarity_id }}">{{ $dreamClarity->dream_clarity }}</option>
                    @endforeach 
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">Dream Mood.</label>
                <select class="form-control select2 " id="DreamMood"  style="width: 100%;" autocomplete='off'>
                    <option value="0" selected>Select One</option>
                    @foreach($dreamMood  as $dreamMood)
                    <option value="{{ $dreamMood->sys_dream_mood_id }}">{{ $dreamMood->dream_mood }}</option>
                    @endforeach 
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">Sleep Quality.</label>
                <select class="form-control select2 " id="SleepQuality"  style="width: 100%;" autocomplete='off'>
                    <option value="0" selected>Select One</option>
                    @foreach($sleepQuality  as $sleepQuality)
                    <option value="{{ $sleepQuality->sleep_quality_id }}">{{ $sleepQuality->sleep_quality }}</option>
                    @endforeach 
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">Yamayan.</label>
                <select class="form-control select2 " id="Yamayan"  style="width: 100%;" autocomplete='off'>
                    <option value="0" selected>Select One</option>
                    @foreach($sysYamayan  as $sysYamayan)
                    <option value="{{ $sysYamayan->yamayan_id }}">{{ $sysYamayan->yamayan_details }}</option>
                    @endforeach 
                </select>
              </div>
              <div class="form-group">
                <label>Dream Meanings.</label>
                <select class="select2" id="DreamMeanings" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                        @foreach($DreamMeaning  as $DreamMeaning)
                        <option value="{{ $DreamMeaning->dream_meaning_id }}">{{ $DreamMeaning->dream_meaning }}</option>
                        @endforeach 
                </select>
              </div>
              <!-- <div class="form-group">
                <label for="inputDescription">Dream Type</label>
                <textarea id="inputDescription" class="form-control" rows="20"></textarea>
              </div> -->
              <!-- <div class="form-group">
                <label for="inputDescription">Created Date</label>
                <input type="datetime-local" id="createdDate" name="createdDate">
              </div> -->
              <div class="row">
                <div class="col-12">
                  <a href="{{route('userDreamIndex')}}" class="btn btn-secondary">Cancel</a>
                    <input type="button" id="saveDetails" value="Save" class="btn btn-success">
                </div>
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

    <strong>Copyright &copy; WiseOwl IT Solutions 2022</strong> All rights reserved.
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
<script>

/////////////////////////////////////////////// 
jQuery(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

});

$("#saveDetails").click(function(){
      var userID    = $("#userID").val();
      var Tags    = $("#Tags").val();
     var DreamTitle    = $("#DreamTitle").val();
     var DreamType    = $("#DreamType").val();
     var DreamStory    = $("#DreamStory").val();
     var DreamDate    = $("#DreamDate").val();
     var DreamClarity    = $("#DreamClarity").val();
     var DreamMood    = $("#DreamMood").val();
     var SleepQuality    = $("#SleepQuality").val();
     var Yamayan    = $("#Yamayan").val();
     var DreamMeanings  = $("#DreamMeanings").val(); 
     
        $.ajax({             
            type:"POST",
            cache:false,
            url:"{{route('userDreamSaveDetails')}}",  

            data:{
                "userID":userID,
                "DreamTitle":DreamTitle,
                "DreamType":DreamType,
                "DreamStory":DreamStory,
                "Tags":Tags,
                "DreamDate":DreamDate,
                "DreamClarity":DreamClarity,
                "DreamMood":DreamMood,
                "SleepQuality":SleepQuality,
                "Yamayan":Yamayan,
                "DreamMeanings":DreamMeanings,
                },
            success: function(result) {
                if(result.data == 1){
                    swal("Successfully!", "Click the button!", "success");
                    window.location.href = '/user_dream';
                    
                }else{
                    swal(result.message, "Click the button!", "error");
                }
            }
        });

}); 


//Date picker/////////////////////////////////////////////////////////////
$('#txtDreamDate').datetimepicker({ 
      icons: { time: 'far fa-clock' }, 
      format: 'YYYY-MM-DD HH:mm:ss'
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
