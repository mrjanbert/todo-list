<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>


  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Poppins:100,300,400,500,600,700,800,900">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.12.1/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs4/2.3.0/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons-bs4/2.2.3/buttons.bootstrap4.min.css">

</head>

<body>

  <div class="wrapper">
    <div class="container">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mt-3 mb-2">
            <div class="col-sm-6">
              <h1>To-do List</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-end">
                    <div class="d-flex justify-content-end mb-2">
                      <button class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#todo">
                        <i class="fa fa-plus mr-1"></i>
                        Add
                      </button>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">From</th>
                        <th class="text-center">Task</th>
                        <th class="text-center">Remarks</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require_once 'connection/db.php';
                      $i = 1;
                      $sql = $conn->query("SELECT * FROM task");
                      $rows = $sql->fetch_all(MYSQLI_ASSOC);
                      foreach ($rows as $row) {
                      ?>
                        <tr>
                          <td align="center"><?= $i++ ?></td>
                          <td><?= $row['suggested'] ?></td>
                          <td><?= $row['task'] ?></td>
                          <td align="center"><?= $row['status'] ?></td>
                          <td align="center">
                            <?php if($row['status'] == 'Working') { ?>
                              <a href="config/done.php?id=<?= $row['id'] ?>" class="btn btn-success btn-xs">Mark as done</a>
                            <?php } else { ''; } ?>
                            <a href="config/delete_task.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-xs">Delete</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.card-body -->
              </div><!-- /.card -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section><!-- /.content -->
    </div>
  </div>

  <!-- Add Todo -->
  <div class="modal fade" id="todo">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <form action="config/add_task.php" method="POST" autocomplete="off">
        <div class="modal-content card-outline card-primary">
          <div class="modal-header">
            <h4 class="modal-title">Add Todo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Task <small class="text-red">*</small></label>
                  <input type="text" class="form-control form-control-border" name="task" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Suggested By: <small class="text-red">*</small></label>
                  <input type="text" class="form-control form-control-border" name="suggested" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-end">
            <button type="submit" name="submit" class="btn btn-primary">
              Save
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancel
            </button>
          </div>
        </div>
      </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- Add Todo -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.12.1/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-responsive/2.3.0/dataTables.responsive.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs4/2.3.0/responsive.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons-bs4/2.2.3/buttons.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/buttons.colVis.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bs-custom-file-input/1.3.4/bs-custom-file-input.min.js"></script>

  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>

  <!-- Page specific script -->
  <script>
    $(function() {
      $('#example2').DataTable({
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true
      });
    });
  </script>
</body>

</html>