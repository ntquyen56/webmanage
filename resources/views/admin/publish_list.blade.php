@extends('layout.admin')

@section('child_page')
    <div class="row mb-3">
        <div class="col-sm-6 text-uppercase ">
            <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách xuất bản</h3>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            {{-- <form class="d-flex" role="search">
                <input class="form-control mx-2" type="search" placeholder="Nhập nội dung bạn cần tìm...?" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form> --}}
        </div>
        <div class="col-sm-1"></div>
    </div>

    <table id="mytable" class="table table-bordered table-striped text-center mt-3" style="color: black;">
        <thead>
            <tr class="text-uppercase" style="background-color: rgb(173, 205, 237)">
                <th scope="col" class="text-center">stt</th>
                <th scope="col" class="text-center">mã</th>
                <th scope="col" class="text-center">tên giáo trình</th>
                <th scope="col" class="text-center">Nội dung</th>
                <th scope="col" class="text-center">Ngày xuất bản</th>
                {{-- <th scope="col">quản lý</th> --}}
            </tr>
        </thead>
        <tbody>
            @if ($allGTXB->count() > 0)
            @foreach ($allGTXB as $key=>$item)
            @if (!str_contains($item->status, 
            'Không đạt') && !empty($item->status))
                
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$item->giaotrinh->ma_gt}}</td>
                    <td>{{$item->giaotrinh->ten_gt}}</td>
                    <td>
                        <a href="{{$item->giaotrinh->file_upload}}">Xem ngay</a>
                    </td>
                    <td>05/06/2023</td>
                    {{-- <td>
                        <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"
                                style="color: green; font-size: 25px;"></i></a> |
                        <a href="#"><i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                    </td> --}}
                </tr>
            @endif
            @endforeach
            @endif
        </tbody>
    </table>
@endsection
