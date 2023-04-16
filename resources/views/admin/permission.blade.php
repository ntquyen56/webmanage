@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6">
            <h5>Danh sách quyền</h5>
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
    <table id="mytable" class="table table-bordered border-primary text-center mt-3" style="color: black;">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">stt</th>
                <th scope="col">mã</th>
                <th scope="col" class="text-left" style="width: 40%;">tên người dùng</th>
                <th scope="col-2" style="width: 30%;">quyền</th>
            </tr>
        </thead>
        <tbody>
            @if($users->count()> 0)
            @foreach ($users as $user)
            <tr>
                <th scope="row">1</th>
                <td>{{$user->magv ?? "khongcoma" }}</td>
                <td class="text-left">{{$user->name}}</td>
                <td>
                    <form action={{route('manage.handle_permission')}} method="POST">
                        @csrf
                        <input type="hidden" name="id_user" value={{$user->id}}>
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="radio" {{$user->group_id === 1 ? "checked" :""}} name="role" value="1"> Admin
                            </div>
                            <div class="col-sm-4">
                                <input type="radio" {{$user->group_id !== 1 ?"checked":""}} name="role" value= "10"> User
                            </div>
                            @if (Auth::user()->id != $user->id && $user->group_id ==1)

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
