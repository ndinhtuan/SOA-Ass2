<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phản hồi của cố vấn học tập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/sinhvien.css')}}">
</head>
<body>
    <!-- header -->
    <div id="header">
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="{{route('loptruongtaoyc')}}">Tạo yêu cầu</a>
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
        <h3>Phản hồi của thầy/cô cố vấn</h3>
        <table class="table table-bordered table-hover table-striped dataTable no-footer display" id="tabledata">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Nội dung</td>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
    
                @foreach($indi_data as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$data->description}}</td>
                    <td>
                        <a type="button" data-id="{{$data->notiID}}" class="open-AddBookDialog glyphicon glyphicon-trash" data-toggle="modal" data-target="#myModal1"> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
      <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <form action = "{{route('ltxoa')}}" method="post">
        <div class="modal-body">
        
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                bạn có muốn xóa thông báo này không?                
                <input type="hidden" id="noti" name="noti">
             
        </div>
        <div class="modal-footer">

            <input class="btn btn-default" type = "submit" value="Đồng ý">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
        </form>  
      </div>
      
    </div>
  </div>

  <script>
    $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        $(".modal-body #noti").val( myBookId );
    }); 
</script>
</body>
</html>