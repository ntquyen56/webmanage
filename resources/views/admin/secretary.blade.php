@extends('layout.admin')
@section('child_page')
    <div class="main-secr">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h5>BIÊN BẢN NGHIỆM THU GIÁO TRÌNH</h5>
            </div>
        </div>
        <form action="" method="post">
            <div class="row mt-5">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Tên giáo trình:</div>
                <div class="col-sm-8 txt-acc">Lập trình A</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Mã giáo trình:</div>
                <div class="col-sm-8 txt-acc">CT111</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Loại giáo trình:</div>
                <div class="col-sm-8 txt-acc">Giáo trình</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Tác giả:</div>
                <div class="col-sm-8 txt-acc">
                    GV111 - Nguyễn Văn A<br>
                    GV222 - Nguyễn Văn B<br>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Đánh giá:</div>
                <div class="col-sm-8 txt-acc">
                    <textarea name="" id="" cols="40" rows="5"></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Điểm:</div>
                <div class="col-sm-8">
                    <input type="text" style="width: 10%;">
                </div>
            </div>
            <div class="row mt-5" style="margin-left: 50%;">
                <button type="submit" class="btn btn-success">Gửi</button>
            </div>
        </form>
    </div>
@endsection
