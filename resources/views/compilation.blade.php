@extends('welcome')
@section('child_page')
    <div class="main-compilation">
        <div class="row mt-2">
            <div class="col-sm-12 text-center text-uppercase mx-4">
                <h5>Giáo trình đã đăng ký</h5>
            </div>
        </div>
        <div class="row mt-3">
            <table class="table" style="margin: 3%;">
                <thead class="text-center">
                    <th>Mã giáo trình</th>
                    <th>Tên giáo trình</th>
                    <th>Tác giả</th>
                    <th>Trạng thái</th>
                    <th>Nộp bài</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">CT111</td>
                        <td>Lập trình</td>
                        <td>
                            Nguyễn Văn A <br>
                            Nguyễn Văn B <br>
                        </td>
                        <td class="text-center">
                            Chưa duyệt
                        </td>
                        <td class="text-center">File Word</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
