@extends('layout.admin')

@section('child_page')
<div class="row">
    <div class="col-sm-6">
        <h5>Danh sách đăng ký nghiệm thu</h5>
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
            <tr class="text-uppercase" >
                <th scope="col">stt</th>
                <th scope="col">mã</th>
                <th scope="col" class="text-left">tên giáo trình</th>
                <th scope="col">tac gia</th>

                <th scope="col">thời gian</th>
                <th scope="col">chi tiết</th>
            </tr>
        </thead>
        <tbody>
            @if ($list_nt->count() > 0)
                @foreach ($list_nt as $key=>$item)
                <tr>
                    <th scope="row">{{$key +1}}</th>
                    <td>{{$item->gtdk->ma_gt}}</td>

                    <td>{{$item->gtdk->ten_gt}}</td>
                    <td>
                        @if ($item->gtdk->users->count()>0)
                        @foreach ($item->gtdk->users as $tacgia)
                            <p>{{$tacgia->name}} - {{$tacgia->magv}}</p>
                        @endforeach

                        @endif
                    </td>
                    <td>{{$item->gtdk->dateNT}}</td>
                    <td>
                        <a href=""><i class="fa-solid fa-book-open-reader" style="color:blue; font-size: 25px;"></i></a>
                    </td>

                </tr>
                @endforeach
            @endif


        </tbody>
    </table>
@endsection
