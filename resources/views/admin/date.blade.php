@extends('layout.admin')
@section('child_page')
    <div class="main-browser">
        <div class="row">
            <div class="col-sm-12 text-center text-uppercase">
                Danh sách đăng ký nghiệm thu năm 2023
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered border-primary text-center mt-3" style="color: black;">
                <thead>
                    <tr class="text-uppercase">
                        <th scope="col">stt</th>
                        <th scope="col">mã</th>
                        <th scope="col">Hội đồng</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Ngày nghiệm thu</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($gtdk_list->count() > 0)
                    @foreach ($gtdk_list as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>

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
                            <td>{{$item->dateNT}}</td>
                            @if(empty($item->statusNT))
                            <td>
                                <button class="button_brow">Duyệt</button>
                                <form class="invisible form-brow" style="margin:8px 0;" action="{{route('manage.admin_brow_date')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_gtdk" value="{{$item->id}}">
                                    <input type="text" name="ma_duyet">
                                    <button type="submit">Nộp</button>

                                </form>


                                <form action="{{route('manage.admin_brow_date')}}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id_gtdk" value="{{$item->id}}">
                                    <input type="hidden" name="status" value="khongduyet">

                                    <button type="submit">Không duyệt</button>
                                </form>
                            </td>
                            @elseif($item->statusNT == "khongduyet")
                            <td><span style="color:red;font-weight: 600">Không được duyệt</span></td>

                            @else
                            <td>Mã duyệt: <span style="color:blue; font-weight: 600">{{$item->statusNT}}</span></td>
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
        const button_brow = document.querySelector('.button_brow');
        const form_brow  = document.querySelector('.form-brow');
        button_brow.addEventListener('click', function(){
            form_brow.classList.toggle('invisible')
        })
    </script>
@endsection
