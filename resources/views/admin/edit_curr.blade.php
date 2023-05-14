@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row mb-3">
            <div class="col-sm-2 mt-3 text-center">
                <a href="{{ route ('manage.registration_list') }}"><i class="fa-solid fa-list" style="font-size: 30px; color: black;"></i></a>
            </div>
            <div class="col-sm-9  text-uppercase mt-3">
                <h3 style="font-weight: 700">Thêm giáo trình</h3>
            </div>
        </div>
        @if(session('msg'))
            <div class="alert alert-danger">{{session('msg')}}</div>
        @endif
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form action="{{route('manage.handleEditCur')}}" method="POST" >
                @csrf
                <input type="hidden" name="id_curr" value="{{$curr->id}}">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Mã giáo trình</div>
                    <div class="col-sm-5"><input required value="{{$curr->ma_gt}}" type="text" name="magt" id="" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Tên giáo trình</div>
                    <div class="col-sm-5"><input required value="{{$curr->ten_gt}}" type="text" name="tengt" id="" class="input-pr" style=""></div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"><button type="submit" class="btn btn-success" style="width: 100px; margin: 2% 50% 2% 50%;">Cập nhật</button></div>
                    <div class="col-sm-4"></div>
                </div>
            </form>
        </div>
    </div>
@endsection
