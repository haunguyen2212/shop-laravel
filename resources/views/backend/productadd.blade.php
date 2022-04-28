<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-success" id="addProductLabel">THÊM SẢN PHẨM</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="frmAdd" enctype="multipart/form-data"> 
        <div class="modal-body">       
          <div class="card-body">
            <div class="row">
              @csrf
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="nameAdd">Tên sản phẩm:</label>
                  <input type="text" class="form-control" id="nameAdd" name="nameAdd">
                  <span class="text-danger error-text error-nameAdd"></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="slugAdd">Slug:</label>
                  <input type="text" class="form-control" id="slugAdd" name="slugAdd">
                  <span class="text-danger error-text error-slugAdd"></span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="brandAdd">Nhãn hiệu:</label>
                  <select id="brandAdd" name="brandAdd" class="custom-select mr-sm-2">
                    <option selected>Chưa chọn nhãn</option>
                  </select>
                  <span class="text-danger error-text error-brandAdd"></span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="priceAdd">Giá:</label>
                  <input type="number" class="form-control" id="priceAdd" name="priceAdd">
                  <span class="text-danger error-text error-priceAdd"></span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="discountAdd">Giảm giá:</label>
                  <input type="text" class="form-control" id="discountAdd" name="discountAdd">
                  <span class="text-danger error-text error-discountAdd"></span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="descriptionAdd">Mô tả:</label>
                  <textarea id="descriptionAdd" name="descriptionAdd"></textarea>
                  <span class="text-danger error-text error-descriptionAdd"></span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="imgAdd">Hình ảnh:</label>
                  <input type="file" class="form-control-file" id="imgAdd" name="imgAdd" required onchange="chooseFile(this,'add-upload')">
                  <div class="mt-2">
                    <img id="add-upload" alt="img" width="200px" style="display: none">
                  </div>
                  <span class="text-danger error-text error-imgAdd"></span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="featuredAdd" name="featuredAdd" value="1">
                  <label class="form-check-label" for="featuredAdd">Sản phẩm nổi bật</label>
                </div>
              </div>
            </div>
          </div> 
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-sm btn-success">Thêm mới</button>
        </div>
      </form> 
    </div>
  </div>
</div>