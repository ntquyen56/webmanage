@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6 text-uppercase">
            <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách đơn vị</h3>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3 text-center mb-3">
            <a href="{{ route ('manage.add_faculty') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm đơn vị
                </button>  
            </a>                     
        </div>        
    </div>
    <table id="mytable" class="table table-bordered  table-striped text-center mt-5" style="color: black; width: 80%; margin: 5% 10%;">
        <thead>
            <tr class="text-uppercase" style="background-color: rgb(173, 205, 237)">
                <th scope="col" class="text-center">stt</th>
                <th scope="col" class="text-center">mã đơn vị</th>
                <th scope="col" class="text-center" class="text-center" style="width: 40%;">tên đơn vị</th>                
                <th scope="col" class="text-center">quản lý</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $key => $khoa)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $khoa->ma_khoa }}</td>
                    <td class="text-left">{{ $khoa->ten_khoa }}</td>
                    <td>
                        <a href="{{ URL::to('manage/edit_faculty/'.$khoa->id_khoa) }}"><i class="fa-sharp fa-regular fa-pen-to-square"
                                style="color: green; font-size: 25px;"></i></a> |
                        <a onclick="return confirm('Bạn có muốn xóa không?')" 
                        href="{{ URL::to('manage/delete_faculty/'.$khoa->id_khoa) }}">
                        <i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
