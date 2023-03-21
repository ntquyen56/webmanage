@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6">
            <h5>Danh sách người dùng</h5>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <form class="d-flex" role="search">
                <input class="form-control mx-2" type="search" placeholder="Nhập nội dung bạn cần tìm...?" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <table class="table table-bordered border-primary text-center mt-3" style="color: black;">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">stt</th>
                <th scope="col">mã</th>
                <th scope="col" class="text-left">tên người dùng</th>
                <th scope="col">email</th>                               
                <th scope="col">chi tiết</th>                               
                <th scope="col">quản lý</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>GV1234</td>
                <td class="text-left">Nguyễn Thanh Quyên</td>
                <td>
                    quyenb1910287@cit.edu.vn
                </td>
                <td>
                    <a href="#"><i class="fa-solid fa-book-open-reader" style="color:blue; font-size: 25px;"></i></a>
                </td>
                <td>
                    <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"
                            style="color: green; font-size: 25px;"></i></a> |
                    <a href="#"><i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                </td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>GV1234</td>
                <td class="text-left">Nguyễn Thanh Quyên</td>
                <td>
                    quyenb1910287@cit.edu.vn
                </td>
                <td>
                    <a href="#"><i class="fa-solid fa-book-open-reader" style="color:blue; font-size: 25px;"></i></a>
                </td>
                <td>
                    <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"
                            style="color: green; font-size: 25px;"></i></a> |
                    <a href="#"><i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                </td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>GV1234</td>
                <td class="text-left">Nguyễn Thanh Quyên</td>
                <td>
                    quyenb1910287@cit.edu.vn
                </td>
                <td>
                    <a href="#"><i class="fa-solid fa-book-open-reader" style="color:blue; font-size: 25px;"></i></a>
                </td>
                <td>
                    <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"
                            style="color: green; font-size: 25px;"></i></a> |
                    <a href="#"><i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
