<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phản hồi của lớp trưởng</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<body>
    <div class="container">
        <h3>Phản hồi của lớp trưởng</h3>
        <table class="table table-bordered table-hover table-striped dataTable no-footer display" id="tabledata">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Nội dung</td>
                </tr>
            </thead>
            <tbody>
    
                @foreach($indi_data as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$data->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-group col-md-12">
            <a class="btn btn-primary" href="{{ route('logout')}}">Log out</a>
        </div>
    </div>
</body>
</html>