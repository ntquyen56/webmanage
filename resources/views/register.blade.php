@extends('welcome')


@section('css')
<link href="{{asset('admins/vendor/select2')}}/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection__choice{background-color: #000 !important; color: #fff !important}
</style>
@endsection
@section('child_page')
    <div class="main-publish">
        <form action="{{route('currClient.handle_register_curr')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 text-center text-uppercase">
                    <h5>Đăng ký biên soạn giáo trình năm 2023</h5>
                </div>
            </div>
            @if(\Carbon\Carbon::now()->lt($allGiaoTrinh[0]->dateStart)  || \Carbon\Carbon::now()->gt($allGiaoTrinh[0]->dateEnd))
                    <tr>

                        <td colspan="4">

                            <p style="font-size: 20px; color: red; font-weight: 600;">Chưa đến thời gian đăng kí biên soạn!</p>
                        </td>
                    </tr>
            @else
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Loại giáo trình</div>
                <div class="col-sm-7">
                    <select name="loaigt" class="btn-input" id="">
                        <option value="0">----Chọn loại----</option>
                        @if ($allLoai->count() > 0)
                        @foreach ($allLoai as $loai)
                            <option
                                value={{ $loai->ma_loai }}>{{ $loai->ten_loai }}</option>
                        @endforeach
                    @endif
                    </select>
                </div>
            </div>
            @if(!empty(session('msg')))
                <div class="alert alert-danger">{{session('msg')}}</div>
            @endif
            @if(!empty(session('success')))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="row mt-4 chonhp">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Chọn học phần</div>
                <div class="col-sm-7">
                    <select name="ma_hp" id="" class="btn-input" style="width: 60%;">
                        <option value="0">------Chọn học phần biên soạn------</option>
                        @if ($allHocPhan->count() > 0)
                            @foreach ($allHocPhan as $hocphan)
                                <option
                                    value={{ $hocphan->ma_hp }}>{{ $hocphan->ma_hp }} - {{ $hocphan->ten_hp }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="row mt-4 tentl " >
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Tên tài liệu</div>
                <div class="col-sm-7"><input type="text" name="tengt" class="btn-input" style="width: 60%;" id=""></div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Đơn vị</div>
                <div class="col-sm-7">
                    <select name="khoa" class="btn-input" id="" style=" border: grey solid 2px;width: 60%;">
                        <option value="0">-------Chọn đơn vị-------</option>
                        @if ($allKhoa->count() > 0)
                            @foreach ($allKhoa as $khoa)
                                <option
                                    value={{ $khoa->id_khoa }}>{{ $khoa->ten_khoa }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            {{-- <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Tác giả</div>
                <div class="col-sm-7">
                    <select name="tacgia" id="" class="btn-input" style="width: 50%;">
                        <option value="0">--------Chọn giảng viên--------</option>
                        <option value="1">Nguyễn Văn A</option>
                    </select>
                </div>
            </div> --}}
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Thành viên</div>
                <div class="col-sm-7">
                    <select  name="tacgia[]"  multiple="multiple" id="" class="tag_select2_choose btn-tag">
                        @if ($allGiangVien->count() > 0)
                            @foreach ($allGiangVien as $gv)
                                <option
                                    value={{ $gv->magv }}>{{ $gv->magv}} - {{ $gv->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <button type="submit" class="btn-txt">Đăng ký</button>
            {{-- <button type="submit" class="btn btn-success text-center">Đăng ký</button> --}}
            @endif
        </form>
    </div>
@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="{{asset('admins/vendor/select2')}}/select2.min.js"></script>
   <script>
    $(function(){
        $(".tag_select2_choose").select2({
            tags: true,
            tokenSeparators: [',']
        });
        $(".selected2_init").select2({
            placeholder: "Select a state",
            allowClear: true
        });
    });

    const loaigt = document.querySelector('select[name="loaigt"');
    const tentl = document.querySelector('.tentl');
    const chonhp = document.querySelector('.chonhp');

    loaigt.addEventListener('change', function(){
        if(loaigt.value == 'GT'){
            tentl.classList.add('d-none')
        }else{
            tentl.classList.remove('d-none')

        }
        if(loaigt.value == 'TLTK'){
            chonhp.classList.add('d-none')
        }else{
            chonhp.classList.remove('d-none')

        }
    })
    </script>
 @endsection
