@extends('welcome')
@section('child_page')

<div class="main-result">
    <div class="row" style="border-bottom: black dashed 2px; margin: 0px 2px;">
        <div class="col-sm-12 text-center text-uppercase mt-3 mb-3">
            <h5>Kết quả biên soạn</h5>
        </div>
    </div>
    <div class="row" style="margin: 2% 10% 2% 15%;">
        <table class="table table-bordered table-hover table-cell" style="">
            <thead>
                <tr class="txt-calendar text-center">
                    <th scope="col" class="txt-calendar">STT</th>
                    <th scope="col" style="width: 8%;">Mã giáo trình</th>
                    <th scope="col" class="txt-calendar">Tên giáo trình</th>
                    {{-- <th scope="col">Hội đồng</th> --}}
                    {{-- <th scope="col">Tác giả</th> --}}
                    <th scope="col">Ngày đăng kí</th>
                    <th scope="col">Ngày nghiệm thu</th>
                    <th scope="col">Bien ban</th>

                    {{-- <th scope="col" style="width: 10%;">Địa điểm</th> --}}
                </tr>
            </thead>
            <tbody class="txt-calendar">
                
                @foreach ($dkbsList as $item)

                <tr>
                    <th scope="row" class="text-center txt-calendar">1</th>
                    <td class="text-center">{{$item->ma_gt ?? ""}}</td>
                    <td>{{$item->ten_gt	 ?? ""}}</td>
                    
                    {{-- <td>
                        @if (!empty($item->dateNT))
                           
                            @if ($item->hdnts->count() > 0)
                                @foreach ($item->hdnts as $hdnt)
                                @php
                                    $sub_role = "";
                                    foreach($hdnt->user->roles_user as $role){

                                        if($role->role_id == 4)

                                            $sub_role = $role->sub_role;

                                    }

                             @endphp
                                    <p>{{ $hdnt->user->magv }} - {{ $hdnt->user->name }} -{{$sub_role}} </p>
                                @endforeach
                            @endif
                        @else
                            <form action="{{ route('client.registerHDNTAndDateSubmit') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_gtdk" value="{{ $item->id }}">
                                <select name="hdnt[]" multiple="multiple" id=""
                                    class="tag_select2_choose">
                                    @if ($allHDNT->count() > 0)
                                        @foreach ($allHDNT as $gv)
                                        @php
                                            $sub_role = "";
                                            foreach($gv->roles_user as $role){

                                                if($role->role_id == 4)

                                                    $sub_role = $role->sub_role;

                                            }

                                         @endphp

                                            <option value={{ $gv->id }}>{{ $gv->magv }} -
                                                {{ $gv->name }} - {{$sub_role}} </option>
                                        @endforeach
                                    @endif
                                </select>
                                <input type="datetime-local" name="dateNT" id="" class="mt-2">
                                <br>
                                <select name="diadiem" id="" class="mt-2" style="width: 50%;">
                                    <option value="0">-----Chọn địa điểm-----</option>
                                    @if ($allDiadiem->count() > 0)
                                        @foreach ($allDiadiem as $diadiem)
                                            <option value="{{$diadiem->id_dd}}">
                                                {{ $diadiem->phong }} - {{ $diadiem->khuvuc }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <br>
                                <button style="margin: 5% 37%;font-size: 15px;" type="submit">Đăng
                                    ký</button>
                            </form>
                        @endif

                    </td> --}}
                    {{-- <td class="text-left">
                        @foreach ($item->users as $user)
                            <p>{{ $user->magv }} - {{ $user->name }}</p>
                        @endforeach
                    </td> --}}
                    <td class="text-center">{{$item->created_at}}</td>
                    <td class="text-center">{{$item->dateNT}}</td>
                    {{-- <td class="text-center"> 
                        <p style="border-bottom:1px solid #ccc;padding:8px 0;">
                            {{ $item->dateNT }}
                        </p>
                        {{ $item->diadiem ?? "" }}</td> --}}
                        <td><a href="{{ route('client.detail_secretary',$item->id) }}">Xem ngay</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{-- <div class="col-sm-12">
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Mã giáo trình</div>
                <div class="col-sm-8 txt-nd">CT111</div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Tên giáo trình</div>
                <div class="col-sm-8 txt-nd">Lập trình hướng đối tượng</div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Điểm</div>
                <div class="col-sm-8 txt-nd">9.0</div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Đánh giá</div>
                <div class="col-sm-8 txt-nd">
                    - Đầy đủ kiến thức cho sinh viên <br>
                    - Kiến thức phù hợp với doanh nghiệp <br>
                    - Có sáng tạo
                </div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Kết quả</div>
                <div class="col-sm-8 txt-nd">Xuất bản</div>
            </div>
            <div class="row bd-result">
                <div class="col-sm-4 txt-dm">Quyết định</div>
                <div class="col-sm-8 txt-nd">File Word</div>
            </div>
            <div class="row">
                <div class="col-sm-4 txt-dm">Ngày xuất bản</div>
                <div class="col-sm-8 txt-nd">05/06/2023</div>
            </div>
        </div> --}}
    </div>
</div>

@endsection