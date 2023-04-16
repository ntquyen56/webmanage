@extends('welcome')
@section('child_page')
    <div class="main-calendar">
        <div class="row">
            <div class="col-sm-6 text-uppercase mb-3">
                <h5 style="font-size: 27px;">Lịch nghiệm thu năm 2023</h5>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
              <h6><a href="{{route('client.compilation')}}?page=calender" style="text-decoration: none;color:black;">
                <i class="fa-solid fa-calendar-plus" style="color:rgb(219, 219, 11);"></i>
                Đăng ký nghiệm thu</a></h6>
            </div>

        </div>
        <div class="row">
            <table class="table table-bordered table-hover table-cell" style="">
                <thead>
                    <tr class="txt-calendar text-center">
                        <th scope="col" class="txt-calendar">STT</th>
                        <th scope="col" style="width: 8%;">Mã giáo trình</th>
                        <th scope="col" class="txt-calendar">Tên giáo trình</th>
                        <th scope="col">Hội đồng</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Ngày đăng kí</th>
                        <th scope="col">Ngày nghiệm thu</th>
                        <th scope="col" style="width: 10%;">Địa điểm</th>
                    </tr>
                </thead>
                <tbody class="txt-calendar">
                    <tr>
                        <th scope="row" class="text-center txt-calendar">1</th>
                        <td class="text-center">CT111</td>
                        <td>Lập trình hướng đối tượng</td>
                        <td>
                            Nguyên Văn Anh<br>
                            Nguyên Văn Annh Beee<br>
                            Nguyên Văn Aaaa<br>
                            Nguyên Văn A aaaaaa<br>
                            Nguyên Văn A
                        </td>
                        <td>Nguyễn Thanh Quyên</td>
                        <td class="text-center">05/12/2022</td>
                        <td class="text-center">05/05/2023</td>
                        <td class="text-center">08g00 - P108, Trường CNTT & TT</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
