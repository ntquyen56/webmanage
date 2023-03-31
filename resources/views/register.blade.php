@extends('welcome')
@section('child_page')
    <div class="main-publish">
        <form action="{{route('currClient.handle_register_curr')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 text-center text-uppercase">
                    <h5>Đăng ký biên soạn giáo trình năm 2023</h5>
                </div>
            </div>
            @if(!empty(session('msg')))
                <div class="alert alert-danger">{{session('msg')}}</div>
            @endif
            @if(!empty(session('success')))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Mã giáo trình</div>
                <div class="col-sm-7"><input type="text" name="magt" class="btn-input" id=""></div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Tên giáo trình</div>
                <div class="col-sm-7"><input type="text" name="tengt" class="btn-input" style="width: 60%;" id=""></div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Loại giáo trình</div>
                <div class="col-sm-7">
                    <select name="loaigt" class="btn-input" id="">
                        <option value="0">-------Chọn-------</option>
                        <option value="1">Giáo trình</option>
                        <option value="2">Tài liệu tham khảo</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4 text-right">Khoa</div>
                <div class="col-sm-8">
                    <select name="khoa" id="" style="height: 125%; border: grey solid 2px;">
                        <option value="0">-------Chọn khoa giảng dạy-------</option>
                        @if ($allKhoa->count() > 0)
                            @foreach ($allKhoa as $khoa)
                                <option
                                    value={{ $khoa->id_khoa }}>{{ $khoa->ten_khoa }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Tác giả</div>
                <div class="col-sm-7">
                    <textarea name="allTacGia" id="" cols="40" class="btn-input" rows="5"></textarea>
                </div>
            </div>
            <button type="submit" class="btn-txt">Đăng ký</button>
            {{-- <button type="submit" class="btn btn-success text-center">Đăng ký</button> --}}

        </form>
    </div>
@endsection
