@extends('welcome')
@section('child_page')
    <div class="group-main">
        <div class="row">
            <div class="col-6">
                <div class="border border-secondary group">
                    <div class="row justify-content-between border-bt">
                        <h6 class="text-uppercase text-center mt-2">thông tin giảng viên</h6>
                    </div>
                    <div class="col-12">
                        <div class="row border-bt" style="margin-top: -5px;">
                            <div class="col-3 text-inf ">Mã GV</div>
                            <div class="col-9 text-tt">GV12345</div>
                        </div>
                        <div class="row border-bt">
                            <div class="col-3 text-inf">Họ tên GV</div>
                            <div class="col-9 text-tt">Nguyễn Thanh Quyên</div>
                        </div>
                        <div class="row border-bt">
                            <div class="col-3 text-inf">Ngày sinh</div>
                            <div class="col-9 text-tt">05/06/2001</div>
                        </div>
                        <div class="row border-bt">
                            <div class="col-3 text-inf">Giới tính</div>
                            <div class="col-9 text-tt">Nữ</div>
                        </div>
                        <div class="row border-bt">
                            <div class="col-3 text-inf">Khoa</div>
                            <div class="col-9 text-tt">Công nghệ thông tin</div>
                        </div>
                        <div class="row border-bt">
                            <div class="col-3 text-inf">Trình độ</div>
                            <div class="col-9 text-tt">Đại học</div>
                        </div>
                        <div class="row border-bt">
                            <div class="col-3 text-inf">Địa chỉ</div>
                            <div class="col-9 text-tt">Xã Tân An Hội, Huyện Mang Thít, tỉnh Vĩnh Long</div>
                        </div>
                        <div class="row border-bt">
                            <div class="col-3 text-inf">Liên hệ</div>
                            <div class="col-9 text-tt">0364595601</div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-12 text-center">
                                <a href="{{ route ('client.update_info') }}">
                                    <button type="button" class="btn btn-warning" style="color: white">
                                        Cập nhật thông tin</button>
                                </a>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="border border-secondary group">
                    <div class="row" style="margin: 6px 6px;">
                        <div class="col-4 mt-2">
                            <div class="gr-icon text-center">
                                <a href="{{ route ('client.result') }}" style="text-decoration: none;">
                                    <i class="fa-solid fa-book-open" style="color: #54B435; font-size: 45px;"></i>
                                    <p class="text-hright">Kết quả biên soạn</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <div class="gr-icon text-center">
                                <a href="{{ route ('client.calendar') }}" style="text-decoration: none;">
                                    <i class="fa-regular fa-calendar-days"style="color: #5DA7DB; font-size: 45px;"></i>
                                    <p class="text-hright">Lịch nghiệm thu</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <div class="gr-icon text-center">
                                <a href="{{ route ('client.publish') }}" style="text-decoration: none;">
                                    <i class="fa-solid fa-print" style="color: grey; font-size: 45px;"></i>
                                    <p class="text-hright">Xuất bản</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border border-secondary group">
                    <div class="row border-bt">
                        <h6 class="text-uppercase text-center mt-2">đăng kí biên soạn</h6>
                    </div>
                    <div class="row" style="margin: 6px 6px;">
                        <table class="table">
                            <thead>
                                <th>Mã giáo trình</th>
                                <th>Tên giáo trình</th>                                
                                <th>Trạng thái</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">CT111</td>
                                    <td>Cấu trúc dữ liệu</td>
                                    {{-- <td class="text-center">
                                        <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"></i></a>
                                    </td> --}}
                                    <td class="text-center">
                                        <a href="#"><i class="fa-sharp fa-solid fa-check-double"
                                                style="color: green;"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">CT222</td>
                                    <td>Lập trình hướng đối tượng</td>
                                    {{-- <td class="text-center">
                                        <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"></i></a>
                                    </td> --}}
                                    <td class="text-center">
                                        <a href="#"><i class="fa-sharp fa-solid fa-check-double"
                                                style="color: green;"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">CT333</td>
                                    <td>Quản lý dự án phần mềm</td>
                                    {{-- <td class="text-center">
                                        <a href="#"><i class="fa-sharp fa-regular fa-pen-to-square"></i></a>
                                    </td> --}}
                                    <td class="text-center">
                                        <a href="#"><i class="fa-sharp fa-solid fa-check-double"
                                                style="color: green;"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-5 text-start mb-3">
                            <a href="{{ route('client.curriculum') }}">
                                <button type="button" class="btn btn-light btn-sm btn-bs" style="color: black;">
                                    Xem thêm</button>
                            </a>
                        </div>
                        <div class="col-5 text-end mb-3">
                            <a href="{{ route('client.propose') }}">
                                <button type="button" class="btn btn-success btn-sm btn-bs">
                                    Đề xuất biên soạn</button>
                            </a>
                        </div>
                        <div class="col-1"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
