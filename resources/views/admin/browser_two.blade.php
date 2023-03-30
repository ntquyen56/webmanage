@extends('layout.admin')
@section('child_page')
    <div class="main-browser">
        <div class="row">
            <div class="col-sm-12 text-center text-uppercase">
                Danh sách đăng ký biên soạn năm 2023
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered border-primary text-center mt-3" style="color: black;">
                <thead>
                    <tr class="text-uppercase">
                        <th scope="col">stt</th>
                        <th scope="col">mã</th>
                        <th scope="col" class="text-left">tên giáo trình</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Ngày đăng ký</th>
                        <th scope="col">Khoa</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>CT111</td>
                        <td class="text-left">Cấu trúc dữ liệu</td>
                        <td class="text-left">
                            GV123 - Nguyễn Văn A <br>
                            GV456 - Nguyễn Văn B <br>
                            GV789 - Nguyễn Văn C
                        </td>
                        <td>15/03/2023</td>
                        <td>Khoa Công nghệ thông tin</td>
                        <td style="vertical-align: middle;">
                            <i class="fa-solid fa-circle-check" style="font-size: 25px; color:crimson;"></i>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>CT111</td>
                        <td class="text-left">Cấu trúc dữ liệu</td>
                        <td class="text-left">
                            GV123 - Nguyễn Văn A <br>
                            GV456 - Nguyễn Văn B <br>
                            GV789 - Nguyễn Văn C
                        </td>
                        <td>15/03/2023</td>
                        <td>Khoa Hệ thống thông tin</td>
                        <td style="vertical-align: middle;">
                            <i class="fa-solid fa-circle-check" style="font-size: 25px; color:crimson;"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
