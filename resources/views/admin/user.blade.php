@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6 text-uppercase">
            <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách người dùng</h3>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3 text-center mb-3">
            <a href="{{ route('manage.add_user') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Thêm người dùng
                </button>
            </a>
        </div>
    </div>
    <table class="table table-bordered table-striped text-center mt-3" style="color: black;" id="mytable">
        <thead>
            <tr class="text-center" style="background-color: rgb(173, 205, 237)">
                <th scope="col" class="text-center" style="font-size: 15px; vertical-align: middle;">STT</th>
                <th scope="col" class="text-center" style="font-size: 15px; vertical-align: middle;">MÃ</th>
                <th scope="col" class="text-center" style="font-size: 15px; vertical-align: middle;">TÊN NGƯỜI DÙNG</th>
                <th scope="col" class="text-center" style="font-size: 15px; vertical-align: middle;">EMAIL</th>
                <th scope="col" class="text-center" style="font-size: 15px; vertical-align: middle;">CHỨC VỤ</th>
                <th scope="col" class="text-center" style="font-size: 15px; vertical-align: middle;">ĐƠN VỊ</th>
                <th scope="col" class="text-center" style="font-size: 15px; vertical-align: middle;">CHI TIẾT</th>
                <th scope="col" style="width: 10%;" class="text-center" style="font-size: 15px; vertical-align: middle;">QUẢN LÍ</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count() > 0)
                @foreach ($users as $key=>$user)
                    <tr>
                        <th scope="row">{{ $key +1 }}</th>
                        <td>{{ $user->magv }}</td>
                        <td class="text-left">{{ $user->name }}</td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td class="text-left">
                           @if ($user->roles_user->count() > 0)
                                @foreach($user->roles_user as $role)
                                    <p>{{$role->role->name}}- {{$role->sub_role ?? ""}}</p>
                                @endforeach

                            @else
                                <p>Giảng Viên</p>
                           @endif
                        </td>
                        <td class="text-left">
                            {{ $user->khoa->ten_khoa }}
                        </td>
                        <td>
                            <a href="{{ URL::to('manager/detail_user/'.$user->id) }}"><i class="fa-solid fa-book-open-reader"
                                    style="color:blue; font-size: 25px;"></i></a>
                        </td>
                        <td>
                            <a href="{{ URL::to('manager/edit_user/'.$user->id) }}"><i
                                    class="fa-sharp fa-regular fa-pen-to-square"
                                    style="color: green; font-size: 25px;"></i></a>

                                    @if (Auth::user()->id != $user->id && Auth::user()->group_id ==1)
                                    |

                            <a onclick="return confirm('Bạn có muốn xóa không?')"
                            href="{{ URL::to('manager/delete_user/' . $user->id) }}"><i class="fa-sharp fa-solid fa-trash"
                            style="color: red; font-size: 25px;"></i></a>
                            @endif

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
