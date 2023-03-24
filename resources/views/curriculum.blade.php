@extends('welcome')

@section('child_page')
    <div class="group-main">
        <div class="row mt-2 text-center">
            <h5>Đăng ký biên soạn giáo trình năm 2023</h5>
        </div>
        <div class="row ">
            <table class="table table-bordered " style="margin: 20px 50px; width: 90%;">
                <thead>
                    <tr class="text-uppercase text-center">
                        <th scope="col">STT</th>
                        <th scope="col" style="width: 15%;">mã giáo trình</th>
                        <th scope="col">Tên giáo trình</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-center">1</th>
                        <td class="text-center">CT111</td>
                        <td class="text-left">Lập trình hướng đối tượng</td>
                        <td class="text-center">
                            {{-- <input type="checkbox" name="" id="" style="width: 20px;"> --}}
                            <i class="fa-sharp fa-solid fa-check-double" style="color: green; font-size: 25px;"></i>
                        </td>
                        <td class="text-center">
                            <a href="#">
                                <i class="fa-solid fa-magnifying-glass-plus" style="color: #002B5B; font-size: 25px;"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">2</th>
                        <td class="text-center">CT111</td>
                        <td class="text-left">Lập trình hướng đối tượng</td>
                        <td class="text-center">
                            <input type="checkbox" name="" id="" style="width: 20px;">
                            {{-- <i class="fa-sharp fa-solid fa-check-double" style="color: green; font-size: 25px;"></i> --}}
                        </td>
                        <td class="text-center">
                            <a href="#">
                                <i class="fa-solid fa-magnifying-glass-plus" style="color: #002B5B; font-size: 25px;"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
