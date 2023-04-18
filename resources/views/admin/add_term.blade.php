@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row">
            <div class="col-sm-2 mt-3 text-center">
                <a href="{{ route ('manage.term') }}"><i class="fa-solid fa-list" style="font-size: 25px; color: black;"></i></a>
            </div>
            <div class="col-sm-10 mt-3 text-uppercase">
                <h4>Thêm học phần</h4>
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="{{ URL::to('add_term')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 txt-add">Mã học phần</div>
                    <div class="col-sm-7"><input required type="text" name="ma_hp" id="" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 txt-add">Tên học phần</div>
                    <div class="col-sm-7"><input required type="text" name="ten_hp" id="" class="input-pr" style=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 txt-add">Số tín chỉ</div>
                    <div class="col-sm-7"><input required type="number" min=1 max=20 name="tinchi" id="" class="input-pr" style="width: 30%;"></div>
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-success">Thêm học phần</button>     
                </div>                
            </form>
        </div>
    </div>
@endsection
