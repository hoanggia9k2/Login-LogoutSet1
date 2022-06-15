<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thông tin nhân viên</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="http://websitemvc/mvc/publics/css/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="http://websitemvc/mvc/publics/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <h1 class="pl-2">Danh sách nhân viên</h1>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <!-- Hàng hình ảnh -->
      <div class="row pl-2">
        <!-- CPU Traffic -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">
                10
                <small>%</small>
              </span>
            </div>
          </div>
        </div>
        <!-- Likes -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
          </div>
        </div>
        <!-- Sales -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div>
        <!-- New Members -->
        <div class="col-12 col-sm-6 col-md-3 pr-2">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Hàng thông tin -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Danh sách thông tin nhân viên</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Họ và tên</th>
                  <th>Giới tính</th>
                  <th>Ngày sinh</th>
                  <th>Địa chỉ</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Ghi chú</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=0;foreach ($rows as $row):
                  $i++;?>
                  <div>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row['fullname'] ?></td>
                      <td><?php echo $row['gioitinh']?></td>
                      <td><?php $date = date_create($row['ngaysinh']); 
                      echo date_format($date,"d/m/Y")?></td>
                      <td><?php echo $row['diachi']?></td>
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['sdt']?></td>
                      <td>
                        <a href = "http://websitemvc/home/insert?id=<?php echo $row['id'] ?>" title='Xem thông tin' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'>Xem</span></a>
                        <a href = "http://websitemvc/home/update?id=<?php echo $row['id'] ?>" title='Xem thông tin' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'>Sửa</span></a>
                        <a href = "http://websitemvc/home/delete?id=<?php echo $row['id'] ?>" title='Xem thông tin' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'>Xoá</span></a>
                      </td>
                    <tr>
                  </div>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <a href = "http://websitemvc/home/add" class="btn btn-sm btn-info float-left">Thêm nhân viên</a>
            <a href="http://websitemvc/admin/logout" class="btn btn-sm btn-secondary float-right">Đăng xuất</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
    </div><!--/. container-fluid -->
  </section>
</div>
</body>
</html>
