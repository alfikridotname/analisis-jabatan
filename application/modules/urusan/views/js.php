<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $('#form-create').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: baseUrl('urusan/save'),
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
            success: function(data) {
                if (data.status == true) {
                    $('#modal-default').modal('hide');
                }
            }
        });
    });
</script>