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
                    <tr class="text-center">
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td class="text-left">Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
