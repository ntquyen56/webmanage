@extends('layout.admin')
@section('child_page')
    <div class="main-browser">
        <div class="row">
            <div class="col-sm-12 text-uppercase">
                <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách đăng ký biên soạn</h3>
            </div>
        </div>
        <div class="row">
            <table id="mytable" class="table table-bordered table-striped text-center mt-3" style="color: black;">
                <thead>
                    <tr class="text-uppercase" style="background-color: rgb(173, 205, 237); font-size: 15px;">
                        <th scope="col" style="vertical-align: middle; text-align: center">stt</th>
                        <th scope="col" style="vertical-align: middle; text-align: center">mã</th>
                        <th scope="col" style="vertical-align: middle; text-align: center">tên giáo trình</th>
                        <th scope="col" style="vertical-align: middle; text-align: center">Tác giả</th>
                        <th scope="col" style="vertical-align: middle; text-align: center">Loại</th>

                        <th scope="col" style="vertical-align: middle; text-align: center">Ngày đăng ký</th>
                        <th scope="col" style="vertical-align: middle; text-align: center">Khoa</th>
                        <th scope="col" style="vertical-align: middle; text-align: center">Phiếu duyệt</th>

                        <th scope="col" style="vertical-align: middle; text-align: center">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($allGiaotrinhKhoa->count() > 0)
                        @foreach ($allGiaotrinhKhoa as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->ma_gt }}</td>
                                <td class="text-left">{{ $item->ten_gt }}</td>
                                <td class="text-left">
                                    @foreach ($item->users as $user)
                                        <p>{{ $user->magv }} - {{ $user->name }}</p>
                                    @endforeach
                                </td>
                                <td>{{ $item->loai_gt == 1 ? 'Giáo trình' : 'Tài liệu tham khảo' }}</td>

                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->khoa->ten_khoa }}</td>
                                <td>{{ $item->caculateDiem }}</td>


                                @if ($item->statusTongDiem === 0)
                                    <td style="vertical-align: middle;">
                                        <form action="{{ route('manage.hanle_browser_two') }}" method="POST"
                                            style="margin-bottom:8px">
                                            @csrf
                                            <input type="hidden" name="id_dk" value="{{ $item->id }}">
                                            <input type="hidden" name="status" value="0">

                                            <button type="submit" class="btn btn-danger">Không</button>
                                        </form>
                                        <form action="{{ route('manage.hanle_browser_two') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_dk" value="{{ $item->id }}">
                                            <input type="hidden" name="status" value="1">

                                            <button type="submit" class="btn btn-success">Duyệt</button>
                                        </form>
                                    </td>
                                @endif
                                @if ($item->statusTongDiem === 1)
                                    <td style="vertical-align: middle;">
                                        <span
                                            style="color:green;font-weight: bold;margin-bottom: 8px;display: inline-block;">Đã
                                            đánh giá</span>

                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">

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
