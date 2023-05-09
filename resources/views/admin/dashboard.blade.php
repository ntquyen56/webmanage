
@extends('layout.admin')
@section('child_page')

   <!-- Content Row -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
   <div class="row">

    <!-- Total User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tổng người dùng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{$allUser}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tổng tài liệu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">                            {{$allHocPhan}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Tổng giáo trình</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$allDKBS}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Xuất bản</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$allGiaoTrinhXB}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-print fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table id="mytable" class="table table-bordered table-striped text-center mt-3" style="color: black; width: 90%">
            <thead>
                <tr class="text-uppercase" style="background-color: rgb(173, 205, 237)">
                    <th scope="col" class="text-center">stt</th>
                    <th scope="col" class="text-center">mã</th>
                    <th scope="col" class="text-center">Giáo trình biên soạn</th>
                    <th scope="col" class="text-center">Tác giả</th>
                    <th scope="col" class="text-center">Ngày đăng ký</th>
                    <th scope="col" class="text-center">Ngày nghiệm thu</th>
                    <th scope="col" class="text-center">Năm xuất bản</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dkbsList as $item)

                <tr>
                    <th scope="row" class="text-center txt-calendar">1</th>
                    <td class="text-center">{{$item->ma_gt ?? ""}}</td>
                    <td>{{$item->ten_gt	 ?? ""}}</td>
                    
                    
                    <td class="text-left">
                        @foreach ($item->users as $user)
                            <p>{{ $user->magv }} - {{ $user->name }}</p>
                        @endforeach
                    </td>
                    <td class="text-center">{{$item->created_at}}</td>
                    <td class="text-center">{{$item->dateNT}}</td>
                    <td class="text-center"> 
                        {{-- <p style="border-bottom:1px solid #ccc;padding:8px 0;">
                            {{ $item->dateNT }}
                        </p>
                        {{ $item->diadiem ?? "" }} --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection