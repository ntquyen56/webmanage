@extends('welcome')
@section('child_page')
    <div class="main-compilation mt-4">
        <div class="row mt-2">
            <div class="col-sm-12 text-center text-uppercase mx-4">
                <h5>Giáo trình đã đăng ký</h5>
            </div>
        </div>
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        <div class="row">
            <table class="table table-bordered" style="margin: 3%;">
                <thead class="text-center">
                    <th>Mã giáo trình</th>
                    <th>Tên giáo trình</th>
                    <th>Tác giả</th>
                    <th>Loại</th>

                    <th>Trạng thái</th>

                    <th>Ngày NT</th>
                    <th>Nộp bài</th>

                </thead>
                <tbody>
                    @if ($gtdk->count() > 0)
                        @foreach ($gtdk as $item)
                            <tr>
                                <td>{{ $item->ma_gt }}</td>
                                <td class="text-left">{{ $item->ten_gt }}</td>
                                <td class="text-left">
                                    @foreach ($item->users as $user)
                                        <p>{{ $user->magv }} - {{ $user->name }}</p>
                                    @endforeach
                                </td>
                                <td>{{ $item->loai->ten_loai}}</td>
                                @if ($item->status == 0)
                                    <td>
                                        <span style="color:red">Chưa duyệt</span>

                                    </td>
                                @else
                                    <td>
                                        <span style="color:black">{{ $item->messageStatus }}</span>
                                    </td>
                                @endif

                                    <td>

                                    </td>
                                @if ($item->browsered == 1 )
                                    <td style="vertical-align: middle;">
                                        <p>
                                            file đã nộp:

                                            <a target="_blank" href="{{ $item->file_upload }}">{{ $item->file_name }}</a>
                                        </p>
                                        <form action="{{ route('client.upload_document') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_dk" value="{{ $item->id }}">
                                            <input type="file" name="file_upload" id="">
                                            <button type="submit" class="btn btn-success">Nộp bài</button>
                                        </form>
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
