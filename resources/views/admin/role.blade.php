@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6 text-uppercase">
            <h3 style="font-weight:700;"> <i class="fa-solid fa-list"></i> Danh sách vai trò</h3>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <form class="d-flex" role="search">
                <input class="form-control mx-2" type="search" placeholder="Nhập nội dung bạn cần tìm...?"
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>
    @if (session('msg'))
        <div class="alert alert-danger">{{ session('msg') }}</div>
    @endif
    <table id="mytable" class="table table-bordered table-striped text-center mt-3" style="color: black;">
        <thead>
            <tr class="text-uppercase" style="background-color: rgb(173, 205, 237)">
                <th scope="col-2" class="text-center">stt</th>
                <th scope="col-2" class="text-center">mã</th>
                <th scope="col-2" class="text-center" style="width: 20%;">tên người dùng</th>
                <th style="width: 70%;" class="text-center">vai trò</th>
            </tr>
        </thead>
        <tbody>
            @if ($allUser->count() > 0)
                @foreach ($allUser as $key => $user)
                    <tr>
                        {{-- <th scope="row">{{ $user->id }}</th> --}}
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $user->magv }}</td>
                        <td class="text-left">{{ $user->name }}</td>
                        <td>
                            <form class="form_submit" action={{ route('manage.handleGrantPossition') }} method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                {{-- <input type="hidden" name="abc" value="{{(string)json_decode($user->position)}}"> --}}
                                <div class="row">
                                    @if ($allRole->count() > 0)
                                        @foreach ($allRole as $key => $role)
                                            <div class="col-sm-2">
                                                <input class="checkbox_role" data-value="{{ $role->name }}"
                                                    type="checkbox"
                                                    {{ !empty($user->arrRole) && $user->arrRole != 0 && in_array($role->id, $user->arrRole) ? 'checked' : '' }}
                                                    value="{{ $role->id }}" name="position[]" id="">
                                                {{ $role->name }}
                                            </div>
                                        @endforeach
                                    @endif

                                    @if (isset($user->arrSubRole[2]))
                                        <div class="col-sm-3">
                                            <span>Vị trí trong HĐT</span>

                                            <select name="sub_position_hdt" id=""
                                                class="my-3 form-control px-5  sub_position_hdt">
                                                <option {{ $user->arrSubRole[2] == 'Ủy viên' ? 'selected' : '' }}
                                                    value="Ủy viên">Ủy viên</option>
                                                <option {{ $user->arrSubRole[2] == 'Chủ tịch' ? 'selected' : '' }}
                                                    value="Chủ tịch">Chủ tịch</option>
                                                <option {{ $user->arrSubRole[2] == 'Thư kí' ? 'selected' : '' }}
                                                    value="Thư kí">Thư kí</option>
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-sm-3 ">
                                            <span>Vị trí trong HĐT</span>

                                            <select name="sub_position_hdt" id=""
                                                class="my-3 form-control px-5 invisible sub_position_hdt">
                                                <option value="Ủy viên">Ủy viên</option>
                                                <option value="Chủ tịch">Chủ tịch</option>
                                                <option value="Thư kí">Thư kí</option>
                                            </select>
                                        </div>
                                    @endif


                                    @if (isset($user->arrSubRole[4]))
                                        <div class="col-sm-3">
                                            <span>Vị trí trong HĐNT</span>

                                            <select name="sub_position_hdnt" id=""
                                                class="my-3 form-control px-5  sub_position_hdnt">
                                                <option {{ $user->arrSubRole[4] == 'Ủy viên' ? 'selected' : '' }}
                                                    value="Ủy viên">Ủy viên</option>
                                                <option {{ $user->arrSubRole[4] == 'Chủ tịch' ? 'selected' : '' }}
                                                    value="Chủ tịch">Chủ tịch</option>
                                                <option {{ $user->arrSubRole[4] == 'Thư kí' ? 'selected' : '' }}
                                                    value="Thư kí">Thư kí</option>
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-sm-3 ">
                                            <span>Vị trí trong HĐNT</span>
                                            <select name="sub_position_hdnt" id=""
                                                class="my-3 form-control px-5 invisible sub_position_hdnt">
                                                <option value="Ủy viên">Ủy viên</option>
                                                <option value="Chủ tịch">Chủ tịch</option>
                                                <option value="Thư kí">Thư kí</option>
                                            </select>
                                        </div>
                                    @endif
                                    {{-- <div class="col-sm-2">
                                    <input  data-bs-toggle="modal" data-bs-target="#exampleModal" type="radio" {{$user->position == 2? "checked":""}} value="2" name="position" id=""> Trưởng khoa
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" {{$user->position == 3? "checked":""}} value="3" name="position" id=""> HĐNT
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" {{$user->position == 4? "checked":""}} value="4" name="position" id=""> Thư ký
                                </div> --}}
                                    @if (Auth::user()->group_id == 1 && Auth::user()->id != $user->id)
                                        <div class="col-sm-1" style="margin-bottom: -30px;">
                                            <button type="submit" class="txt-save">Lưu</button>
                                        </div>
                                    @endif
                                </div>
                            </form>

                            <form action={{ route('manage.handleGrantPossition') }} method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="hidden" name="clear" value="{{ $user->id }}">
                                <button type="submit" style="margin-left: 620px;" class="txt-delete">Xóa vai trò</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>

@endsection


@section('js')
    <script>
        const checkbox_roles = document.querySelectorAll('.checkbox_role');
        checkbox_roles.forEach(element => {
            console.log(element);
            element.addEventListener('change', function(event) {
                const name_role = element.dataset.value;
                console.log(name_role);
                if (name_role.trim() == 'Hội đồng trường') {
                    if (this.checked == true) {

                        element.parentElement.parentElement.querySelector('.sub_position_hdt').classList
                            .remove('invisible');
                    } else {
                        element.parentElement.parentElement.querySelector('.sub_position_hdt').classList
                            .add('invisible');

                    }
                } else if (name_role.trim() == 'Hội đồng nghiệm thu') {
                    if (this.checked == true) {

                        element.parentElement.parentElement.querySelector('.sub_position_hdnt').classList
                            .remove('invisible');
                    } else {
                        element.parentElement.parentElement.querySelector('.sub_position_hdnt').classList
                            .add('invisible');

                    }
                }
            });
        });
    </script>
@endsection
