@extends('welcome')
@section('child_page')
    <div class="main-publish">
        <div class="row">
            <div class="col-sm-12">
                <h5>Giáo trình xuất bản</h5>
            </div>
        </div>
        <div class="row">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col" style="width:5%;">STT</th>
                        <th scope="col" style="width:14%;">Mã giáo trình</th>
                        <th scope="col" style="width:30%;">Tên giáo trình</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col" style="width:14%;">Năm xuất bản</th>
                        <th scope="col" style="width:10%;">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-center">1</th>
                        <td class="text-center">CT111</td>
                        <td>Lập trình Hướng đối tượng</td>
                        <td>
                            Nguyễn Thanh Quyên<br>
                            Nguyễn Văn A
                        </td>
                        <td class="text-center">2001</td>
                        <td class="text-center">
                            <a href="#"><i class="fa-solid fa-book"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
