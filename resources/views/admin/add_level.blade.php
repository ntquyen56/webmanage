@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row">
            <div class="col-sm-2 mt-3 text-center">
                <a href="{{ route ('manage.level_list') }}"><i class="fa-solid fa-list" style="font-size: 25px; color: black;"></i></a>
            </div>
            <div class="col-sm-10 mt-3 text-center text-uppercase">
                <h4>Thêm trình độ</h4>
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="{{ URL::to('add_level')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 txt-add">Mã trình độ</div>
                    <div class="col-sm-7"><input required type="text" name="ma_trinhdo" id="" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 txt-add">Tên trình độ</div>
                    <div class="col-sm-7"><input required type="text" name="ten_trinhdo" id="" class="input-pr" style="width: 100%;"></div>
                </div>
                <div class="row mt-4">
                    <button type="submit" class="btn btn-success" style="margin-left: 0%; ">Thêm trình độ</button>                 
                </div>                
            </form>
        </div>
    </div>
@endsection
