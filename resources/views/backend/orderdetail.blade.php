<div class="modal fade" id="orderDetailShow" tabindex="-1" aria-labelledby="orderDetailShowLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success" id="orderDetailShowLabel">CHI TIẾT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="order-id"><strong>Mã đơn hàng: </strong><span></span></div>
          <div id="customer-name"><strong>Tên khách hàng: </strong><span></span></div>
          <div id="customer-phone"><strong>Số điện thoại: </strong><span></span></div>
          <div id="customer-address"><strong>Địa chỉ giao hàng: </strong><span></span></div>
          <div id="total"><strong>Tổng thanh toán: </strong><span></span></div>
          <div id="order-date"><strong>Ngày đặt hàng: </strong><span></span></div>
          <div id="delivery-date"><strong>Ngày giao hàng: </strong><span></span></div>
          <div id="payment-type"><strong>Thanh toán: </strong><span></span></div>
          <div id="payment-status"><strong>Trạng thái: </strong><span></span></div>
          <table class="table">
            <thead>
              <tr>
                <th width="10%">STT</th>
                <th width="25%">Sản phẩm</th>
                <th width="25%">Hình ảnh</th>
                <th width="20%">Số lượng</th>
                <th width="20%">Đơn giá</th>
              </tr>
            </thead>
            <tbody id="list-detail">
              
            </tbody>
          </table>
          <div id="order-browsing"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary btn-close" data-dismiss="modal">Đóng</button>
          <button class="btn btn-sm btn-success btn-browsing">Duyệt đơn</button>
          <button class="btn btn-sm btn-danger btn-cancel">Hủy đơn</button>
          <button class="btn btn-sm btn-info btn-complete">Hoàn thành</button>
        </div>
      </div>
    </div>
  </div>