<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table-urusan').DataTable({

        });
    });

    $('#btn-create').on('click', function() {
        $('#modal-default').modal('show');
        $('#status').val('create');
    });

    $('#form-create').on('submit', function(e) {
        e.preventDefault();
        let status = $('#status').val();
        let url;

        if (status == 'create') {
            url = baseUrl('urusan/save');
        } else {
            url = baseUrl('urusan/update');
        }

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
            success: function(data) {
                if (data.status == true) {
                    $('#form-create')[0].reset();
                    $('#modal-default').modal('hide');
                }
            }
        });
    });

    $('#table-urusan').on('click', '#btn-edit', function() {
        let urusanId = $(this).attr('urusan-id');
        $('#modal-default').modal('show');
        $('#urusan_id').val(urusanId);
        $('#status').val('edit');

        $.ajax({
            url: baseUrl('urusan/edit'),
            type: 'GET',
            dataType: 'JSON',
            data: {
                urusan_id: urusanId
            },
            success: function(data) {
                if (data.status == true) {
                    $.each(data.data, function(k, v) {
                        $('#urusan').val(v.urusan);
                        $('#sub_urusan').val(v.sub_urusan);
                    });
                }
            }
        });
    });

    $('#table-urusan').on('click', '#btn-delete', function() {
        let urusanId = $(this).attr('urusan-id');
        if (confirm('Yakin ?')) {
            $.ajax({
                url: baseUrl('urusan/delete'),
                type: 'POST',
                dataType: 'JSON',
                data: {
                    urusan_id: urusanId
                },
                success: function(data) {
                    if (data.status == true) {

                    }
                }
            });
        }
    });
</script>