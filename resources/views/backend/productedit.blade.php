<!-- Modal -->
<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-warning" id="editProductLabel">CHỈNH SỬA SẢN PHẨM</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">       
        <div class="card-body">
          <form id="frmEdit" method="POST" enctype="multipart/form-data"> 
            <div class="row">
              @csrf
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="nameEdit">Tên sản phẩm:</label>
                  <input type="text" class="form-control" id="nameEdit" name="nameEdit">
                  <span class="text-danger error-text error-nameEdit"></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="slugEdit">Slug:</label>
                  <input type="text" class="form-control" id="slugEdit" name="slugEdit">
                  <span class="text-danger error-text error-slugEdit"></span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="brandEdit">Nhãn hiệu:</label>
                  <select id="brandEdit" name="brandEdit" class="form-control">
                    <option selected>Chưa chọn nhãn</option>
                  </select>
                  <span class="text-danger error-text error-brandEdit"></span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="priceEdit">Giá:</label>
                  <input type="number" class="form-control" id="priceEdit" name="priceEdit">
                  <span class="text-danger error-text error-priceEdit"></span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="discountEdit">Giảm giá:</label>
                  <input type="text" class="form-control" id="discountEdit" name="discountEdit">
                  <span class="text-danger error-text error-discountEdit"></span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="descriptionEdit">Mô tả:</label>
                  <textarea id="descriptionEdit" name="descriptionEdit"></textarea>
                  <span class="text-danger error-text error-descriptionEdit"></span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="imgEdit">Hình ảnh:</label>
                  <input type="file" class="form-control-file" id="imgEdit" name="imgEdit" onchange="chooseFile(this,'edit-upload')">
                  <div class="mt-2">
                    <img id="edit-upload" alt="img" width="150px">
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="featuredEdit" name="featuredEdit" value="1">
                  <label class="form-check-label" for="featuredEdit">Sản phẩm nổi bật</label>
                </div>
              </div>
              <div class="col-sm-12 d-flex flex-row-reverse">
                <button type="submit" class="btn btn-sm btn-warning">Thay đổi</button>
                <button type="button" class="btn btn-sm btn-danger mr-1" data-dismiss="modal">Đóng</button>
              </div>

              <div class="col-sm-12">
                <a id="show-detail" class="text-danger font-weight-bold">Chỉnh sửa chi tiết, thông số</a>
              </div>

            </div>
          </form>
          <div>
            
          </div>
        </div>  
      </div>
      
      
    </div>
  </div>
</div>