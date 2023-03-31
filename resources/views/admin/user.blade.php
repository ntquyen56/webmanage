@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6">
            <h5>Danh sách người dùng</h5>
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
    <table class="table table-bordered border-primary text-center mt-3" style="color: black;" id="mytable">
        <thead>
            <tr class="text-uppercase">
                <th scope="col">stt</th>
                <th scope="col">mã</th>
                <th scope="col" class="text-left">tên người dùng</th>
                <th scope="col">email</th>
                <th scope="col">chi tiết</th>
                <th scope="col">quản lý</th>
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
                        <td>
                            <a href="{{ route('manage.detail_user') }}"><i class="fa-solid fa-book-open-reader"
                                    style="color:blue; font-size: 25px;"></i></a>
                        </td>
                        <td>
                            <a href="{{ URL::to('manager/edit_user/' . $user->id) }}"><i
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
