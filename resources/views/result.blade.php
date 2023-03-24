@extends('welcome')
@section('child_page')

<div class="main-result">
    <div class="row" style="border-bottom: black dashed 2px; margin: 0px 2px;">
        <div class="col-sm-12 text-center text-uppercase mt-3 mb-3">
            <h5>Kết quả biên soạn</h5>
        </div>
    </div>
    <div class="row" style="margin: 2% 10% 2% 15%;">
        <div class="col-sm-12">
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Mã giáo trình</div>
                <div class="col-sm-8 txt-nd">CT111</div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Tên giáo trình</div>
                <div class="col-sm-8 txt-nd">Lập trình hướng đối tượng</div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Điểm</div>
                <div class="col-sm-8 txt-nd">9.0</div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Đánh giá</div>
                <div class="col-sm-8 txt-nd">
                    - Đầy đủ kiến thức cho sinh viên <br>
                    - Kiến thức phù hợp với doanh nghiệp <br>
                    - Có sáng tạo
                </div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Kết quả</div>
                <div class="col-sm-8 txt-nd">Xuất bản</div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Quyết định</div>
                <div class="col-sm-8 txt-nd">File Word</div>
            </div>
            <div class="row">
                <div class="col-sm-4 txt-dm">Ngày xuất bản</div>
                <div class="col-sm-8 txt-nd">05/06/2023</div>
            </div>
        </div>
    </div>
</div>

@endsection