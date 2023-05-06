@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row">
            <div class="col-sm-12 mt-3 text-center text-uppercase">
                <h4>Cập nhật địa điểm</h4>
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="{{ URL::to('update_location/'.$edit->id_dd)}}">
                @csrf
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Phòng</div>
                    <div class="col-sm-5"><input required type="text" name="phong" id="" value="{{ $edit->phong }}" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Khu vực</div>
                    <div class="col-sm-5"><input required type="text" name="khuvuc" id="" value="{{ $edit->khuvuc }}" class="input-pr" style=""></div>
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-success" style="margin-left: 69%; ">Cập nhật địa điểm</button>     
                </div>                
            </form>
        </div>
    </div>
@endsection
