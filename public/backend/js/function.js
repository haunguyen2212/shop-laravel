function getSlug(title){
    var slug = title.toLowerCase();
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    return slug;
    }

function chooseFile(fileInput, id){
    if(fileInput.files && fileInput.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            $('#'+id).attr('src', e.target.result);
            $('#'+id).show();
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function loadOrderDetail(obj){
    $('#order-id span').html(obj.data.order.order_id);
        $('#customer-name span').html(obj.data.order.customer_name);
        $('#customer-phone span').html(obj.data.order.customer_phone);
        $('#customer-address span').html(obj.data.order.customer_address);
        $('#total span').html(obj.data.order.total.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'}));
        $('#order-date span').html(obj.data.order.order_date);
        if(obj.data.order.order_status == 2){
          $('#delivery-date span').html(obj.data.order.delivery_date);
        }
        else{
          $('#delivery-date span').html('Chưa có');
        }
        $('#payment-type span').html(obj.data.order.payment_type);
        if(obj.data.order.payment_status == 0){
          $('#payment-status span').html('Chưa thanh toán');
        }
        else{
          $('#payment-status span').html('Đã thanh toán');
        }
        let str = '';
        $.each(obj.data.detail, function(prefix, val){
            str += '<tr><th>'+(prefix+1)+'</th><td>'+val.product_name+'</td><td><img src="../frontend/img/product_detail/'+val.product_detail_image+'" width="90px"></td><td>'+val.quantity+'</td><td>'+(val.product_price-(val.product_price*val.product_discount))+'</td></tr>';
          });
        $('#list-detail').html(str);
        if(obj.data.order.order_status == 0){
          $('.btn-close, .btn-complete').hide();
          $('.btn-browsing, .btn-cancel').show();
          $('.btn-browsing, .btn-cancel').attr('data-id',obj.data.order.order_id);
        }
        else if(obj.data.order.order_status == 1){
          $('.btn-close').hide();
          $('.btn-browsing, .btn-cancel').hide();
          $('.btn-complete').show();
          $('.btn-complete').attr('data-id',obj.data.order.order_id);
        }
        else{
          $('.btn-close').show();
          $('.btn-browsing, .btn-cancel, .btn-complete').hide();
        }
  }
