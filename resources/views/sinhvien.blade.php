<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sinh viên</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
        <div class="container">
                                        {{-- TẠO BẢNG ĐIỂM --}}

                <h3>Thêm điểm</h3>	
                <hr/>
            
                <form action="{{route('svtao')}}" method="post" enctype="multipart/form-data" class="container">
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

                <div class="form-group col-md-6">
                        <a class="btn btn-primary" href="{{ route('svxemrp')}}">xem báo cáo</a>
                </div>
                <div class="form-group col-md-6">
                        <a class="btn btn-primary" href="{{ route('logout')}}">Log out</a>
                </div>
        </div>
</body>
</html>