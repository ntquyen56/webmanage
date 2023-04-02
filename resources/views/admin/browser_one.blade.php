@extends('layout.admin')
@section('child_page')
    <div class="main-browser">
        <div class="row">
            <div class="col-sm-12 text-center text-uppercase">
                Danh sách đăng ký biên soạn năm 2023 - Khoa công nghệ thông tin
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
            <table class="table table-bordered border-primary text-center mt-3" style="color: black;">
                <thead>
                    <tr class="text-uppercase">
                        <th scope="col">stt</th>
                        <th scope="col">mã</th>
                        <th scope="col" class="text-left">tên giáo trình</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Loại</th>

                        <th scope="col">Ngày đăng ký</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($allGiaotrinhKhoa->count() > 0)
                        @foreach ($allGiaotrinhKhoa as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$item->ma_gt}}</td>
                            <td class="text-left">{{$item->ten_gt}}</td>
                            <td class="text-left">
                               @foreach($item->users as $user)
                                    <p>{{$user->magv}} - {{$user->name}}</p>
                               @endforeach
                            </td>
                            <td>{{$item->loai_gt == 1 ? "Giáo trình" : "Tài liệu tham khảo" }}</td>

                            <td>{{$item->created_at}}</td>
                            @if ($item->status === 0)

                            <td style="vertical-align: middle;">
                                <span style="color:red;font-weight: bold;margin-bottom: 8px;display: inline-block;">Chưa duyệt</span>
                                <form action="{{route('manage.hanle_browser_one')}}" method="POST">
                                    @csrf
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
