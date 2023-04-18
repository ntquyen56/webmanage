@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-4">
            <h5>Danh sách trình độ</h5>
        </div>
        <div class="col-sm-4">
            {{-- <form class="d-flex" role="search">
                <input class="form-control mx-2" type="search" placeholder="Nhập nội dung bạn cần tìm...?" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form> --}}
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-3 text-center mb-3">
            <a href="{{ route('manage.add_location') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm địa điểm
                </button>
            </a>
        </div>
    </div>
    <table id="mytable" class="table table-bordered border-primary text-center mt-3" style="color: black;">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">stt</th>
                <th scope="col">Phòng</th>
                <th scope="col">Khu vực</th>
                <th scope="col">quản lý</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $diadiem)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $diadiem->phong }}</td>
                    <td>{{ $diadiem->khuvuc }}</td>
                    <td>
                        <a href="{{ URL::to('manage/edit_location/' . $diadiem->id_dd) }}"><i
                                class="fa-sharp fa-regular fa-pen-to-square" style="color: green; font-size: 25px;"></i></a>
                        |
                        <a onclick="return confirm('Bạn có muốn xóa không?')"
                            href="{{ URL::to('manage/delete_location/' . $diadiem->id_dd) }}"><i
                                class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
