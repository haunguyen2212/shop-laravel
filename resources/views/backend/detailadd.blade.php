<!-- Modal Add Color-->
<div class="modal fade" id="addColor" tabindex="-1" aria-labelledby="addColorLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-success" id="addColorLabel">THÊM CHI TIẾT</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="frmAddColor" enctype="multipart/form-data"> 
          <div class="modal-body">       
            <div class="card-body">
              <div class="row">
                @csrf
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="nameColorAdd">Màu sắc:</label>
                    <input type="text" class="form-control" id="nameColorAdd" name="nameColorAdd">
                    <span class="text-danger error-text error-nameColorAdd"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="qtyColorAdd">Số lượng:</label>
                    <input type="text" class="form-control" id="qtyColorAdd" name="qtyColorAdd">
                    <span class="text-danger error-text error-qtyColorAdd"></span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="imgColorAdd">Hình ảnh:</label>
                    <input type="file" class="form-control-file" id="imgColorAdd" name="imgColorAdd" required onchange="chooseFile(this,'add-color-upload')">
                    <div class="mt-2">
                      <img id="add-color-upload" alt="img" width="200px" style="display: none">
                    </div>
                    <span class="text-danger error-text error-imgColorAdd"></span>
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

  <!-- Modal Add Specification-->
<div class="modal fade" id="addSpec" tabindex="-1" aria-labelledby="addSpecLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-success" id="addSpecLabel">THÊM THÔNG SỐ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="frmAddSpec" enctype="multipart/form-data"> 
        <div class="modal-body">       
          <div class="card-body">
            <div class="row">
              @csrf
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="nameSpecAdd">Tên thông số:</label>
                  <select id="nameSpecAdd" name="nameSpecAdd" class="custom-select mr-sm-2">
                    <option selected>Chưa chọn thông số</option>
                  </select>
                  <span class="text-danger error-text error-nameSpecAdd"></span>
                </div>
              </div> 
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="contentSpecAdd">Nội dung:</label>
                  <input type="text" class="form-control" id="contentSpecAdd" name="contentSpecAdd">
                  <span class="text-danger error-text error-contentSpecAdd"></span>
                </div>
              </div>
              <div class="col-sm-12">
                <div id="add-new-spec" class="text-danger fw-bold" style="cursor: pointer">Thêm thông số mới</div>
              </div>
              <div class="col-sm-6 new" style="display: none">
                <div class="form-group">
                  <input type="text" class="form-control" id="newSpec" name="newSpec">
                  <span class="text-danger error-text error-newSpec"></span>
                </div>
              </div>
              <div class="col-md-2 new" style="display: none">
                <button id="btn-new-spec" class="btn btn-primary" data-url="{{ route('detail.newspec.store') }}">Thêm</button>
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