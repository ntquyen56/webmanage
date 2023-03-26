@extends('layout.admin')

@section('child_page')
    <div class="group-main-pro">
        <div class="row ">
            <div class="col-sm-12 mt-3 text-center text-uppercase">
                <h4>Thêm giáo trình biên soạn</h4>
<<<<<<< HEAD
            </div>
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form action="{{route('manage.handle_add_curriculum')}}" method="POST" >
                @csrf
=======
            </div>            
        </div>
        <div class="row mt-3 mb-3" style="margin: 4% 5% 2% 5%;">
            <form action="">
>>>>>>> 21989622e1bdcfff282ed50ed2aa73c125c8d89e
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Mã giáo trình</div>
                    <div class="col-sm-5"><input type="text" name="magt" id="" style="width: 70%;" class="input-pr"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 txt-add">Tên giáo trình</div>
                    <div class="col-sm-5"><input type="text" name="tengt" id="" class="input-pr" style=""></div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4"></div>
<<<<<<< HEAD
                    <div class="col-sm-4"><button type="submit" class="btn btn-success" style="width: 100px; margin: 2% 50% 2% 50%;">Thêm</button></div>
                    <div class="col-sm-4"></div>
                </div>
=======
                    <div class="col-sm-4"><button type="button" class="btn btn-success" style="width: 100px; margin: 2% 50% 2% 50%;">Thêm</button></div>
                    <div class="col-sm-4"></div>                    
                </div>                
>>>>>>> 21989622e1bdcfff282ed50ed2aa73c125c8d89e
            </form>
        </div>
    </div>
@endsection
