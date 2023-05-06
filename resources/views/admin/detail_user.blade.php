@extends('layout.admin')
@section('child_page')
    <div class="main-detail mt-5">
        <h4 class="text-center mt-3 text-uppercase bd-info" style="color: black; font-weight:700;">Thông tin giảng viên</h4>
        <div class="col-12 mt-4">
            @foreach ($user as $key=>$user)
                <div class="row bd-info">
                    <div class="col-3 text-inf ">Mã GV</div>
                    <div class="col-9 text-tt">{{ $user->magv }}</div>
                </div>
                <div class="row bd-info">
                    <div class="col-3 text-inf">Họ tên GV</div>
                    <div class="col-9 text-tt">{{ $user->name }}</div>
                </div>
                <div class="row bd-info">
                    <div class="col-3 text-inf">Ngày sinh</div>
                    <div class="col-9 text-tt">{{date('d-m-Y', strtotime($user->ngaysinh))}}</div>
                </div>
                <div class="row bd-info">
                    <div class="col-3 text-inf">Giới tính</div>
                    <div class="col-9 text-tt">{{$user->gioitinh == 1 ?"Nam":"Nữ"}}</div>
                </div>
                <div class="row bd-info">
                    <div class="col-3 text-inf">Khoa</div>
                    <div class="col-9 text-tt">{{ $user->ten_khoa }}</div>
                </div>
                <div class="row bd-info">
                    <div class="col-3 text-inf">Trình độ</div>
                    <div class="col-9 text-tt">{{ $user->ten_trinhdo }}</div>
                </div>
                <div class="row bd-info">
                    <div class="col-3 text-inf">Địa chỉ</div>
                    <div class="col-9 text-tt">{{ $user->diachi }}</div>
                </div>
                <div class="row bd-info">
                    <div class="col-3 text-inf">Liên hệ</div>
                    <div class="col-9 text-tt">{{ $user->lienhe }}</div>
                </div>
            {{-- <div class="row mt-3 mb-3">
            <div class="col-12 text-center">
                <a href="{{ route ('manage.edit_user') }}">
                    <button type="button" class="btn btn-warning" style="color: white">
                        Cập nhật thông tin</button>
                </a>                                
            </div>
        </div> --}}
        @endforeach
        </div>
    </div>
@endsection
