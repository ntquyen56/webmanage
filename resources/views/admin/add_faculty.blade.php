@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row">
            <div class="col-sm-2 mt-3 text-center">
                <a href="{{ route ('manage.faculty_list') }}"><i class="fa-solid fa-list" style="font-size: 25px; color: black;"></i></a>
            </div>
            <div class="col-sm-10 mt-3 text-uppercase">
                <h4>Thêm khoa</h4>
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form method="post" action="{{ URL::to('add_faculty')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Mã khoa</div>
                    <div class="col-sm-5"><input type="text" name="ma_khoa" id="" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Tên khoa</div>
                    <div class="col-sm-5"><input type="text" name="ten_khoa" id="" class="input-pr" style=""></div>
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-success" style="margin-left: 55%; ">Thêm khoa</button>     
                </div>                
            </form>
        </div>
    </div>
@endsection
