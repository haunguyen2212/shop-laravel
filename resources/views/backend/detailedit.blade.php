<!-- Modal -->
<div class="modal fade" id="editColor" tabindex="-1" aria-labelledby="editColorLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-info" id="editColorLabel">CHỈNH SỬA CHI TIẾT</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form id="frmEditColor" method="POST" enctype="multipart/form-data"> 
        <div class="modal-body">       
          <div class="card-body">
              <div class="row">
                @csrf
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="nameColorEdit">Màu sắc:</label>
                    <input type="text" class="form-control" id="nameColorEdit" name="nameColorEdit">
                    <span class="text-danger error-text error-nameColorEdit"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="qtyColorEdit">Số lượng:</label>
                    <input type="number" class="form-control" id="qtyColorEdit" name="qtyColorEdit" min="0">
                    <span class="text-danger error-text error-qtyColorEdit"></span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="imgColorEdit">Hình ảnh:</label>
                    <input type="file" class="form-control-file" id="imgColorEdit" name="imgColorEdit" onchange="chooseFile(this,'edit-color-upload')">
                    <div class="mt-2">
                      <img id="edit-color-upload" alt="img" width="150px">
                    </div>
                  </div>
                </div>
              </div>

          </div>  
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-sm btn-warning">Thay đổi</button>
          </div>
    </form>
        
      </div>
    </div>
  </div>