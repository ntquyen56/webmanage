@extends('welcome')
@section('child_page')
    <div class="main-calendar">
        <div class="row">
            <div class="col-sm-6 text-uppercase mb-3">
                <h5 style="font-size: 27px;">Lịch nghiệm thu năm 2023</h5>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
              <h6><a href="{{route('client.compilation')}}?page=calender" style="text-decoration: none;color:black;">
                <i class="fa-solid fa-calendar-plus" style="color:rgb(219, 219, 11);"></i>
                Đăng ký nghiệm thu</a></h6>
            </div>

        </div>
        <div class="row">
            <table class="table table-bordered table-hover table-cell" style="">
                <thead>
                    <tr class="txt-calendar text-center">
                        <th scope="col" class="txt-calendar">STT</th>
                        <th scope="col" style="width: 8%;">Mã giáo trình</th>
                        <th scope="col" class="txt-calendar">Tên giáo trình</th>
                        <th scope="col">Hội đồng</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Ngày đăng kí</th>
                        <th scope="col">Ngày nghiệm thu</th>
                        <th scope="col" style="width: 10%;">Địa điểm</th>
                    </tr>
                </thead>
                <tbody class="txt-calendar">
                    
                    @foreach ($dkbsList as $item)

                    <tr>
                        <th scope="row" class="text-center txt-calendar">1</th>
                        <td class="text-center">{{$item->ma_gt ?? ""}}</td>
                        <td>{{$item->ten_gt	 ?? ""}}</td>
                        
                        <td>
                            @if (!empty($item->dateNT))
                                {{-- <p style="border-bottom:1px solid #ccc;padding:8px 0;">
                                    {{ $item->dateNT }}
                                </p> --}}
                                 {{-- <p style="border-bottom:1px solid #ccc;padding:8px 0;">
                                    {{ $item->diadiem ?? "" }}
                                </p> --}}
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

                        </td>
                        <td class="text-left">
                            @foreach ($item->users as $user)
                                <p>{{ $user->magv }} - {{ $user->name }}</p>
                            @endforeach
                        </td>
                        <td class="text-center">{{$item->created_at}}</td>
                        <td class="text-center">{{$item->dateNT}}</td>
                        <td class="text-center"> 
                            <p style="border-bottom:1px solid #ccc;padding:8px 0;">
                                {{ $item->dateNT }}
                            </p>
                            {{ $item->diadiem ?? "" }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
