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
            @if(!empty(session('msg')))
                <div class="alert alert-danger">{{session('msg')}}</div>
            @endif
            @if(!empty(session('success')))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Mã học phần</div>
                <div class="col-sm-7">
                    <select name="ma_hp" id="" class="btn-input">
                        <option value="0">--Chọn mã--</option>
                        @if ($allHocPhan->count() > 0)
                            @foreach ($allHocPhan as $hocphan)
                                <option
                                    value={{ $hocphan->ma_hp }}>{{ $hocphan->ma_hp }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-end btn-text">Tên giáo trình</div>
                <div class="col-sm-7"><input type="text" name="tengt" class="btn-input" style="width: 60%;" id=""></div>
            </div>
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
            <div class="row mt-3">
                <div class="col-sm-4 text-end btn-text">Khoa</div>
                <div class="col-sm-8">
                    <select name="khoa" class="btn-input" id="" style=" border: grey solid 2px;">
                        <option value="0">-------Chọn khoa giảng dạy-------</option>
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
                <div class="col-sm-4 text-end btn-text">Mã giảng viên</div>
                <div class="col-sm-7">
                    <select  name="tacgia[]"  multiple="multiple" id="" class=" tag_select2_choose" style="width: 30%;">
                        @if ($allGiangVien->count() > 0)
                            @foreach ($allGiangVien as $gv)
                                <option
                                    value={{ $gv->magv }}>{{ $gv->magv }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <button type="submit" class="btn-txt">Đăng ký</button>
            {{-- <button type="submit" class="btn btn-success text-center">Đăng ký</button> --}}

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
    </script>
  {{-- <script src="https://cdn.tiny.cloud/1/1dnd16pp1u3k2hu5r68h113r39yu55bku2pc760cem97t0t3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    var editor_config = {
      path_absolute : "/",
      selector: 'textarea.my-editor',
      relative_urls: false,
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      file_picker_callback : function(callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.openUrl({
          url : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no",
          onMessage: (api, message) => {
            callback(message.content);
          }
        });
      }
    };

    tinymce.init(editor_config);
  </script> --}}
@endsection
