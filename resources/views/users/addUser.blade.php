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
            <h1>User Register</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">User Register</li>
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
              <h3 class="card-title">User Register</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName"> User Email</label>
                <input type="text" id="UserEmail" class="form-control" placeholder="User Email" autocomplete='off'>
              </div>
              <div class="form-group">
                <label for="inputName"> Username</label>
                <input type="text" id="Username" class="form-control" placeholder="Username" autocomplete='off'>
              </div>
              <div class="form-group">
                <label for="inputName">First Name</label>
                <input type="text" id="Fname" class="form-control" placeholder="First Name" autocomplete='off'>
              </div>
              <div class="form-group">
                <label for="inputName">Last Name</label>
                <input type="text" id="Lname" class="form-control" placeholder="Last Name" autocomplete='off'>
              </div>
              <div class="form-group">
                <label for="inputName">Age</label>
                <input type="text" id="Age" class="form-control" placeholder="Age" autocomplete='off'>
              </div>
              <div class="form-group">
                <label for="inputName">Country</label>
                <input type="text" id="Country" class="form-control" placeholder="Country" autocomplete='off'>
              </div>
              <div class="form-group">
                <label for="inputName"> Password</label>
                <input type="Password" id="Password" class="form-control" placeholder="Password" autocomplete='off'>
              </div>
              <!-- timezone -->
              <div class="form-group">
                <label class="col-form-label">Time Zone.</label>
                <select class="form-control select2 " name="time_zone" id="time_zone" style="width: 100%;" autocomplete='off'>
                    <option value="Hawaii">(GMT-10:00) Hawaii</option>
                    <option value="Alaska">(GMT-09:00) Alaska</option>
                    <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                    <option value="Arizona">(GMT-07:00) Arizona</option>
                    <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                    <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                    <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                    <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option><option value="" disabled="disabled">-------------</option>
                    <option value="International Date Line West">(GMT-11:00) International Date Line West</option>
                    <option value="Midway Island">(GMT-11:00) Midway Island</option>
                    <option value="Samoa">(GMT-11:00) Samoa</option>
                    <option value="Tijuana">(GMT-08:00) Tijuana</option>
                    <option value="Chihuahua">(GMT-07:00) Chihuahua</option>
                    <option value="Mazatlan">(GMT-07:00) Mazatlan</option>
                    <option value="Central America">(GMT-06:00) Central America</option>
                    <option value="Guadalajara">(GMT-06:00) Guadalajara</option>
                    <option value="Mexico City">(GMT-06:00) Mexico City</option>
                    <option value="Monterrey">(GMT-06:00) Monterrey</option>
                    <option value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                    <option value="Bogota">(GMT-05:00) Bogota</option>
                    <option value="Lima">(GMT-05:00) Lima</option>
                    <option value="Quito">(GMT-05:00) Quito</option>
                    <option value="Caracas">(GMT-04:30) Caracas</option>
                    <option value="Atlantic Time (Canada)">(GMT-04:00) Atlantic Time (Canada)</option>
                    <option value="La Paz">(GMT-04:00) La Paz</option>
                    <option value="Santiago">(GMT-04:00) Santiago</option>
                    <option value="Newfoundland">(GMT-03:30) Newfoundland</option>
                    <option value="Brasilia">(GMT-03:00) Brasilia</option>
                    <option value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                    <option value="Georgetown">(GMT-03:00) Georgetown</option>
                    <option value="Greenland">(GMT-03:00) Greenland</option>
                    <option value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                    <option value="Azores">(GMT-01:00) Azores</option>
                    <option value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                    <option value="Casablanca">(GMT) Casablanca</option>
                    <option value="Dublin">(GMT) Dublin</option>
                    <option value="Edinburgh">(GMT) Edinburgh</option>
                    <option value="Lisbon">(GMT) Lisbon</option>
                    <option value="London">(GMT) London</option>
                    <option value="Monrovia">(GMT) Monrovia</option>
                    <option value="Amsterdam">(GMT+01:00) Amsterdam</option>
                    <option value="Belgrade">(GMT+01:00) Belgrade</option>
                    <option value="Berlin">(GMT+01:00) Berlin</option>
                    <option value="Bern">(GMT+01:00) Bern</option>
                    <option value="Bratislava">(GMT+01:00) Bratislava</option>
                    <option value="Brussels">(GMT+01:00) Brussels</option>
                    <option value="Budapest">(GMT+01:00) Budapest</option>
                    <option value="Copenhagen">(GMT+01:00) Copenhagen</option>
                    <option value="Ljubljana">(GMT+01:00) Ljubljana</option>
                    <option value="Madrid">(GMT+01:00) Madrid</option>
                    <option value="Paris">(GMT+01:00) Paris</option>
                    <option value="Prague">(GMT+01:00) Prague</option>
                    <option value="Rome">(GMT+01:00) Rome</option>
                    <option value="Sarajevo">(GMT+01:00) Sarajevo</option>
                    <option value="Skopje">(GMT+01:00) Skopje</option>
                    <option value="Stockholm">(GMT+01:00) Stockholm</option>
                    <option value="Vienna">(GMT+01:00) Vienna</option>
                    <option value="Warsaw">(GMT+01:00) Warsaw</option>
                    <option value="West Central Africa">(GMT+01:00) West Central Africa</option>
                    <option value="Zagreb">(GMT+01:00) Zagreb</option>
                    <option value="Athens">(GMT+02:00) Athens</option>
                    <option value="Bucharest">(GMT+02:00) Bucharest</option>
                    <option value="Cairo">(GMT+02:00) Cairo</option>
                    <option value="Harare">(GMT+02:00) Harare</option>
                    <option value="Helsinki">(GMT+02:00) Helsinki</option>
                    <option value="Istanbul">(GMT+02:00) Istanbul</option>
                    <option value="Jerusalem">(GMT+02:00) Jerusalem</option>
                    <option value="Kyiv">(GMT+02:00) Kyiv</option>
                    <option value="Minsk">(GMT+02:00) Minsk</option>
                    <option value="Pretoria">(GMT+02:00) Pretoria</option>
                    <option value="Riga">(GMT+02:00) Riga</option>
                    <option value="Sofia">(GMT+02:00) Sofia</option>
                    <option value="Tallinn">(GMT+02:00) Tallinn</option>
                    <option value="Vilnius">(GMT+02:00) Vilnius</option>
                    <option value="Baghdad">(GMT+03:00) Baghdad</option>
                    <option value="Kuwait">(GMT+03:00) Kuwait</option>
                    <option value="Moscow">(GMT+03:00) Moscow</option>
                    <option value="Nairobi">(GMT+03:00) Nairobi</option>
                    <option value="Riyadh">(GMT+03:00) Riyadh</option>
                    <option value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                    <option value="Volgograd">(GMT+03:00) Volgograd</option>
                    <option value="Tehran">(GMT+03:30) Tehran</option>
                    <option value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                    <option value="Baku">(GMT+04:00) Baku</option>
                    <option value="Muscat">(GMT+04:00) Muscat</option>
                    <option value="Tbilisi">(GMT+04:00) Tbilisi</option>
                    <option value="Yerevan">(GMT+04:00) Yerevan</option>
                    <option value="Kabul">(GMT+04:30) Kabul</option>
                    <option value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                    <option value="Islamabad">(GMT+05:00) Islamabad</option>
                    <option value="Karachi">(GMT+05:00) Karachi</option>
                    <option value="Tashkent">(GMT+05:00) Tashkent</option>
                    <option value="Chennai">(GMT+05:30) Chennai</option>
                    <option value="Kolkata">(GMT+05:30) Kolkata</option>
                    <option value="Mumbai">(GMT+05:30) Mumbai</option>
                    <option value="New Delhi">(GMT+05:30) New Delhi</option>
                    <option value="Kathmandu">(GMT+05:45) Kathmandu</option>
                    <option value="Almaty">(GMT+06:00) Almaty</option>
                    <option value="Astana">(GMT+06:00) Astana</option>
                    <option value="Dhaka">(GMT+06:00) Dhaka</option>
                    <option value="Novosibirsk">(GMT+06:00) Novosibirsk</option>
                    <option value="Sri Jayawardenepura">(GMT+06:00) Sri Jayawardenepura</option>
                    <option value="Rangoon">(GMT+06:30) Rangoon</option>
                    <option value="Bangkok">(GMT+07:00) Bangkok</option>
                    <option value="Hanoi">(GMT+07:00) Hanoi</option>
                    <option value="Jakarta">(GMT+07:00) Jakarta</option>
                    <option value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                    <option value="Beijing">(GMT+08:00) Beijing</option>
                    <option value="Chongqing">(GMT+08:00) Chongqing</option>
                    <option value="Hong Kong">(GMT+08:00) Hong Kong</option>
                    <option value="Irkutsk">(GMT+08:00) Irkutsk</option>
                    <option value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                    <option value="Perth">(GMT+08:00) Perth</option>
                    <option value="Singapore">(GMT+08:00) Singapore</option>
                    <option value="Taipei">(GMT+08:00) Taipei</option>
                    <option value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar</option>
                    <option value="Urumqi">(GMT+08:00) Urumqi</option>
                    <option value="Osaka">(GMT+09:00) Osaka</option>
                    <option value="Sapporo">(GMT+09:00) Sapporo</option>
                    <option value="Seoul">(GMT+09:00) Seoul</option>
                    <option value="Tokyo">(GMT+09:00) Tokyo</option>
                    <option value="Yakutsk">(GMT+09:00) Yakutsk</option>
                    <option value="Adelaide">(GMT+09:30) Adelaide</option>
                    <option value="Darwin">(GMT+09:30) Darwin</option>
                    <option value="Brisbane">(GMT+10:00) Brisbane</option>
                    <option value="Canberra">(GMT+10:00) Canberra</option>
                    <option value="Guam">(GMT+10:00) Guam</option>
                    <option value="Hobart">(GMT+10:00) Hobart</option>
                    <option value="Melbourne">(GMT+10:00) Melbourne</option>
                    <option value="Port Moresby">(GMT+10:00) Port Moresby</option>
                    <option value="Sydney">(GMT+10:00) Sydney</option>
                    <option value="Vladivostok">(GMT+10:00) Vladivostok</option>
                    <option value="Magadan">(GMT+11:00) Magadan</option>
                    <option value="New Caledonia">(GMT+11:00) New Caledonia</option>
                    <option value="Solomon Is.">(GMT+11:00) Solomon Is.</option>
                    <option value="Auckland">(GMT+12:00) Auckland</option>
                    <option value="Fiji">(GMT+12:00) Fiji</option>
                    <option value="Kamchatka">(GMT+12:00) Kamchatka</option>
                    <option value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                    <option value="Wellington">(GMT+12:00) Wellington</option>
                    <option value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
                </select>
              </div>

              <!-- <div class="form-group">
                <label for="time_zone">Time Zone</label>
	               <select id="time_zone">
                    
                </select>
              </div> -->

              <div class="form-group">
                <label class="col-form-label">Role Type.</label>
                <select class="form-control select2 " name="RoleType" id="RoleType" style="width: 100%;" autocomplete='off'>
                    <option value="0" selected>Select One</option>
                    @foreach($UserRole  as $UserRole)
                        <option value="{{ $UserRole->sys_user_role_id }}">{{ $UserRole->sys_user_role }}</option>
                    @endforeach 
                </select>
              </div>

              <!-- <div class="form-group">
                <label for="inputDescription">Dream Type</label>
                <textarea id="inputDescription" class="form-control" rows="20"></textarea>
              </div> -->

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{route('userRegisterIndex')}}" class="btn btn-secondary">Cancel</a>
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
     var UserEmail   = $("#UserEmail").val();
     var Username    = $("#Username").val();
     var Fname       = $("#Fname").val();
     var Lname       = $("#Lname").val();
     var Age         = $("#Age").val();
     var Country     = $("#Country").val();
     var Password    = $("#Password").val();
     var time_zone   = $("#time_zone").val();
     var RoleType    = $("#RoleType").val();

        $.ajax({             
            type:"POST",
            cache:false,
            url:"{{route('userSaveDetails')}}",  

            data:{
                "UserEmail":UserEmail,
                "Username":Username,
                "Fname":Fname,
                "Lname":Lname,
                "Age":Age,
                "Country":Country,
                "Password":Password,
                "time_zone":time_zone,
                "RoleType":RoleType,
                },
            success: function(result) {
                if(result.data == 1){
                    swal("Successfully!", "Click the button!", "success");
                    window.location.href = '/user_register';
                    
                }else{
                    swal(result.message, "Click the button!", "error");
                }
            }
        });

}); 

</script>
<!-- timezone Dropdown -->
<style type="text/css">

</style>

</body>
</html>
