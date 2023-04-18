@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row">
            <div class="col-sm-12 mt-3 text-center text-uppercase">
                <h4>Cập nhật học phần</h4>
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="{{ URL::to('update_term/'.$edit->id_hp)}}">
                @csrf
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Mã học phần</div>
                    <div class="col-sm-5"><input required type="text" name="ma_hp" id="" value="{{ $edit->ma_hp }}" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Tên học phần</div>
                    <div class="col-sm-5"><input required type="text" name="ten_hp" id="" value="{{ $edit->ten_hp }}" class="input-pr" style=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Số tín chỉ</div>
                    <div class="col-sm-5"><input required type="number" min=1 max=20 name="tinchi" id="" class="input-pr" value="{{ $edit->ten_hp }}" style="width: 30%;"></div>
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-success">Cập nhật học phần</button>     
                </div>                
            </form>
        </div>
    </div>
@endsection
