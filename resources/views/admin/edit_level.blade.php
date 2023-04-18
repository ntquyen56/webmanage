@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row">
            <div class="col-sm-12 mt-3 text-center text-uppercase">
                <h4>Cập nhật trình độ</h4>
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="{{ URL::to('update_level/'.$edit->id_trinhdo)}}">
                @csrf
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Mã trình độ</div>
                    <div class="col-sm-5"><input required type="text" name="ma_trinhdo" id="" value="{{ $edit->ma_trinhdo }}" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Tên trình độ</div>
                    <div class="col-sm-5"><input required type="text" name="ten_trinhdo" id="" value="{{ $edit->ten_trinhdo }}" class="input-pr" style=""></div>
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-success" style="margin-left: 69%; ">Cập nhật trình độ</button>     
                </div>                
            </form>
        </div>
    </div>
@endsection
