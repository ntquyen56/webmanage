@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="text-center text-uppercase fw-bold mb-5">Cập nhật thông tin</h4>
        </div>
    </div>
    <form action="">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 text-right">Mã giảng viên</div>
                            <div class="col-sm-8"><input type="text" name="magv" id="" style="width: 30%; height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Tên giảng viên</div>
                            <div class="col-sm-8"><input type="text" name="tengv" id="" style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Email</div>
                            <div class="col-sm-8"><input type="email" name="tengv" id="" style="width: 75%; height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Địa chỉ</div>
                            <div class="col-sm-8">
                                <textarea name="diachi" id="" rows="2" cols="30" style="height: 125%; border: grey solid 2px;"></textarea>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 text-right">Ngày sinh</div>
                            <div class="col-sm-8"><input type="date" name="ngaysinh" id="" style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">                            
                            <div class="col-sm-4 text-right">Giới tính</div>
                            <div class="col-sm-8">
                                <select name="gioitinh" id="" class="text-center" style="height: 125%; border: grey solid 2px;">
                                    <option value="0">----Chọn----</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Khoa</div>
                            <div class="col-sm-8">
                                <select name="khoa" id="" style="height: 125%; border: grey solid 2px;">
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
                            <div class="col-sm-4 text-right">Trình độ</div>
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
                            <div class="col-sm-4 text-right">Liên hệ</div>
                            <div class="col-sm-8"><input type="text" name="lienhe" id="" style="height: 125%; border: grey solid 2px;"></div>
                        </div>     
                    </div>
                </div>               
                <div class="row" style="margin: 5% 45%;">
                    <button type="button" class="btn btn-success">Cập nhật</button>
                </div>           
            </div>            
            <div class="col-sm-1"></div>
        </div>
    </form>
@endsection
