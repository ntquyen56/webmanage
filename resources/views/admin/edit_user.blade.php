@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-12 text-center text-uppercase mb-5" style="font-size: 20px; font-weight: 800;">
            <h4>Cập nhật thông tin người dùng</h4>
        </div>
        
    </div>
    <form action="post" {{ URL::to('update_user/'.$edit->id)}}>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 text-right txt-edit">Mã giảng viên</div>
                            <div class="col-sm-8"><input type="text" value="{{ $edit->magv }}" name="magv" id="" style="width: 30%; height: 100%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Tên giảng viên</div>
                            <div class="col-sm-8"><input type="text" value="{{ $edit->name }}" name="tengv" id="" style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Email</div>
                            <div class="col-sm-8"><input type="email" name="tengv" id="" style="width: 75%; height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Địa chỉ liên hệ</div>
                            <div class="col-sm-8">
                                <textarea name="diachi" id="" value="{{ $edit->diachi }}" rows="2" cols="30" style="height: 125%; border: grey solid 2px;"></textarea>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 text-right txt-edit">Ngày sinh</div>
                            <div class="col-sm-8"><input type="date" value="{{ $edit->ngaysinh }}" name="ngaysinh" id="" style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">                            
                            <div class="col-sm-4 text-right txt-edit">Giới tính</div>
                            <div class="col-sm-8">
                                <select name="gioitinh" id="" class="text-center" style="height: 125%; border: grey solid 2px;">
                                    <option value="0">----Chọn----</option>
                                    <option {{$edit->gioitinh == 1 ?"selected" : ""}} value="1">Nam</option>
                                    <option  {{$edit->gioitinh == 2 ?"selected" : ""}} value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Khoa</div>
                            <div class="col-sm-8">
                                <select name="khoa" id="" value="{{ $edit->id_khoa }}" style="height: 125%; border: grey solid 2px;">
                                    <option value="0">-------Chọn khoa giảng dạy-------</option>
                                    <option value="1">Công nghệ thông tin</option>
                                    <option value="2">Truyền thông đa phương tiện</option>
                                    <option value="3">Khoa học máy tính</option>
                                    <option value="4">Công nghệ phần mềm</option>
                                    <option value="5">Hệ thống thông tin</option>
                                    <option value="6">Mạng máy tính và Truyền thông</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Trình độ</div>
                            <div class="col-sm-8">
                                <select name="trinhdo" id="" class="text-center" style="height: 125%; border: grey solid 2px;">
                                    <option value="0">----Chọn----</option>
                                    <option value="1">Đại học</option>
                                    <option value="2">Cao học</option>
                                    <option value="3">Thạc sĩ</option>
                                    <option value="4">Tiến sĩ</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right txt-edit">Liên hệ</div>
                            <div class="col-sm-8"><input type="text" name="lienhe" id="" value="{{ $edit->lienhe }}" style="height: 125%; border: grey solid 2px;"></div>
                        </div>     
                    </div>
                </div>               
                <div class="row mt-5" style="margin-left: 45%;">
                    <button type="button" class="btn btn-success">Cập nhật</button>
                </div>           
            </div>            
            <div class="col-sm-1"></div>
        </div>
    </form>
@endsection
