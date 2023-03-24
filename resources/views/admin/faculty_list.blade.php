@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-4">
            <h5>Danh sách khoa</h5>
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
            <a href="{{ route ('manage.add_faculty') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm khoa
                </button>  
            </a>                     
        </div>        
    </div>
    <table class="table table-bordered border-primary text-center mt-5" style="color: black; width: 80%; margin: 5% 10%;">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">stt</th>
                <th scope="col">mã khoa</th>
                <th scope="col" class="text-left" style="width: 40%;">tên khoa</th>                
                <th scope="col">quản lý</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>K111</td>
                <td class="text-left">Khoa Công nghệ thông tin</td>
                <td>
                    <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"
                            style="color: green; font-size: 25px;"></i></a> |
                    <a href="#"><i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>K222</td>
                <td class="text-left">Khoa Hệ thống thông tin</td>
                <td>
                    <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"
                            style="color: green; font-size: 25px;"></i></a> |
                    <a href="#"><i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
