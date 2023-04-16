@extends('welcome')
@section('css')
<link href="{{asset('admins/vendor/select2')}}/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection__choice{background-color: #000 !important; color: #fff !important}
    .select2-container
    {
        width:100% !important;
    }
</style>
@endsection
@section('child_page')
    <div class="main-calendar">
        <div class="row">
            <div class="col-sm-6 text-uppercase mb-3">
                <h5 style="font-size: 27px;">Đăng ký nghiệm thu giáo trình</h5>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-hover table-cell" style="">
                <thead>
                    <tr class="txt-calendar text-center">
                        <th scope="col" class="txt-calendar">STT</th>
                        <th scope="col" style="width: 8%;">Mã giáo trình</th>
                        <th scope="col" class="txt-calendar">Tên giáo trình</th>
                        <th scope="col">Hội đồng và Ngày đăng ký</th>
                        <th scope="col">Tác giả</th>
                    </tr>
                </thead>
                <tbody class="txt-calendar">
                    @if ($gtdk->count() > 0)
                    @foreach ($gtdk as $key=>$item)
                        @if ($item->browsered == 1 )

                        <tr>
                            <td>{{ $key +1 }}</td>

                            <td>{{ $item->ma_gt }}</td>
                            <td class="text-left">{{ $item->ten_gt }}</td>
                            <td>
                                @if (!empty($item->dateNT))
                                    <p style="border-bottom:1px solid #ccc;padding:8px 0;">
                                    {{

                                        $item->dateNT
                                       }}
                                    </p>

                                        @if ($item->hdnts->count()>0)
                                        @foreach ($item->hdnts as $hdnt)
                                            <p>{{$hdnt->user->name}} - {{$hdnt->user->magv}}</p>
                                        @endforeach

                                        @endif
                                @else



                                <form action="{{route('client.registerHDNTAndDateSubmit')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_gtdk" value="{{$item->id}}">
                                    <select  name="hdnt[]"  multiple="multiple" id="" class=" tag_select2_choose" style="width: 30%;">
                                        @if ($allHDNT->count() > 0)
                                            @foreach ($allHDNT as $gv)

                                                <option
                                                    value={{ $gv->id }}>{{ $gv->magv }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <input type="datetime-local" name="dateNT" id="">
                                    <button style="margin-top:8px" type="submit">Nộp</button>
                                </form>
                                @endif

                            </td>
                            <td class="text-left">
                                @foreach ($item->users as $user)
                                    <p>{{ $user->magv }} - {{ $user->name }}</p>
                                @endforeach
                            </td>


                        </tr>
                        @endif
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
 @endsection
