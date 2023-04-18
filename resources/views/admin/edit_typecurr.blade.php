@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row">
            <div class="col-sm-12 mt-3 text-center text-uppercase">
                <h4>Cập nhật loại</h4>
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="{{ URL::to('update_typecurr/'.$edit->id_loai)}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Mã loại</div>
                    <div class="col-sm-5"><input required type="text" name="ma_loai" id="" value="{{ $edit->ma_loai }}" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Tên loại</div>
                    <div class="col-sm-5"><input required type="text" name="ten_loai" id="" value="{{ $edit->ten_loai }}" class="input-pr" style=""></div>
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-success" style="">Cập nhật lọai</button>     
                </div>                
            </form>
        </div>
    </div>
@endsection
