@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-12 text-center text-uppercase mb-5" style="font-size: 20px; font-weight: 800;">
            <h4>Cập nhật thông tin người dùng</h4>
        </div>

    </div>

    <form action=" {{ route('manage.handle_edit_user',$user->id)}}" method="post">
        @csrf


        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        {{-- <div class="row">
                            <div class="col-sm-4 text-right txt-edit">Mã giảng viên</div>
                            <div class="col-sm-8"><input type="text" value="{{ $edit->magv }}" name="magv" id="" style="width: 30%; height: 100%; border: grey solid 2px;"></div>

                        </div> --}}
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Tên giảng viên</div>
                            <div class="col-sm-8"><input type="text" value="{{ $user->name }}" name="tengv" id="" style="height: 125%; border: grey solid 2px;"></div>

                        </div>
                        {{-- <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Email</div>
                            <div class="col-sm-8"><input type="email" name="tengv" id="" style="width: 75%; height: 125%; border: grey solid 2px;"></div>
                        </div> --}}
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Địa chỉ liên hệ</div>
                            <div class="col-sm-8">

                                <textarea name="diachi" id=""  rows="2" cols="30" style="height: 125%; border: grey solid 2px;">{{ $user->diachi }}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 text-right txt-edit">Ngày sinh</div>

                            <div class="col-sm-8"><input type="date" value={{ $user->ngaysinh }} name="ngaysinh" id="" style="height: 125%; border: grey solid 2px;"></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Giới tính</div>
                            <div class="col-sm-8">
                                <select name="gioitinh" id="" class="text-center" style="height: 125%; border: grey solid 2px;">
                                    <option value="0">----Chọn----</option>

                                    <option {{$user->gioitinh == 1 ?"selected" : ""}} value="1">Nam</option>
                                    <option  {{$user->gioitinh == 2 ?"selected" : ""}} value="2">Nữ</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Khoa</div>
                            <div class="col-sm-8">
                                <select name="khoa" id="" value="{{ $edit->id_khoa }}" style="height: 125%; border: grey solid 2px;">
                                    <option value="0">-------Chọn khoa giảng dạy-------</option>
                                    @if ($allKhoa->count() > 0)
                                        @foreach ($allKhoa as $khoa)
                                            <option
                                                {{ !empty($user->khoa) && $user->khoa->id_khoa == $khoa->id_khoa ? 'selected' : '' }}
                                                value={{ $khoa->id_khoa }}>{{ $khoa->ten_khoa }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Trình độ</div>
                            <div class="col-sm-8">
                                <select name="trinhdo" id="" class="text-center"
                                    style="height: 125%; border: grey solid 2px;">
                                    <option value="0">----Chọn----</option>
                                    @if ($allTrinhDo->count() > 0)
                                        @foreach ($allTrinhDo as $trinhdo)
                                            <option
                                                {{ !empty($user->trinhdo) && $user->trinhdo->id_trinhdo == $trinhdo->id_trinhdo ? 'selected' : '' }}
                                                value={{ $trinhdo->id_trinhdo }}>{{ $trinhdo->ten_trinhdo }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Liên hệ</div>

                            <div class="col-sm-8"><input type="text" name="lienhe" id="" value="{{ $user->lienhe }}" style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5" style="margin-left: 45%;">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </div>

            <div class="col-sm-1"></div>
        </div>
    </form>
@endsection
