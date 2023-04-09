@extends('welcome')
@section('child_page')
    <div class="main-calendar">
        <div class="row">
            <div class="col-sm-6 text-uppercase mb-3">
                <h5 style="font-size: 27px;">Đăng ký nghiệm thu giáo trình</h5>
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
                        <th scope="col">Ngày đăng ký</th>
                    </tr>
                </thead>
                <tbody class="txt-calendar">
                    <tr>
                        <th scope="row" class="text-center txt-calendar">1</th>
                        <td class="text-center">CT111</td>
                        <td>Lập trình hướng đối tượng</td>
                        <td>
                            <select name="hdnt" id="">
                                <option value="0">Chọn hội đồng</option>
                                <option value="1">Nguyễn Văn A</option>
                                <option value="2">Nguyễn Văn B</option>
                                <option value="3">Nguyễn Văn C</option>
                            </select>
                        </td>
                        <td>Nguyễn Thanh Quyên</td>
                        <td class="text-center">
                            <input type="date" name="" id="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
