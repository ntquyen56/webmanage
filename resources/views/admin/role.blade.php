@extends('layout.admin')

@section('child_page')
    <div class="row">
        <div class="col-sm-6">
            <h5>Danh sách vai trò</h5>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <form class="d-flex" role="search">
                <input class="form-control mx-2" type="search" placeholder="Nhập nội dung bạn cần tìm...?" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>
    @if (session('msg'))
        <div class="alert alert-danger">{{session('msg')}}</div>
    @endif
    <table class="table table-bordered border-primary text-center mt-3" style="color: black;">
        <thead>
            <tr class="text-uppercase">
                <th scope="col-2">stt</th>
                <th scope="col-2">mã</th>
                <th scope="col-2" class="text-left" style="width: 30%;">tên người dùng</th>
                <th  style="width: 70%;">vai trò</th>
            </tr>
        </thead>
        <tbody>
            @if ($allUser->count() > 0)
                @foreach ($allUser as $key=>$user)
                <tr>
                    <th scope="row">{{$key +1}}</th>
                    <td>{{$user->ma_gv}}</td>
                    <td class="text-left">{{$user->name}}</td>
                    <td>
                        <form class="form_submit" action={{route('manage.handleGrantPossition')}} method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">

                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="radio" {{$user->position == 1? "checked":""}} value="1" name="position" id=""> Hội đồng trường
                                </div>
                                <div class="col-sm-2">
                                    <input  data-bs-toggle="modal" data-bs-target="#exampleModal" type="radio" {{$user->position == 2? "checked":""}} value="2" name="position" id=""> Trưởng khoa
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" {{$user->position == 3? "checked":""}} value="3" name="position" id=""> HĐNT
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" {{$user->position == 4? "checked":""}} value="4" name="position" id=""> Thư ký
                                </div>
                                @if (Auth::user()->group_id ==1 && Auth::user()->id != $user->id)
                                <div class="col-sm-2">

                                <button type="submit">Lưu</button>
                                </div>
                                @endif
                            </div>


                            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Chọn khoa</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>

                                            <select class="truongkhoa" name="khoa" id="" style="height: 125%; border: grey solid 2px;">
                                                <option value="0">-------Chọn khoa giảng dạy-------</option>
                                                @if ($allKhoa->count() > 0)
                                                    @foreach ($allKhoa as $khoa)
                                                        <option
                                                        value={{ $khoa->id_khoa }}>{{ $khoa->ten_khoa }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary button_save" data-bs-dismiss="modal">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div> --}}
                        </form>

                        <form action={{route('manage.handleGrantPossition')}} method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="clear" value="{{$user->id}}">
                            <button type="submit">Xóa vai trò</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif

        </tbody>
    </table>

@endsection


@section('js')



    {{-- <script>
        const inputTruongkhoa = document.querySelector('.truongkhoa');
        const id_khoa_input = document.querySelector('.id_khoa_input');
        const button_save = document.querySelector('.button_save');

        console.log(id_khoa_input);

        console.log(inputTruongkhoa);
        inputTruongkhoa?.addEventListener('change', function(){
                console.log(this.value);
                localStorage.setItem('id_khoa', this.value);
            })

            button_save?.addEventListener('click', function(){
                console.log('ádsadasd');
                console.log(localStorage.getItem('id_khoa'));
                id_khoa_input.value = localStorage.getItem('id_khoa');
                console.log(id_khoa_input.value);
            })

    const form_submit = document.querySelector('.form_submit');
    console.log(form_submit);
    form_submit.addEventListener('submit', function(e){
        e.preventDefault();
        const user_id = this.querySelector('input[name="user_id"]').value;
        const position = this.querySelector('input[name="position"]').value;
        const id_khoa =  localStorage.getItem('id_khoa');
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:this.getAttribute('action'),
                    type:'POST',
                    dataType:'json',
                    data: {
                        user_id: user_id,
                        position:position,
                        id_khoa:id_khoa
                    },
                    success:function(response){
                        console.log('success');
                        console.log(response);
                        // if(response.)

                    },
                    error:function(error){
                        console.log('asda');
                        console.log(error);
                    }
            })
    })

    </script> --}}
@endsection
