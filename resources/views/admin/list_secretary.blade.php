@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-7 text-uppercase">
            <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách đăng ký nghiệm thu</h3>
        </div>
        
        <div class="col-sm-4">
            {{-- <form class="d-flex" role="search">
                <input class="form-control mx-2" type="search" placeholder="Nhập nội dung bạn cần tìm...?"
                    aria-label="Search">
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
                <th scope="col" class="text-center" style="vertical-align: middle">stt</th>
                <th scope="col" class="text-center" style="vertical-align: middle">mã</th>
                <th scope="col" class="text-center" style="vertical-align: middle">tên giáo trình</th>
                <th scope="col" class="text-center" style="vertical-align: middle">tác giả</th>

                <th scope="col" class="text-center" style="vertical-align: middle">thời gian</th>
                <th scope="col" class="text-center" style="vertical-align: middle">địa điểm</th>
                <th scope="col" class="text-center" style="vertical-align: middle; width: 15%;">Giáo trình</th>
                <th scope="col" class="text-center" style="vertical-align: middle">Quyết định</th>
                <th scope="col" class="text-center" style="vertical-align: middle">chi tiết</th>
                <th scope="col" class="text-center" style="vertical-align: middle">Tải xuống</th>

            </tr>
        </thead>
        <tbody>
            @if ($list_nt->count() > 0)
                @foreach ($list_nt as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->gtdk->ma_gt }}</td>

                        <td class="text-left">{{ $item->gtdk->ten_gt }}</td>
                        <td class="text-left">
                            @if ($item->gtdk->users->count() > 0)
                                @foreach ($item->gtdk->users as $tacgia)
                                    <p>{{ $tacgia->magv }} - {{ $tacgia->name }}</p>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ date ('d-m-Y H:i:s'), strtotime($item->gtdk->dateNT) }}</td>
                        <td>{{$item->gtdk->diadiem}}</td>
                        <td>
                            <p>

                                <a target="_blank" href="{{ $item->gtdk->file_upload }}">Xem ngay</a>
                                {{-- <a target="_blank" href="{{ $item->gtdk->file_upload }}">{{ $item->gtdk->file_name }}</a> --}}
                            </p>
                        </td>
                        <td>
                            <p>

                                QĐ số: <span style="color:blue; font-weight: 600">{{ $item->gtdk->statusNT }}</span>
                            </p>
                            <a href="{{ $item->gtdk->fileQD }}" style="color:blue; font-weight: 600">Xem ngay</a>
                        </td>

                        <td>
                            <a href="{{ route('manage.detail_secretary',$item->gtdk->id) }}"><i class="fa-solid fa-book-open-reader"
                                    style="color:blue; font-size: 25px;"></i></a>
                        </td>
                        <td>
                            <a href="{{route("manage.download_docx",$item->gtdk->id)}}">

                                <button>Tải xuống</button>
                            </a>
                            </td>


                    </tr>
                @endforeach
            @endif


        </tbody>
    </table>
@endsection
