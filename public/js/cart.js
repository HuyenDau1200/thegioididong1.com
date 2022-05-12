$(document).ready(function () {
    $(".num-order").change(function () {
        var id = $(this).attr("data-id");//Tạo biến lấy giá trị từ selector
        var qty = $(this).val();//Tạo biến lấy giá trị từ selector
        var data = { id: id, qty: qty };//Tạo biến lấy dữ liệu
        //console.log(data);
        //alert(num_order);//Xuất hiển thị dữ liệu
        $.ajax({
            url: '?mod=cart&action=updateAjax',//Trang xử lí mặc định trang hiện tại
            method: 'POST',//$_POST hoặc $_GET, mặc định GET
            data: data,//Dữ liệu truyền lên server
            dataType: 'json',// trả về dạng html,text, script hoặc json
            success: function (data) {
                $("#sub-total-" + id).text(data.subTotal);
                $("#total-price span").text(data.total);
                $("#btn-cart #num").text(data.numOrder);
                $("#dropdown .desc span").text(data.numOrder);
                console.log(data);
            },
            error: function (xhr, ajaxOptions, throwError) {//Phương thức lỗi
                alert(xhr.status);//Dòng hiển thị thông tin
                alert(throwError);//Chi tiết lỗi
            }
        });
    });
});