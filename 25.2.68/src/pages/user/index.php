<?php 
include '../anthen.php';
// include_once('../../authen.php'); 


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
    <title>User Info</title>
  

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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

    <?php
    $query = "SELECT * FROM `rq_user`";
    
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manage User Info</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li> -->
                <!-- <li class="breadcrumb-item active">Employee Management</li> -->
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
            <h3 class="card-title d-inline-block">User Info List</h3>
            <!-- <a href="form-c.php" class="btn btn-info float-right ">Add Person Info  +</a href=""> -->
            <a href="form-create.php" class="btn btn-info float-right ">Add User +</a href="">
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="dataTable" class="table table-bordered thead-light">
              <thead>
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>ตำแหน่ง</th>
                  <th>ประเภท</th>
                  <th>กลุ่มงาน</th>
                  <th>อีเมล</th>
                  <th>สถานะ</th>

                </tr>
              </thead>
              <tbody>
                
               
                  <tr>

                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    

                    <td>
                      <a href="form-view.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success text-white">
                        <i class="fas fa-eye"></i> View
                      </a>
                      <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning text-white">
                        <i class="fas fa-edit"></i> Edit
                      </a>

                      <?php if ($row['dont_delete'] != 'Yes') { ?>
                        <a href="#" onclick="deleteItem(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger">
                          <i class="fas fa-trash-alt"></i> Delete
                        </a>
                      <?php } ?>

                    </td>
                  </tr>
                
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
  <!-- bootstrap-toggle -->
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <script>
    $(function() {
      $('#dataTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
      });
    });

    function deleteItem(id) {
      if (confirm('Want to delete this person information?') == true) {
        window.location = `delete.php?id=${id}`;
        // window.location='delete.php?id='+id;
      }
    };

    //ถ้าเป็น class จะมี . นำหน้าเสมอ ถ้าเป็น id จะมี #  
    $('.toggle-event').change(function() {
      // console.log($(this).is(':checked'), $(this).data('id'))
      $.ajax({
          method: "POST",
          url: "active.php",
          data: {
            id: $(this).data('id'),
            value: $(this).is(':checked')
          }
        })
        .done(function(resp, status, xhr) {
          setTimeout(() => {
            alert(status)
          }, 300);
        })
        .fail(function(xhr, status, error) {
          alert(status + ' ' + error)
        })
    })
  </script>

</body>

</html>