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
                <a href="{{route('loptruongtaoyc')}}">tạo yêu cầu</a>
                <a href="{{route('loptruongxemrp')}}">xem báo cáo</a>
                <a href="{{route('guirpcovan')}}">gửi report</a>
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
                <div>
                    <h3>Trang xem điểm cả lớp</h3>
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
                                <th>Report</th>
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
                                
                                <td class="center" style="text-align: center;">
                                <a type="button" data-id="{{$data->msv}}" class="open-AddBookDialog glyphicon glyphicon-wrench" data-toggle="modal" data-target="#myModal2"> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- <div class="form-group col-md-12">
                            <a class="btn btn-primary" href="{{ route('loptruongtaoyc')}}">tạo yêu cầu</a>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <a class="btn btn-primary" href="{{ route('loptruongxemrp')}}">xem báo cáo</a>
                    </div>

                        
                    <div class="form-group col-md-12">
                        <a class="btn btn-primary" href="{{ route('logout')}}">Log out</a>
                    </div> -->
                    <div class="form-group col-md-12">
                        <a class="btn btn-primary" href="#" style="float: right;" data-toggle="modal" data-target="#myModal1">gửi report cho cố vấn</a>
                        <!-- Modal -->
                          <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Gửi report cho cố vấn</h4>
                                </div>
                                <form action = "{{route('guirpcovan')}}" method="post">
                                <div class="modal-body">
                                
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="text" class="form-control" id="rpforcv" name="rpforcv">
                                     
                                </div>
                                <div class="modal-footer">

                                    <input class="btn btn-info" type = "submit" value="Gửi">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  
                                </div>
                                </form>  
                              </div>
                              
                            </div>
                          </div>
                    </div>
                </div>       
        </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Report cho sinh viên</h4>
        </div>
        <form action = "{{route('rp')}}" method="post">
        <div class="modal-body">
        
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" name="rptext">
                <input type="hidden" id="msv" name="msv">
             
        </div>
        <div class="modal-footer">

            <input class="btn btn-info" type = "submit" value="Gửi">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
        </form>  
      </div>
      
    </div>
  </div>
  <script>
    $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        $(".modal-body #msv").val( myBookId );
    }); 
</script>
</body>
</html>