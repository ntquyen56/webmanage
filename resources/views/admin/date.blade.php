@extends('layout.admin')
@section('child_page')
    <div class="main-browser">
        <div class="row">
            <div class="col-sm-12 text-uppercase">
                <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách đăng ký nghiệm thu </h3>
            </div>
        </div>
        <div class="row">
            <table id="mytable" class="table table-bordered table-striped text-center mt-3" style="color: black;">
                <thead>
                    <tr class="text-uppercase" style="background-color: rgb(173, 205, 237)">
                        <th scope="col" class="text-center" style="vertical-align: middle">stt</th>
                        <th scope="col" class="text-center" style="vertical-align: middle">mã</th>
                        <th scope="col" class="text-center" style="vertical-align: middle">Hội đồng</th>
                        <th scope="col" class="text-center" style="vertical-align: middle">Tác giả</th>
                        <th scope="col" class="text-center" style="vertical-align: middle">Ngày nghiệm thu</th>
                        <th scope="col" class="text-center" style="vertical-align: middle">Địa điểm</th>
                        <th scope="col" class="text-center" style="vertical-align: middle;">Giáo trình</th>
                        <th scope="col" class="text-center" style="vertical-align: middle">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($gtdk_list->count() > 0)
                    @foreach ($gtdk_list as $key=>$item)
                        <tr>
                            <td>{{ $item->id}}</td>

                            <td>{{ $item->ma_gt }}</td>
                            <td class="text-left">
                                @foreach ($item->hdnts as $user)
                                    <p>{{ $user->user->magv }} - {{ $user->user->name }}</p>
                                @endforeach
                            </td>
                            <td class="text-left">
                                @foreach ($item->users as $user)
                                    <p>{{ $user->magv }} - {{ $user->name }}</p>
                                @endforeach
                            </td>
                            <td>{{date('d-m-Y H:i:s'),strtotime($item->dateNT) }}</td>
                            <td>{{$item->diadiem}}</td>
                            <td>
                                <p>
                                    {{-- <a target="_blank" href="{{ $item->file_upload }}">{{ $item->file_name }}</a> --}}
                                    <a target="_blank" href="{{ $item->file_upload }}">Xem tại đây</a>
                                </p>
                            </td>

                            @if(empty($item->statusNT))
                            <td>
                                @php
                                    $check =0;
                                    foreach(Auth::user()->roles_user as $role){
                                        if($role->role_id ==4 && $role->sub_role =="Chủ tịch"){
                                            $check =1;
                                            break;
                                        }
                                    }
                                @endphp

                                @if($check == 1)
                                <button class="button_brow">Duyệt</button>
                                <form class="invisible form-brow" style="margin:8px 0;" action="{{route('manage.admin_brow_date')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_gtdk" value="{{$item->id}}">
                                    <input type="text" name="ma_duyet">
                                    <input type="file" name="file_qd">

                                    <button type="submit">Nộp</button>

                                </form>


                                <form action="{{route('manage.admin_brow_date')}}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id_gtdk" value="{{$item->id}}">
                                    <input type="hidden" name="status" value="khongduyet">

                                    <button type="submit">Không duyệt</button>
                                </form>
                                @endif
                            </td>
                            @elseif($item->statusNT == "khongduyet")
                            <td><span style="color:red;font-weight: 600">Không được duyệt</span></td>

                            @else
                            <td>
                                <p>

                                    Số QĐ: <span style="color:blue; font-weight: 600">{{$item->statusNT}}</span>
                                </p>
                                <a href="{{$item->fileQD}}" target="_blank" style="color:blue; font-weight: 600">Xem ngay</a>
                            </td>

                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">
                            <p class="d-flex justify-content-between text-center">
                                Không có giáo trình
                            </p>
                        </td>
                    </tr>

                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('js')
    <script>
        const button_brow = document.querySelectorAll('.button_brow');
        const form_brow  = document.querySelectorAll('.form-brow');
        button_brow.forEach((item,index)=>{

            item.addEventListener('click', function(){
                form_brow[index].classList.toggle('invisible')
            })
        })
    </script>
@endsection
