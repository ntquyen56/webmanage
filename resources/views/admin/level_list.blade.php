@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-4">
            <h5>Danh sách trình độ</h5>
        </div>
        <div class="col-sm-4">
            <form class="d-flex" role="search">
                <input class="form-control mx-2" type="search" placeholder="Nhập nội dung bạn cần tìm...?" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-3 text-center">
            <a href="{{ route ('manage.add_level') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm trình độ
                </button>  
            </a>                     
        </div>        
    </div>
    <table class="table table-bordered border-primary text-center mt-3" style="color: black;">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">stt</th>
                <th scope="col">mã trình độ</th>
                <th scope="col" class="text-left">tên trình độ</th>
                <th scope="col">quản lý</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>TD111</td>
                <td class="text-left">Đại học</td>
                <td>
                    <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"
                            style="color: green; font-size: 25px;"></i></a> |
                    <a href="#"><i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>TD222</td>
                <td class="text-left">Thạc sĩ</td>
                <td>
                    <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"
                            style="color: green; font-size: 25px;"></i></a> |
                    <a href="#"><i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
