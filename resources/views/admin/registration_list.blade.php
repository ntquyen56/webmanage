@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6 text-uppercase">
            <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách giáo trình biên soạn</h3>
        </div>
        <div class="col-sm-3"></div>
        {{-- @if (session('msg'))
            <div class="alert alert-danger">
                {{ session('msg') }}
            </div>
        @endif
        <div class="col-sm-5">
            <form action="{{ route('manage.handle_update_curriculum') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-5 txt-time">Ngày bắt đầu: <input type="datetime-local" name="dateStart" id=""
                            style="width: 100%;"></div>
                    <div class="col-sm-5 txt-time">Ngày kết thúc:<input type="datetime-local" name="dateEnd" id=""
                            style="width: 100%;"></div>
                    <button type="submit" class="mt-3 text-center" style="width: 15%;height: 30px;">Lưu</button>
                </div>
            </form>
        </div> --}}

        <div class="col-sm-3 text-center">
            <a href="{{ route('manage.add_curriculum') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm giáo trình

                </button>
            </a>
        </div>
    </div>
    <div class="row mt-2">
        @if (session('msg'))
            <div class="alert alert-danger">
                {{ session('msg') }}
            </div>
        @endif
        <div class="col-sm-12 mt-2">
            <form action="{{ route('manage.handle_update_curriculum') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-2 txt-time text-right">Ngày bắt đầu:</div>
                    <div class="col-sm-3"> <input type="datetime-local" name="dateStart" id=""
                            style="width: 100%;"></div>
                    <div class="col-sm-2 text-right txt-time">Ngày kết thúc:</div>
                    <div class="col-sm-3 "><input type="datetime-local" name="dateEnd" id="" style="width: 100%;">
                    </div>
                    <div class="col-sm-2"><button type="submit" class="text-center btn-hover"
                            style="border: none;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, 
                            rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                                <i class="fa-solid fa-floppy-disk"></i> Lưu</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3 mb-2" style="color: rgb(227, 126, 25);">
        <div class="col-sm-2"></div>
        <div class="col-sm-4 txt-time">Từ ngày: {{ date('d-m-Y H:i:s', strtotime($curriculums[0]->dateStart)) }}</div>
        <div class="col-sm-4 txt-time">Đến ngày: {{ date('d-m-Y H:i:s', strtotime($curriculums[0]->dateEnd)) }}</div>
    </div>
    <div class="row mt-2">
        @if (session('msg'))
            <div class="alert alert-danger">
                {{ session('msg') }}
            </div>
        @endif
        <div class="col-sm-12 mt-2">
            <form action="{{ route('manage.handle_update_status_dkbs') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-2 txt-time text-right">Ngày bắt đầu chỉnh sửa file nộp:</div>
                    <div class="col-sm-3"> <input type="datetime-local" name="dateStart" id=""
                            style="width: 100%;"></div>
                    <div class="col-sm-2 text-right txt-time">Ngày kết thúc chỉnh sửa file nộp:</div>
                    <div class="col-sm-3 "><input type="datetime-local" name="dateEnd" id="" style="width: 100%;">
                    </div>
                    <div class="col-sm-2"><button type="submit" class="text-center btn-hover"
                            style="border: none;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, 
                            rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                                <i class="fa-solid fa-floppy-disk"></i> Lưu</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3 mb-2" style="color: rgb(227, 126, 25);">
        <div class="col-sm-2"></div>
        <div class="col-sm-4 txt-time">Từ ngày: {{ date('d-m-Y H:i:s', strtotime($dkbs->dateStartEditFile)) }}</div>
        <div class="col-sm-4 txt-time">Đến ngày: {{ date('d-m-Y H:i:s', strtotime($dkbs->dateEndEditFile)) }}</div>
    </div>

    <table id="mytable" class="table table-bordered table-striped text-center mt-3" style="color: black;">
        <thead>
            <tr class="text-uppercase" style="background-color: rgb(173, 205, 237)">
                <th scope="col" class="text-center">stt</th>
                <th scope="col" class="text-center">mã</th>
                <th scope="col" class="text-center">tên giáo trình</th>
                <th scope="col" class="text-center">Trạng thái</th>
                <th scope="col" class="text-center">Năm biên soạn</th>
                <th scope="col" class="text-center">quản lý</th>
            </tr>
        </thead>
        <tbody>
            @if ($curriculums->count() > 0)
                @foreach ($curriculums as $curriculum)
                    <tr>
                        <th scope="row">{{ $curriculum->id }}</th>
                        <td>{{ $curriculum->ma_gt }}</td>
                        <td class="text-left">{{ $curriculum->ten_gt }}</td>
                        <td>
                            {{ \Carbon\Carbon::now()->lt($curriculum->dateEnd) ? 'Open' : 'Close' }}
                        </td>
                        <td>{{ date('d-m-Y'), strtotime($curriculum->created_at) }}</td>
                        <td>
                            <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"
                                    style="color: green; font-size: 25px;"></i></a> |
                            <a onclick="return confirm('Bạn có muốn xóa không?')"
                                href="{{ URL::to('manage/delete_curr/' . $curriculum->id) }}">
                                <i class="fa-sharp fa-solid fa-trash" style="color: red; font-size: 25px;"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    {{-- <div class="d-flex justify-content-end">

        {{ $curriculums->withQueryString()->links() }}
    </div> --}}
@endsection
