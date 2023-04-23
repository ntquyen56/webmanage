@extends('layout.admin')
@section('child_page')
    <div class="main-acc">
        <div class="row">
            <div class="col-sm-12 text-center text-uppercase">
                <h5>biên bản họp <br>về việc thẩm định giáo trình</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">&#10046;&#10044;&#10046;</div>
        </div>
        <form action="{{route('manage.danhgianghiemthu_thuky')}}" method="post">
            <input type="hidden" name="id_giaotrinh" value="{{$dkbs->id}}">
            @csrf
            <div class="row mt-4">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Tên giáo trình:</div>
                <div class="col-sm-8 txt-acc">{{$dkbs->ten_gt}}</div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-5">Mã số học phần:</div>
                        <div class="col-sm-7 txt-acc">{{$dkbs->ma_gt ?? ""}}</div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-4 text-right">Số tín chỉ:</div>
                        <div class="col-sm-8 txt-acc">{{!empty($dkbs->hocphan) ? $dkbs->hocphan->tinchi :"khong co tin chi" }}</div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">Ban biên soạn giáo trình(ghi rõ chức danh/học hàm, học vị/họ và tên):</div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Chủ biên:</div>
                <div class="col-sm-8">{{$dkbs->users[count($dkbs->users) - 1]->name}}
                </div>
            </div>
            @foreach ($dkbs->users as $key=>$user)
            @if ($key != (count($dkbs->users) - 1))
                
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Thành viên:</div>
                <div class="col-sm-8">{{$user->name}}
                </div>
            </div>
            @endif
            @endforeach
            
            {{-- <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Thành viên:</div>
                <div class="col-sm-8">Nguyễn Bảo Anh
                </div>
            </div> --}}
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-3">Địa điểm thẩm định giáo trình:</div>
                <div class="col-sm-7">{{$dkbs->diadiem}}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Thời gian:</div>
                <div class="col-sm-8">Lúc: {{$dkbs->dateNT}}</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">1. Tuyên bố lý do:</div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Công bố Quyết định số  <span style="font-weight: bold">{{$dkbs->statusNT}}</span>
                   của Hiệu
                    trưởng Trường Đại học Cần Thơ về việc thành
                    lập Hội đồng thẩm định giáo trình. <a target="_blank" href="{{$dkbs->fileQD}}">Xem quyết định</a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    Danh sách Hội đồng gồm có {{count($dkbs->hdnts)}} thành viên:
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <table class="table table-bordered ">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" style="width: 6%;">STT</th>
                                <th scope="col" style="width: 40%;">Họ và tên </th>
                                <th scope="col">Đơn vị</th>
                                <th scope="col" style="width: 20%;">Trách nhiệm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dkbs->hdnts as $key=>$hdnt)
                                
                            <tr>
                                <th scope="row" class="text-center">{{$key+1}}</th>
                                <td>{{$hdnt->user->name}}</td>
                                <td>{{$hdnt->user->khoa->ten_khoa}}</td>
                                <td>
                                    @foreach ($hdnt->user->roles_user as $role)
                                        @if ($role->role_id == 4)
                                                {{$role->sub_role}}
                                        @endif
                                    @endforeach
                                </td>
                                {{-- <td class="text-center">{{$hdnt->user->roles_user->sub_role}}</td> --}}
                            </tr>
                            @endforeach
                         
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    Số thành viên có mặt: <input type="text" value="{{count($danhgia_nt) +1}}" style="width: 5%;"> ; &nbsp;
                    Vắng mặt: <input type="text" name="" value="{{count($dkbs->hdnts) - (count($danhgia_nt) +1)}}" id="" style="width: 5%;">
                </div>                
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">2. Nội dung:</div>
            </div>
            {{-- <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">2.1. Ban biên soạn trình bày nội dung giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <textarea name="muc2.1" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="col-sm-1"></div>
            </div> --}}
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">2.2. Nhận xét, đánh giá của các ủy viên phản biện, ủy viên Hội đồng thẩm định:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold"> - Nội dung giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    @foreach ($config as $item)
                    @if ($item->key == "NDGT")
                        
                    <label class="container">
                        {{$item->value}}
                        <input type="checkbox" disabled {{checkChecked($data_danhgia['nd_giaotrinh'],$item->value,count($dkbs->hdnts) -1) ? 'checked' :""}} name="NDGT[]" value="{{$item->value}}">
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
                            <textarea disabled name="muc2.2" id="" cols="30" rows="10">
                                @forEach($data_danhgia['nd_giaotrinh'] as $item) 
                                    @if(is_html($item))
                                        {{$item}}
                                    @endif
                                @endforeach
                            </textarea>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold"> - Kiến thức trong giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    @foreach ($config as $item)
                    @if ($item->key == "KTTGT")
                        
                    <label class="container">
                        {{$item->value}}
                        <input type="checkbox" disabled {{checkChecked($data_danhgia['kt_giaotrinh'],$item->value,count($dkbs->hdnts) -1) ? 'checked' :""}} name="KTTGT[]" value="{{$item->value}}">
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
                                <input disabled type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <textarea disabled name="muckienthuc" id="" cols="30" rows="10"> 
                                
                                    {{$danhgia_thuky->nd_giaotrinh}}
                            </textarea>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold"> - Nội dung được trích dẫn trong tài liệu tham khảo để biên soạn giáo trình:
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    @foreach ($config as $item)
                    @if ($item->key == "NDDTD")
                        
                    <label class="container">
                        {{$item->value}}
                        <input type="checkbox" disabled {{checkChecked($data_danhgia['ndtd_giaotrinh'],$item->value,count($dkbs->hdnts) -1) ? 'checked' :""}} name="NDDTD[]" value="{{$item->value}}">
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
                                <input disabled type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>  
                    <div class="row mt-3">
                        <div class="col-sm-10">
                            <textarea disabled name="mucnoidung" id="" cols="30" rows="10">

                                {{$danhgia_thuky->ndtd_giaotrinh}}

                            </textarea>
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
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <textarea disabled  name="muc4" id="" cols="30" rows="10">
                        {{$danhgia_thuky->ddcautruc_gt}}
                    </textarea>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">5. Đối tượng sử dụng</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
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
                    @foreach ($config as $item)
                    @if ($item->key == "DTDSD")
                        
                    <label class="container">{{$item->value}}
                        <input type="checkbox" disabled {{checkChecked($data_danhgia['dtsd'],$item->value,count($dkbs->hdnts) -1) ? 'checked' :""}} name="DTDSD[]" value="{{$item->value}}">
                        <span class="checkmark"></span>
                    </label>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">6. Đề nghị và kết luận:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Đạt - Xuất bản - Không chỉnh sửa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Đạt - Xuất bản - Có chỉnh sửa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Không đạt
                        </label>
                    </div> --}}

                    @foreach ($config as $key=>$item)
                    @if ($item->key == "DNVKL")
                        
                    <div class="form-check">
                        <input class="form-check-input" name="DNVKL" disabled {{checkChecked($data_danhgia['ketluan'],$item->value,count($dkbs->hdnts) -1,'kl') ? 'checked' :""}} value="{{$item->value}}" type="radio" name="flexRadioDefault" id="{{"flexRadioDefault2"}}">
                        <label class="form-check-label" >
                           {{$item->value}}
                        </label>
                    </div>
                    @endif
                    @endforeach
                    <div class="col-sm-10  text_editor">
                        <textarea disabled name="muc5" id="" cols="30" rows="10">
                            {{$danhgia_thuky->nd_ketluan}}

                            </textarea>
                    </div>
                </div>
                
            </div>
            {{-- <div class="row mt-5 mb-3" style="padding-left: 40%;padding-right: 40%;">
                <button type="submit" style="" class="btn btn-success">Gửi đánh giá</button>
            </div> --}}
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('muc2.1');
    </script>
    <script>
        CKEDITOR.replace('muc2.2');
    </script>
    <script>
        CKEDITOR.replace('muckienthuc');
    </script>
    <script>
        CKEDITOR.replace('muc4');
    </script>
     <script>
        CKEDITOR.replace('muc5');
    </script>
    <script>
        CKEDITOR.replace('mucnoidung');
    </script>

@endsection
