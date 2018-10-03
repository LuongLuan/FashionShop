// //Add to cart
// $(function () {
//         $(".add_cart_btn").click(function () {
//         id = $(this).attr("d-id");
//             $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             });
//             $.ajax({
//                 url: "add-cart/"+id,
//                 type:"GET",
//                 data: {},
//                 success: function (response) {
//                     alert("Đã thêm vào giỏ hàng !!!");
//                     $("#count").html('('+response.count+')');
//                 },
//                 error: function (response) {
//                         alert("Lỗi");
//                 }
//             });
//         });
//     });
//Delete product
$(function() {
    $(".remove").click(function() {
        id = $(this).attr("d-id");
        tr = $(this).parents('tr');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "xoa-san-pham/" + id,
            type: "GET",
            data: {},
            success: function(response) {
                tr.remove();
                $("#cart-total").html(response.total);
                $("#count").attr('count', response.count);
            },
            error: function(response) {
                alert("Chưa xóa");
            }
        });
    });
});
//Update qty
$(".input-text").change(function() {
    id = $(this).attr("d-id");
    qty = $(this).val();
    price = $('#red-' + id).attr("price");

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (qty == 0 || qty < 0) {
        alert('Số lượng phải lớn hơn 0');
    } else {
        $.ajax({
            url: "cap-nhat-gio-hang/" + id + "/" + qty,
            type: "GET",
            data: {},
            success: function(response) {
                $("#cart-total").html(formatNumber(response.total) + '₫');
                $("#count").attr('count', response.count);
                //$("#sst").val(response.qty);
                $("#p-" + id).html(formatNumber(price * qty) + " ₫");
            },
            error: function(response) {
                alert("Lỗi");
            }
        });
    } //endif
});
//Paginate
// $(document).on('click', '.pagination a', function(e) {
//     e.preventDefault();
//     var page = $(this).attr('href').split('page=')[1];
//     $.ajax({
//         type: "GET",
//         url: 'chuyen-muc/Id=1?page=' + page,
//         success: function(data) {
//             alert('thành công');
//             $('body').html(data);
//         },
//         error: function() {
//             alert('lỗi');
//         }
//     });
// });
//Menu left
$(document).ready(function() {
    $('.all-category').mouseover(function() {
        $('.menu-left').show();
    });
    $('.menu-left').mouseover(function() {
        $('.menu-left').show();
    });
    $('.menu-left').mouseout(function() {
        $('.menu-left').hide();
    });
    //search
    $('.search_icon').click(function(e) {
        e.preventDefault();
        $('.advanced_search_area').slideToggle(500);
    });
    //filter
    // $('.minPrice').on('change blur',function(){
    //     if($(this).val().trim().length === 0){
    //         $(this).val(10);
    //     }
    // });
    $('.btn-filter').click(function(e) {
        if ($('.min-price').val() >= $('.max-price').val()) {
            e.preventDefault();
            $('.error').html('Khoảng nhập không hợp lệ !');
        }
        if ($('.min-price').val() == "" || $('.max-price').val() == "") {
            e.preventDefault();
            $('.error').html('Hãy nhập mức giá !');
        }
    });
    $('.edit-add').click(function(e) {
        e.preventDefault();
        $('#address').removeAttr("readonly");
    });
    $('.edit-phone').click(function(e) {
        e.preventDefault();
        $('#phone').removeAttr("readonly");
    });
    $('.edit-name').click(function(e) {
        e.preventDefault();
        $('#name').removeAttr("readonly");
    });
    $('#btn-place').click(function() {
        var dt = $(this).attr('data');
        if (dt == 0) {
            alert('Vui lòng chọn sản phẩm trước khi đặt hàng');
            window.location = '/';
        }
    });
});
