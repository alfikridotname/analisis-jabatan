<!-- jQuery -->
<script src="<?php echo base_url('assets/default/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/default/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/default/'); ?>dist/js/adminlte.min.js"></script>
<!-- Pace  -->
<script src="<?php echo base_url('assets/default/'); ?>plugins/pace-progress/pace.min.js"></script>
<!-- Setting Pace -->
<script>
    paceOptions = {
        restartOnRequestAfter: 5,
        ajax: {
            trackMethods: ['GET', 'POST', 'PUT', 'DELETE', 'REMOVE']
        }
    }

    function baseUrl(url) {
        return "<?php echo base_url(); ?>" + url;
    }
</script>