@extends('welcome')

@section('child_page')
    <div class="group-main-pro">
        <div class="row mt-3 text-center text-uppercase">
            <h4>Đề xuất biên soạn giáo trình năm 2023</h4>
        </div>
        <div class="row mt-3 mb-3">
            <form action="">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 text-end fs-5" style="font-weight: 500;">Mã giáo trình</div>
                    <div class="col-sm-6"><input type="text" name="magt" id="" style="width: 20%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 text-end fs-5" style="font-weight: 500;">Tên giáo trình</div>
                    <div class="col-sm-6"><input type="text" name="tengt" id="" class="input-pr" style="width: 50%;"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 text-center"><button type="button" class="btn btn-success" style="width: 100px;">Đề xuất</button></div>
                    <div class="col-sm-4"></div>                    
                </div>                
            </form>
        </div>
    </div>
@endsection
