@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-4">
            <h5>Danh sách khoa</h5>
        </div>
        <div class="col-sm-5"></div>
        <div class="col-sm-3 text-center mb-3">
            <a href="{{ route ('manage.add_faculty') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm khoa
                </button>  
            </a>                     
        </div>        
    </div>
    <table id="mytable" class="table table-bordered border-primary text-center mt-5" style="color: black; width: 80%; margin: 5% 10%;">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">stt</th>
                <th scope="col">mã khoa</th>
                <th scope="col" class="text-left" style="width: 40%;">tên khoa</th>                
                <th scope="col">quản lý</th>
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
