@extends('layout.admin')
@section('child_page')
    <div class="main-acc">
        <div class="row">
            <div class="col-sm-12 text-center text-uppercase">
                <h5>Nhận xét, đánh giá của ủy viên phản biện <br>bản thảo giáo trình</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">&#10046;&#10044;&#10046;</div>
        </div>
        <form action="" method="post">
            <div class="row mt-4">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Ủy viên phản biện:</div>
                <div class="col-sm-8 txt-acc">{{Auth::user()->name}}</div>
            </div>
            {{-- <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Chuyên ngành:</div>
                <div class="col-sm-8 txt-acc">{{Auth::user()->khoa->ten_khoa}}</div>
            </div> --}}
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Đơn vị công tác:</div>
                <div class="col-sm-8 txt-acc">{{Auth::user()->khoa->ten_khoa}}</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <h6>Nhận xét giáo trình:</h6>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-4">Tên giáo trình:</div>
                        <div class="col-sm-8 txt-acc">{{$dkbs->ten_gt}}</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-4 text-right">Mã HP:</div>
                        <div class="col-sm-8 txt-acc">{{$dkbs->ma_gt ?? ""}}</div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">1. Nội dung giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    @foreach ($config as $item)
                    @if ($item->key == "NDGT")
                        
                    <label class="container">
                        {{$item->value}}
                        <input type="checkbox" checked="checked" name="NDGT">
                        <span class="checkmark"></span>
                    </label>
                    @endif
                    @endforeach
                    {{-- <label class="container">Phù hợp với mục tiêu, nội dung CTĐT
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Đảm bảo chuẩn kiến thức, kỹ năng
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Đáp ứng chuẩn đầu ra của học phần
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label> --}}
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="container">Khác:
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <textarea name="muc1" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">2. Kiến thức trong giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    @foreach ($config as $item)
                    @if ($item->key == "KTTGT")
                        
                    <label class="container">
                        {{$item->value}}
                        <input type="checkbox" checked="checked" name="KTTGT">
                        <span class="checkmark"></span>
                    </label>
                    @endif
                    @endforeach
                    {{-- <label class="container">Trình bày khoa học, logic, cân đối giữa lý thuyết và thực hành
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Phù hợp với thực tiễn và cập nhật những tri thức mới được kiểm chứng và công
                        nhận
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label> --}}
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="container">Khác:
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <textarea name="muc2" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">3. Nội dung được trích dẫn trong tài liệu tham khảo để biên soạn giáo trình:
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    @foreach ($config as $item)
                    @if ($item->key == "NDDTD")
                        
                    <label class="container">
                        {{$item->value}}
                        <input type="checkbox" checked="checked" name="NDDTD">
                        <span class="checkmark"></span>
                    </label>
                    @endif
                    @endforeach
                    {{-- <label class="container">Có nguồn gốc, chú thích rõ ràng, tuân thủ các quy định của pháp luật
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Nội dung trích dẫn phù hợp, đáp ứng mục tiêu của giáo trình
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label> --}}
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="container">Khác:
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <textarea name="muc3" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">4. Định dạng, cấu trúc và hình thức trình bày của giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-10">
                            <textarea name="muc4" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">5. Đối tượng sử dụng</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">

                    @foreach ($config as $item)
                    @if ($item->key == "DTDSD")
                        
                    <label class="container">{{$item->value}}
                        <input type="checkbox" checked="checked" name="DTDSD">
                        <span class="checkmark"></span>
                    </label>
                    @endif
                    @endforeach
                    {{-- <label class="container">Đào tạo đại học
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Thạc sĩ
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Tiến sĩ
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label> --}}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">6. Đề nghị và kết luận:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Đạt - Xuất bản - Không chỉnh sửa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label " for="flexRadioDefault2">
                            Đạt - Xuất bản - Có chỉnh sửa
                        </label>
                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            Không đạt
                        </label>
                    </div>
                    <div class="col-sm-10 invisible text_editor">
                        <textarea name="muc5" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-3" style="padding-left: 40%;padding-right: 40%;">
                <button type="submit" style="" class="btn btn-success">Gửi đánh giá</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('muc1');
    </script>
    <script>
        CKEDITOR.replace('muc2');
    </script>
    <script>
        CKEDITOR.replace('muc3');
    </script>
    <script>
        CKEDITOR.replace('muc4');
    </script>
      <script>
        CKEDITOR.replace('muc5');

        const text_editor = document.querySelector('.text_editor');
        const flexRadioDefault2 = document.querySelector('#flexRadioDefault2');

        flexRadioDefault2.addEventListener('change', function(e){
            if(this.checked){
                console.log('cheked');
                text_editor.classList.remove('invisible')
            }else{  
                console.log('abc');
                text_editor.classList.add('invisible')

            }
        })
        const flexRadioDefault1 = document.querySelector('#flexRadioDefault1');

        flexRadioDefault1.addEventListener('change', function(e){
            if(this.checked){
                console.log('cheked');
                text_editor.classList.add('invisible')
            }else{  
                console.log('abc');
                text_editor.classList.remove('invisible')

            }
        })
        const flexRadioDefault3 = document.querySelector('#flexRadioDefault3');

        flexRadioDefault3.addEventListener('change', function(e){
            if(this.checked){
                console.log('cheked');
                text_editor.classList.add('invisible')
            }else{  
                console.log('abc');
                text_editor.classList.remove('invisible')

            }
        })
    </script>
    
@endsection

