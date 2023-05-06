@extends('layout.admin')

@section('child_page')
<div class="main-user">
    <div class="row mb-3">
        <div class="col-sm-2 mt-3 text-center">
            <a href="{{ route ('manage.user') }}"><i class="fa-solid fa-list" style="font-size: 30px; color: black;"></i></a>
        </div>
        <div class="col-sm-9  text-uppercase mt-3">
            <h3 style="font-weight: 700">Thêm người dùng</h3>
        </div>
    </div>
    @if(session('msg'))
        <div class="alert alert-danger">{{session('msg')}}</div>
    @endif
    <form action={{ route('manage.handle_add_user') }} method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-5 text-right">Mã giảng viên</div>
                            <div class="col-sm-7"><input required type="text" name="magv" id=""
                                    style="width: 30%; height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-5 text-right">Tên giảng viên</div>
                            <div class="col-sm-7"><input required type="text" name="tengv" id=""
                                    style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-5 text-right">Email</div>
                            <div class="col-sm-7"><input required type="email" name="email" id=""
                                    style="width: 75%; height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-5 text-right">Địa chỉ</div>
                            <div class="col-sm-7">
                                <textarea name="diachi" required id="" rows="2" cols="30"
                                    style="height: 125%; border: grey solid 2px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 text-right">Ngày sinh</div>
                            <div class="col-sm-8"><input type="date" required name="ngaysinh" id=""
                                    style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Giới tính</div>
                            <div class="col-sm-8">
                                <select name="gioitinh" required id="" class="text-center"
                                    style="height: 125%; border: grey solid 2px;">
                                    <option value="0">----Chọn----</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Đơn vị</div>
                            <div class="col-sm-8">
                                <select name="khoa" required id=""
                                    style="height: 125%;width: 80%; border: grey solid 2px;">
                                    <option value="0">-------Chọn đơn vị-------</option>
                                    @if ($allKhoa->count() > 0)
                                        @foreach ($allKhoa as $khoa)
                                            <option value={{ $khoa->id_khoa }}>{{ $khoa->ten_khoa }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Trình độ</div>
                            <div class="col-sm-8">
                                <select name="trinhdo" required id="" class="text-center"
                                    style="height: 125%; border: grey solid 2px;">
                                    <option value="0">----Chọn----</option>
                                    @if ($allTrinhDo->count() > 0)
                                        @foreach ($allTrinhDo as $trinhdo)
                                            <option value={{ $trinhdo->id_trinhdo }}>{{ $trinhdo->ten_trinhdo }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Liên hệ</div>
                            <div class="col-sm-8"><input required type="text" name="lienhe" id=""
                                    style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin: 5% 40%;">
                    <button type="submit" class="btn btn-success">Thêm người dùng</button>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </form>
</div>
@endsection
