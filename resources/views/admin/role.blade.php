@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6">
            <h5>Danh sách vai trò</h5>
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
                <th scope="col" class="text-left" style="width: 30%;">tên người dùng</th>
                <th scope="col-2" style="width: 60%;">vai trò</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>GV1234</td>
                <td class="text-left">Nguyễn Thanh Quyên</td>      
                <td>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="checkbox" name="" id=""> Hội đồng trường
                        </div>
                        <div class="col-sm-3">
                            <input type="checkbox" name="" id=""> Trưởng khoa
                        </div>
                        <div class="col-sm-3">
                            <input type="checkbox" name="" id=""> HĐNT
                        </div>
                        <div class="col-sm-3">
                            <input type="checkbox" name="" id=""> Thư ký
                        </div>                        
                    </div>
                </td>          
            </tr>            
        </tbody>
    </table>
@endsection
