@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6 text-uppercase">
            <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách trình độ</h3>
        </div>
        <div class="col-sm-1">
            {{-- <form class="d-flex" role="search">
                <input class="form-control mx-2" type="search" placeholder="Nhập nội dung bạn cần tìm...?" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form> --}}
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-3 text-center mb-3">
            <a href="{{ route('manage.add_level') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm trình độ
                </button>
            </a>
        </div>
    </div>
    <table id="mytable" class="table table-bordered table-striped text-center mt-3" style="color: black; width: 90%">
        <thead>
            <tr class="text-uppercase" style="background-color: rgb(173, 205, 237)">
                <th scope="col" class="text-center">stt</th>
                <th scope="col" class="text-center">mã trình độ</th>
                <th scope="col" class="text-center">tên trình độ</th>
                <th scope="col" class="text-center">quản lý</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $trinhdo)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $trinhdo->ma_trinhdo }}</td>
                    <td class="text-left">{{ $trinhdo->ten_trinhdo }}</td>
                    <td>
                        <a href="{{ URL::to('manage/edit_level/' . $trinhdo->id_trinhdo) }}"><i
                                class="fa-sharp fa-regular fa-pen-to-square" style="color: green; font-size: 25px;"></i></a>
                        |
                        <a onclick="return confirm('Bạn có muốn xóa không?')"
                            href="{{ URL::to('manage/delete_level/' . $trinhdo->id_trinhdo) }}"><i
                                class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
