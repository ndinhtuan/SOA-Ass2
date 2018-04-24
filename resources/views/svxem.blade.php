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
                <div>
                    <h3>Trang xem điểm cá nhân</h3>
                    <table class="table table-bordered table-hover table-striped dataTable no-footer display" id="tabledata">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>MSV</th>
                                <th>Tên</th>
                                <th>Tham gia hoạt động đoàn</th>
                                <th>Hiến máu</th>
                                <th>Thi olympic</th>
                                <th>Nghiên cứu khoa học</th>
                                
                            </tr>
                        </thead>
                        <tbody>
            
                            @foreach($indi_data as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{str_limit($data->msv,20)}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->thamgiahoatdong}}</td>
                                <td>{{$data->hienmau}}</td>
                                <td>{{$data->thiolympic}}</td>
                                <td>{{$data->nghiencuukhoahoc}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="form-group col-md-12">
                            <a class="btn btn-primary" href="{{ route('svtaoyc')}}">tạo yêu cầu</a>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <a class="btn btn-primary" href="{{ route('svxemrp')}}">xem báo cáo</a>
                    </div>
                       
                    <div class="form-group col-md-12">
                        <a class="btn btn-primary" href="{{ route('logout')}}">Log out</a>
                    </div>
                </div>       
        </div>

  
  
</body>
</html>