@extends('layout.admin')
@section('child_page')

<div class="main-detail">
    <h4 class="text-center mt-3 text-uppercase bd-info" style="color: black; font-weight:700;">Thông tin giảng viên</h4>
    <div class="col-12 mt-4">
        <div class="row bd-info">
            <div class="col-3 text-inf ">Mã GV</div>
            <div class="col-9 text-tt">GV12345</div>
        </div>
        <div class="row bd-info">
            <div class="col-3 text-inf">Họ tên GV</div>
            <div class="col-9 text-tt">Nguyễn Thanh Quyên</div>
        </div>
        <div class="row bd-info">
            <div class="col-3 text-inf">Ngày sinh</div>
            <div class="col-9 text-tt">05/06/2001</div>
        </div>
        <div class="row bd-info">
            <div class="col-3 text-inf">Giới tính</div>
            <div class="col-9 text-tt">Nữ</div>
        </div>
        <div class="row bd-info">
            <div class="col-3 text-inf">Khoa</div>
            <div class="col-9 text-tt">Công nghệ thông tin</div>
        </div>
        <div class="row bd-info">
            <div class="col-3 text-inf">Trình độ</div>
            <div class="col-9 text-tt">Đại học</div>
        </div>
        <div class="row bd-info">
            <div class="col-3 text-inf">Địa chỉ</div>
            <div class="col-9 text-tt">Xã Tân An Hội, Huyện Mang Thít, tỉnh Vĩnh Long</div>
        </div>
        <div class="row bd-info">
            <div class="col-3 text-inf">Liên hệ</div>
            <div class="col-9 text-tt">0364595601</div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-12 text-center">
                <a href="{{ route ('manage.edit_user') }}">
                    <button type="button" class="btn btn-warning" style="color: white">
                        Cập nhật thông tin</button>
                </a>                                
            </div>
        </div>
    </div>
</div>

@endsection