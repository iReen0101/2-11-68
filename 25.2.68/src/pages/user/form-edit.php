<?php 
  include_once('../authen.php');
  if(!isset($_GET['id'])){
    header('Location:index.php');
  }
  $sql = "SELECT * FROM `item_user` WHERE `id` = '".$_GET['id']."' ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  //$arr_tag = explode(',', $row['tag']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit - User</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- style CSS-->
  <link rel="stylesheet" href="../../dist/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- bootstrap-toggle -->
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar & Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit - User</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   
    <!-- Main content -->
    <section class="content">
      <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Data</h3>
        </div>
        <form action="update.php" method="post" enctype="multipart/form-data">
          <div class="card-body">

            <div class="form-group row">
              <div class="col-12 col-sm-6 col-md-6 col-lg-6 p-2">
                <label for="emp_id">ชื่อ-นามสกุล</label>
                <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Emp. Code" value="<?php echo $row['emp_id']; ?>" required>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-6 p-2">
              <label for="emp_name">ประเภท</label>
                <select id="emp_name" name='selectBox' class="form-control">
                  <option value='emp.name'></option>
                  <option value='value_1' <?php if($row['emp_name']=="value_1"){echo "selected";}?>>ข้าราชการ</option>
                  <option value='value_2' <?php if($row['emp_name']=="value_2"){echo "selected";}?>>พลเรือน</option>
                  <option value='value_3' <?php if($row['emp_name']=="value_3"){echo "selected";}?>>พนักงานราชการ</option>
                  <option value='value_4' <?php if($row['emp_name']=="value_4"){echo "selected";}?>>พนักงานกระทรวงสาธารณสุข</option>
                  <option value='value_5' <?php if($row['emp_name']=="value_5"){echo "selected";}?>>ลูกจ้างชั่วคราวรายเดือน</option>
                  <option value='value_6' <?php if($row['emp_name']=="value_6"){echo "selected";}?>>ลูกจ้างประจำ</option>
                  <option value='value_7' <?php if($row['emp_name']=="value_7"){echo "selected";}?>>ลูกจ้างชั่วคราวรายวัน</option>
                  <option value='value_8' <?php if($row['emp_name']=="value_8"){echo "selected";}?>>พนักงานจ้างเหมาบริการ</option>
                  <option value='value_9'>อื่นๆ</option>  
                </select>
              </div>



              <div class="col-12 col-sm-6 col-md-6 col-lg-6 p-2">
                <label for=" department">ตำแหน่ง</label>
                <input type="text" class="form-control" id=" department" name=" department" placeholder="ตำแหน่ง" value="<?php echo $row['department']; ?>" required>
              </div>    
              <div class="col-12 col-sm-6 col-md-6 col-lg-6 p-2">
                <label for="position">กลุ่มงาน</label>
                <input type="text" class="form-control" id="position" name="position" placeholder="ตำแหน่ง" value="<?php echo $row['position']; ?>" required>
              </div>                    
            </div>
            position
          </div>
                 
          
        <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">User & Role</h3>
        </div>
       
          <div class="card-body">

            <div class="form-group row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-2">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>" required>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-2">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-2">
                <label for="role">Role</label>
                <?php if($row['dont_delete']=="") { ?>
                  <select id="role" name='selectBox' class="form-control">
                  <option value='user' <?php if($row['role']=="user"){echo "selected";}?>>User</option>
                  <option value='approval' <?php if($row['role']=="approval"){echo "selected";}?>>Approval</option>
                  <option value='admin' <?php if($row['role']=="admin"){echo "selected";}?>>Admin</option>
                </select>
                <?php } ?>

                <?php if($row['dont_delete']=="Yes") { ?>
                  <select id="role" name='selectBox' class="form-control" disabled>
                  <option value='user' <?php if($row['role']=="user"){echo "selected";}?>>User</option>
                  <option value='approval' <?php if($row['role']=="approval"){echo "selected";}?>>Approval</option>
                  <option value='admin' <?php if($row['role']=="admin"){echo "selected";}?>>Admin</option>
                </select>
                <?php } ?>
                
              </div>   
            </div>
         
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

           
          <div class="card-footer n">
          <center>
            <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
            <a href="../user" class="btn btn-danger" type="button">ยกเลิก</a></button>
          </center>
          </div>
      </form> 
      </div>    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  <?php include_once('../includes/footer.php') ?>
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- CK Editor -->
<script src="../../plugins/ckeditor/ckeditor.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- bootstrap-toggle -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });

    //Preview Images and Check images size
    $('.custom-file-input').on('change', function(){
      var size = this.files[0].size / 1024 / 1024
      //console.log(size.toFixed(2))
      if(size.toFixed(2) > 2){
        alert('to big, maximum is 2 MB')
      } else {
        var fileName = $(this).val().split('\\').pop()
        $(this).siblings('.custom-file-label').html(fileName)
        if (this.files[0]) {
            var reader = new FileReader()
            $('.figure').addClass('d-block')
            reader.onload = function (e) {
                $('#imgUpload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0])
        }
      }
    })

    //Initialize Select2 Elements
    $('.select2').select2()

    //ckeditor
//     CKEDITOR.replace( 'detail' ,{
//       filebrowserBrowseUrl : '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
//       filebrowserUploadUrl : '../../plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
//       filebrowserImageBrowseUrl : '../../plugins/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
// });

  });
  
</script>

</body>
</html>
