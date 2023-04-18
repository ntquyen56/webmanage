@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-4">
            <h5>Danh sách giáo trình biên soạn</h5>
        </div>

        <div class="col-sm-5">
            <form action="">
                <div class="row">
                    <div class="col-sm-5">Ngày bắt đầu: <input type="datetime-local" name="" id=""
                            style="width: 100%;"></div>
                    <div class="col-sm-5">Ngày kết thúc: <input type="datetime-local" name="" id=""
                            style="width: 100%;"></div>
                    <button type="submit" class="mt-3 text-center" style="width: 15%;height: 30px;">Lưu</button>
                </div>
                
            </form>
        </div>

        <div class="col-sm-3 text-center">
            <a href="{{ route('manage.add_curriculum') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm giáo trình

                </button>
            </a>

            @if ($check == 0)
                <form action="{{ route('manage.handle_update_curriculum') }}" method="post">
                    @csrf
                    <input type="hidden" name="status" value="start">

                    <button type="submit">Bắt đầu</button>
                </form>
            @endif
            @if ($check == 1)
                <form action="{{ route('manage.handle_update_curriculum') }}" method="post">
                    @csrf
                    <input type="hidden" name="status" value="close">

                    <button type="submit">Kết thúc</button>
                </form>
            @endif
        </div>

    </div>
    <table id="mytable" class="table table-bordered border-primary text-center mt-3" style="color: black;">
        <thead>
            <tr class="text-uppercase">
                <th scope="col" class="text-center">stt</th>
                <th scope="col" class="text-center">mã</th>
                <th scope="col" class="text-center">tên giáo trình</th>
                <th scope="col" class="text-center">Trạng thái</th>
                {{-- <th scope="col">chi tiết</th> --}}
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
                            {{ strtotime($curriculum->status) > 0 && !empty($curriculum->status) ? 'Open' : 'Close' }}
                        </td>
                        {{-- <td>
                        <a href="#"><i class="fa-solid fa-book-open-reader" style="color:blue; font-size: 25px;"></i></a>
                    </td> --}}
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
