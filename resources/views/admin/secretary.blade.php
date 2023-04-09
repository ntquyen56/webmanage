@extends('layout.admin')
@section('child_page')
    <div class="main-acc">
        <div class="row">
            <div class="col-sm-12 text-center text-uppercase">
                <h5>biên bản họp <br>về việc thẩm định giáo trình</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">&#10046;&#10044;&#10046;</div>
        </div>
        <form action="" method="post">
            <div class="row mt-4">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Tên giáo trình:</div>
                <div class="col-sm-8 txt-acc">Lập trình căn bản A</div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-4">Mã số học phần:</div>
                        <div class="col-sm-8 txt-acc">CT101</div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-4 text-right">Số tín chỉ:</div>
                        <div class="col-sm-8 txt-acc">3</div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">Ban biên soạn giáo trình(ghi rõ chức danh/học hàm, học vị/họ và tên):</div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Chủ biên:</div>
                <div class="col-sm-8"><input type="text" name="" id="" style="width: 60%;border:none;">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Thành viên:</div>
                <div class="col-sm-8"><input type="text" name="" id="" style="width: 60%;border:none;">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Thành viên:</div>
                <div class="col-sm-8"><input type="text" name="" id="" style="width: 60%;border:none;">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-3">Địa điểm thẩm định giáo trình:</div>
                <div class="col-sm-7"><input type="text" name="" id="" style="width: 60%;border:none;">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Thời gian:</div>
                <div class="col-sm-8">Lúc: ???giờ, ngày .... tháng .... năm ....</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">1. Tuyên bố lý do:</div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Công bố Quyết định số <input type="text"
                        style="width: 10%;border: none;">
                    ./QĐ-ĐHCT ngày <input type="date" name="" id=""> của Hiệu
                    trưởng Trường Đại học Cần Thơ về việc thành
                    lập Hội đồng thẩm định giáo trình.
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    Danh sách Hội đồng gồm có <input type="text" style="width: 6%;border: none;"> thành viên:
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <table class="table table-bordered ">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" style="width: 6%;">STT</th>
                                <th scope="col" style="width: 40%;">Họ và tên </th>
                                <th scope="col">Đơn vị</th>
                                <th scope="col" style="width: 20%;">Trách nhiệm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td></td>
                                <td></td>
                                <td class="text-center">Chủ tịch</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">2</th>
                                <td></td>
                                <td></td>
                                <td class="text-center">Ủy viên phản biện</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">3</th>
                                <td></td>
                                <td></td>
                                <td class="text-center">Ủy viên phản biện</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">4</th>
                                <td></td>
                                <td></td>
                                <td class="text-center">Ủy viên</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">5</th>
                                <td></td>
                                <td></td>
                                <td class="text-center">Ủy viên</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">6</th>
                                <td></td>
                                <td></td>
                                <td class="text-center">Ủy viên</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center">7</th>
                                <td></td>
                                <td></td>
                                <td class="text-center">Ủy viên Thư ký</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row mt-1">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    Số thành viên có mặt: <input type="text" style="width: 5%;"> ; &nbsp;
                    Vắng mặt: <input type="text" name="" id="" style="width: 5%;">
                </div>                
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">2. Nội dung:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">2.1. Ban biên soạn trình bày nội dung giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <textarea name="" id="" cols="80" rows="5"></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">2.2. Nhận xét, đánh giá của các ủy viên phản biện, ủy viên Hội đồng thẩm định:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold"> - Nội dung giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <label class="container">Phù hợp với mục tiêu, nội dung CTĐT
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Đảm bảo chuẩn kiến thức, kỹ năng
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Đáp ứng chuẩn đầu ra của học phần
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="container">Khác:
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-10"> <input type="text" name="" id=""></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold"> - Kiến thức trong giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <label class="container">Trình bày khoa học, logic, cân đối giữa lý thuyết và thực hành
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Phù hợp với thực tiễn và cập nhật những tri thức mới được kiểm chứng và công
                        nhận
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="container">Khác:
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-10"> <input type="text" name="" id=""></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold"> - Nội dung được trích dẫn trong tài liệu tham khảo để biên soạn giáo trình:
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <label class="container">Có nguồn gốc, chú thích rõ ràng, tuân thủ các quy định của pháp luật
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Nội dung trích dẫn phù hợp, đáp ứng mục tiêu của giáo trình
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="container">Khác:
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-10"> <input type="text" name="" id=""></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">4. Định dạng, cấu trúc và hình thức trình bày của giáo trình:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <textarea name="" id="" cols="80" rows="5"></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">5. Đối tượng sử dụng</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <label class="container">Đào tạo đại học
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Thạc sĩ
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Tiến sĩ
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 fw-bold">6. Đề nghị và kết luận:</div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Đạt - Xuất bản - Không chỉnh sửa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Đạt - Xuất bản - Có chỉnh sửa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Không đạt
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-3" style="padding-left: 40%;padding-right: 40%;">
                <button type="submit" style="" class="btn btn-success">Gửi đánh giá</button>
            </div>
        </form>
    </div>
@endsection
