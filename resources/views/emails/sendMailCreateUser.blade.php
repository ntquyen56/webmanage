<!DOCTYPE html>
<html>
<head>
    <title>minhb1910259@gmail.com.com</title>
</head>
<style>
    .body{
        border:1px solid #ccc;
        padding: 12px;

    }
    .link_reset{
        padding:4px 8px;
        background: rgb(127, 127, 194);

        color: black;
        font-weight: bold;
    }
    header{
        padding: 12px;
        font-size: 30px;
        font-weight: bold;
    }
</style>
<body>
    <div style="padding:12px;border:1px solid#ccc;">
        <div style="padding:24px;border-bottom:1px solid #ccc;margin:0;text-align:center;font-weight:bold;font-size:35px;color:black;">
            <p>

                Mail từ <span style="color:red;">Thanhquyen</span>
            </p>
        </div>
        <div style="padding:12px">
            <p>Xin chào {{$user->email}}</p>
            @if (!isset($mailData['password']) && !empty($mailData['password']))

            <p>password: {{$mailData['password']}}</p>
            @endif

            <p>{{$mailData['message'] ?? 'abc'}}</p>
            <p>file: {{$mailData['file'] ?? 'khong co file'}}</p>


            <p>Cảm ơn bạn đã...</p>
        </div>
    </div>
</body>
</html>
