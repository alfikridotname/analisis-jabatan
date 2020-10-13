<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Analisis Jabatan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Base CSS -->
    <?php echo $this->load->view('layouts/baseCss', true); ?>
    <!-- Ext CSS -->
    <?php echo $css; ?>
</head>

<body class="hold-transition login-page">
    <!-- Contents Template -->
    <?php echo $contents; ?>

    <!-- Base JS -->
    <?php echo $this->load->view('layouts/baseJs', true); ?>
    <!-- Ext JS -->
    <?php echo $js; ?>
</body>

</html>