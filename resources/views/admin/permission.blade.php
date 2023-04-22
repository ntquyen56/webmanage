@extends('layout.admin')

@section('child_page')
    <div class="row mb-2">
        <div class="col-sm-6 text-uppercase">
            <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách quyền</h3>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            {{-- <form class="d-flex" role="search">
                <input class="form-control mx-2" type="search" placeholder="Nhập nội dung bạn cần tìm...?" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form> --}}
        </div>
        <div class="col-sm-1"></div>
    </div>
    <table id="mytable" class="table table-bordered table-striped text-center mt-3" style="color: black;width: 90%">
        <thead>
            <tr class="text-uppercase" style="background-color: rgb(173, 205, 237)">
                <th scope="col" class="text-center">stt</th>
                <th scope="col" class="text-center">mã</th>
                <th scope="col" class="text-center" style="width: 40%;">tên người dùng</th>
                <th scope="col-2" class="text-center" style="width: 20%;">quyền</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count() > 0)
                @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user->magv ?? 'Không có mã' }}</td>
                        <td class="text-left">{{ $user->name }}</td>
                        <td class="text-center" style="margin-left: 20%;">
                            <form action={{ route('manage.handle_permission') }} method="POST">
                                @csrf
                                <input type="hidden" name="id_user" value={{ $user->id }}>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="radio" {{ $user->group_id === 1 ? 'checked' : '' }} name="role"
                                            value="1"> Admin
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="radio" {{ $user->group_id !== 1 ? 'checked' : '' }} name="role"
                                            value="10"> User
                                    </div>
                                    @if (Auth::user()->id != $user->id && Auth::user()->group_id == 1)
                                        <div class="col-sm-4">
                                            <button type="submit">Lưu</button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif


        </tbody>
    </table>
@endsection
