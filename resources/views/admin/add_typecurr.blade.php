@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row">
            <div class="col-sm-2 mt-3 text-center">
                <a href="{{ route ('manage.type_curr') }}"><i class="fa-solid fa-list" style="font-size: 25px; color: black;"></i></a>
            </div>
            <div class="col-sm-10 mt-3 text-uppercase">
                <h4>Thêm loại</h4>
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="{{ URL::to('add_typecurr')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3 txt-add">Mã loại</div>
                    <div class="col-sm-7"><input type="text" name="ma_loai" id="" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3 txt-add">Tên loại</div>
                    <div class="col-sm-7"><input type="text" name="ten_loai" id="" class="input-pr" style=""></div>
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-success">Thêm loại</button>     
                </div>                
            </form>
        </div>
    </div>
@endsection
