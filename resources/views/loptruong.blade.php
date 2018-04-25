<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lớp trưởng</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/sinhvien.css')}}">
</head>
<body>
    <!-- header -->
    <div id="header">
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="{{route('loptruongxemrp')}}">Xem báo cáo</a>
                <a href="{{route('loptruong')}}">Xem điểm cả lớp</a>
            </div>
        </div>
        <a href="#" class="glyphicon glyphicon-off" id="logout" data-toggle="modal" data-target="#myModal"></a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn thực sự muốn đăng xuất?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <!-- <button type="button" class="btn btn-danger" onclick="location.href='{{url('logout')}}'">
                Chấp nhận</button> -->
                <a href="{{route('logout')}}" class="btn btn-danger">Chấp nhận</a>
            </div>
        </div> 
        </div>
    </div>
    <!-- end modal -->
    <!-- end header -->
        <div class="container">
                                        {{-- TẠO BẢNG ĐIỂM --}}

                <h3>Thêm điểm</h3>	
                <hr/>
            
                <form action="{{route('loptruongtao')}}" method="post" enctype="multipart/form-data" class="container">
                    {{csrf_field()}}
                    <div class="form-group col-md-6">
                        <label for="Tencongviec">Tham gia hoạt động đoàn</label>
                        <input type="number" class="form-control" id="" placeholder="Nhập điểm" name="thamgiahoatdong" required>
                    </div>
                    <div class="form-group col-md-6">
                            <label for="Tencongviec">Hiến máu</label>
                            <input type="number" class="form-control" id="" placeholder="Nhập điểm" name="hienmau" required>
                    </div>
                    <div class="form-group col-md-6">
                            <label for="Tencongviec">Thi olympic</label>
                            <input type="number" class="form-control" id="" placeholder="Nhập điểm" name="thiolympic" required>
                    </div>
                    <div class="form-group col-md-6">
                            <label for="Tencongviec">Nghiên cứu khoa học</label>
                            <input type="number" class="form-control" id="" placeholder="Nhập điểm" name="nghiencuukhoahoc" required>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-info" value="Gửi yêu cầu">
                    </div>
                    
                </form>

                <!-- <div class="form-group col-md-12">
                        <a class="btn btn-primary" href="{{ route('logout')}}">Log out</a>
                </div> -->
        </div>
</body>
</html>