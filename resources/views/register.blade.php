@extends('welcome')
@section('child_page')
    <div class="main-publish">
        <form action="">
            <div class="row">
                <div class="col-sm-12 text-center text-uppercase">
                    <h5>Đăng ký biên soạn giáo trình năm 2023</h5>
                </div>
            </div>
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
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Tác giả</div>
                <div class="col-sm-7">
                    <textarea name="" id="" cols="40" class="btn-input" rows="5"></textarea>
                </div>
            </div>
            <button type="submit" class="btn-txt">Đăng ký</button>
            {{-- <button type="submit" class="btn btn-success text-center">Đăng ký</button> --}}

        </form>
    </div>
@endsection
