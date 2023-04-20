@extends('welcome')

@section('child_page')
    <div class="group-main">
        <div class="row mt-2 text-center">
            <h5>Đăng ký biên soạn giáo trình năm 2023</h5>
        </div>
        <div class="row ">
            <table class="table table-bordered " style="margin: 20px 50px; width: 90%;">
                <thead>
                    <tr class="text-uppercase text-center">
                        <th scope="col">STT</th>
                        <th scope="col" style="width: 20%;">mã giáo trình</th>
                        <th scope="col">Tên giáo trình</th>
                        <th scope="col">Trạng thái</th>
                        {{-- <th scope="col">Chi tiết</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if ($allGiaoTrinh->count() > 0)
                    @if(\Carbon\Carbon::now()->lt($allGiaoTrinh[0]->dateStart)  || \Carbon\Carbon::now()->gt($allGiaoTrinh[0]->dateEnd))
                    <tr>

                        <td colspan="4">
                            <p style="font-size: 20px; color: red; font-weight: 600;">Chưa đến thời gian đăng kí biên soạn!</p>
                        </td>
                    </tr>
                    @else
                        @foreach ($allGiaoTrinh as $key=>$giaotrinh)
                            <tr>
                                <td>{{ $key+ 1 }}</td>
                                <td class="text-center">{{ $giaotrinh->ma_gt }}</td>
                                <td>{{ $giaotrinh->ten_gt }}</td>
                                <td class="text-center">
                                    @if ($giaotrinh->status == 0)
                                        <a href="#"><i class="fa-sharp fa-solid fa-check-double"
                                                style="color: red;"></i></a>
                                    @else
                                        <a href="#"><i class="fa-sharp fa-solid fa-check-double"
                                                style="color: green;"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
