<div class="container-fluid">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal-default">
                Tambah Data
            </button>
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Urusan</th>
                        <th>Sub Urusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($urusan->result() as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $value->urusan; ?></td>
                            <td><?= $value->sub_urusan; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-create" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="urusan">Urusan</label>
                        <input type="text" class="form-control" name="urusan" id="urusan" placeholder="Input data urusan">
                    </div>
                    <div class="form-group">
                        <label for="sub_urusan">Sub Urusan</label>
                        <input type="text" class="form-control" name="sub_urusan" id="sub_urusan" placeholder="Input data sub urusan">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->