<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/css/form.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/jqwidgets/styles/jqx.summer.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/jqwidgets/styles/jqx.fresh.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/jqwidgets/styles/jqx.energyblue.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/jqwidgets/styles/jqx.light.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/jqwidgets/styles/jqx.ui-sunny.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/jqwidgets/styles/jqx.energyblue.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/jqwidgets/styles/jqx.darkblue.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/css/multiple-select.css" type="text/css" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendors/style.css">

    <link rel="stylesheet" href="<?= base_url('') ?>assets/main/custom/custom.css" type="text/css" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/scripts/simple-chart.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/js/moment.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/js/rpie.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/js/jquery.multiple.select.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxchart.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxexpander.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxvalidator.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxmaskedinput.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxcombobox.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxswitchbutton.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxradiobutton.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxinput.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxdata.export.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxgrid.export.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/scripts/gettheme.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/main/jqwidgets/jqxtabs.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container-scroller">