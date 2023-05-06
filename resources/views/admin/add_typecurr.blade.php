@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro mt-5">
        <div class="row mb-3">
            <div class="col-sm-2 mt-3 text-center">
                <a href="{{ route ('manage.type_curr') }}"><i class="fa-solid fa-list" style="font-size: 30px; color: black;"></i></a>
            </div>
            <div class="col-sm-9  text-uppercase mt-3">
                <h3 style="font-weight: 700">Thêm loại giáo trình</h3>
            </div>
        </div>
        @if(session('msg'))
            <div class="alert alert-danger">{{session('msg')}}</div>
        @endif
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="{{ URL::to('add_typecurr')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3 txt-add">Mã loại</div>
                    <div class="col-sm-7"><input required type="text" name="ma_loai" id="" style="width: 30%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3 txt-add">Tên loại</div>
                    <div class="col-sm-7"><input required type="text" name="ten_loai" id="" class="input-pr" style=""></div>
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-success">Thêm loại</button>     
                </div>                
            </form>
        </div>
    </div>
@endsection
