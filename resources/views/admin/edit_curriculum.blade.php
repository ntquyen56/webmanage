@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row">
            <div class="col-sm-12 mt-3 text-center text-uppercase">
                <h4>Cập nhật giáo trình biên soạn</h4>
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="">
                @csrf
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Mã giáo trình</div>
                    <div class="col-sm-5"><input required type="text" name="magt" id="" value="" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Tên giáo trình</div>
                    <div class="col-sm-5"><input required type="text" name="ten_gt" id="" value="" class="input-pr" style=""></div>
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-success">Cập nhật giáo trình</button>     
                </div>                
            </form>
        </div>
    </div>
@endsection
