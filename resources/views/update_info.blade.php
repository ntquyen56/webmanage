@extends('welcome')

@section('child_page')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="text-center text-uppercase fw-bold mb-5">Cập nhật thông tin</h4>
        </div>
    </div>
    <form action="{{ route('client.handle_update_info') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        {{-- <div class="row">
                            <div class="col-sm-4 text-right">Mã giảng viên</div>
                            <div class="col-sm-8"><input type="text" name="magv" value={{Auth::user()->magv}} id="" style="width: 30%; height: 125%; border: grey solid 2px;"></div>
                        </div> --}}
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Tên giảng viên</div>

                            <div class="col-sm-8"><input required type="text" name="tengv"  value="{{$user->name}}" id="" style="height: 125%; border: grey solid 2px;"></div>

                        </div>
                        {{-- <div class="row mt-3">
                            <div class="col-sm-4 text-right">Email</div>
                            <div class="col-sm-8"><input type="email" name="email"  value={{$user->email}}  id="" style="width: 75%; height: 125%; border: grey solid 2px;"></div>
                        </div> --}}
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Địa chỉ</div>
                            <div class="col-sm-8">
                                <textarea name="diachi" required id="" rows="2" cols="30" style="height: 125%; border: grey solid 2px;">{{ $user->diachi }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4 text-right">Ngày sinh</div>
                            <div class="col-sm-8"><input required type="date" name="ngaysinh" value={{ $user->ngaysinh }}
                                    id="" style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Giới tính</div>
                            <div class="col-sm-8">
                                <select name="gioitinh" required id="" class="text-center"
                                    style="height: 125%; border: grey solid 2px;">
                                    <option value="0">----Chọn----</option>
                                    <option {{ $user->gioitinh == 1 ? 'selected' : '' }} value="1">Nam</option>
                                    <option {{ $user->gioitinh == 2 ? 'selected' : '' }} value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Khoa</div>
                            <div class="col-sm-8">
                                <select name="khoa" id="" required style="height: 125%; border: grey solid 2px;">
                                    <option value="0">-------Chọn khoa giảng dạy-------</option>
                                    @if ($allKhoa->count() > 0)
                                        @foreach ($allKhoa as $khoa)
                                            <option
                                                {{ !empty($user->khoa) && $user->khoa->id_khoa == $khoa->id_khoa ? 'selected' : '' }}
                                                value={{ $khoa->id_khoa }}>{{ $khoa->ten_khoa }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Trình độ</div>
                            <div class="col-sm-8">
                                <select name="trinhdo" required id="" class="text-center"
                                    style="height: 125%; border: grey solid 2px;">
                                    <option value="0">----Chọn----</option>
                                    @if ($allTrinhDo->count() > 0)
                                        @foreach ($allTrinhDo as $trinhdo)
                                            <option
                                                {{ !empty($user->trinhdo) && $user->trinhdo->id_trinhdo == $trinhdo->id_trinhdo ? 'selected' : '' }}
                                                value={{ $trinhdo->id_trinhdo }}>{{ $trinhdo->ten_trinhdo }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-4 text-right">Liên hệ</div>
                            <div class="col-sm-8"><input required type="text" name="lienhe" value={{ $user->lienhe }}
                                    id="" style="height: 125%; border: grey solid 2px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin: 5% 45%;">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </form>
@endsection
