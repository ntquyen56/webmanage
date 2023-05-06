@extends('layout.admin')
@section('child_page')
    <div class="main-browser">
        <div class="row">
            <div class="col-sm-12 text-uppercase">
                <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách duyệt đăng ký biên soạn </h3>
            </div>
        </div>
        @if (session('msg'))

            <div class="row">
                <div class="alert alert-danger">
                {{session('msg')}}
                </div>
            </div>
        @endif

        @if (session('success'))

            <div class="row">
                <div class="alert alert-success">
                {{session('success')}}
                </div>
            </div>
        @endif
        <div class="row">
            <table class="table table-bordered table-striped text-center mt-3" style="color: black;">
                <thead>
                    <tr class="text-uppercase" style="background-color: rgb(173, 205, 237)">
                        <th scope="col" class="text-center">stt</th>
                        <th scope="col" class="text-center">mã</th>
                        <th scope="col" class="text-center">tên giáo trình</th>
                        <th scope="col" class="text-center">Tác giả</th>
                        <th scope="col" class="text-center">Loại</th>
                        <th scope="col" class="text-center">Ngày đăng ký</th>
                        <th scope="col" class="text-center">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($allGiaotrinhKhoa->count() > 0)
                        @foreach ($allGiaotrinhKhoa as $key=>$item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{$item->ma_gt}}</td>
                            <td class="text-left">{{$item->ten_gt}}</td>
                            <td class="text-left">
                               @foreach($item->users as $user)
                                    <p>{{$user->magv}} - {{$user->name}}</p>
                               @endforeach
                            </td>
                            <td>{{$item->loai_gt == "GT" ? "Giáo trình" : "Tài liệu tham khảo" }}</td>

                            {{-- <td>{{$item->created_at}}</td> --}}
                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                            @if (is_null($item->status))

                            <td style="vertical-align: middle;">
                                <form action="{{route('manage.hanle_browser_one')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_dk" value="{{$item->id}}">
                                    <input type="hidden" name="status" value="0">

                                    <button type="submit" class="btn btn-success"  style="margin-bottom:4px">Không Duyệt</button>
                                </form>
                                <form action="{{route('manage.hanle_browser_one')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="1">

                                    <input type="hidden" name="id_dk" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-success">Duyệt</button>
                                </form>
                            </td>
                            @endif
                            @if ($item->status === 1)
                                <td style="vertical-align: middle;">
                                    <span style="color:green;font-weight: bold;margin-bottom: 8px;display: inline-block;">Đã duyệt</span>

                                </td>
                            @endif
                            @if ($item->status === 0)
                                <td style="vertical-align: middle;">
                                    <span style="color:red;font-weight: bold;margin-bottom: 8px;display: inline-block;">Đã từ chối</span>

                                </td>
                            @endif
                        </tr>
                        @endforeach

                    @else
                        <tr  >
                            <td colspan="7" >

                            <p class="d-flex justify-content-between text-center">

                                Không có giáo trình

                            </p>

                            </td>

                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
