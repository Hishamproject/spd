<!--/.fluid-container-->

<!-- Bootstrap and other libraries -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="assets/scripts.js"></script>
<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/DT_bootstrap.js"></script>
<script src="vendors/jGrowl/jquery.jgrowl.js"></script>
<script src="vendors/jquery.uniform.min.js"></script>
<script src="vendors/chosen.jquery.min.js"></script>
<script src="vendors/bootstrap-datepicker.js"></script>
<script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
<script src="vendors/ckeditor/ckeditor.js"></script>
<script src="vendors/ckeditor/adapters/jquery.js"></script>
<script src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="vendors/fullcalendar/fullcalendar.js"></script>
<script src="vendors/fullcalendar/gcal.js"></script>

<!-- Stylesheets -->
<link href="vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

<script>
$(document).ready(function() {
    // Easy pie charts
    $('.chart').easyPieChart({ animate: 1000 });

    // DataTables initialization
    $('#dataTable').dataTable();

    // Tooltip initialization
    $('[data-toggle="tooltip"]').tooltip();

    // Popover initialization
    $('[data-toggle="popover"]').popover({ trigger: 'hover' });

    // jGrowl notifications
    $('.notification').click(function() {
        var $id = $(this).attr('id');
        switch($id) {
            case 'notification-sticky':
                $.jGrowl("Stick this!", { sticky: true });
                break;
            case 'notification-header':
                $.jGrowl("A message with a header", { header: 'Important' });
                break;
            default:
                $.jGrowl("Hello world!");
                break;
        }
    });

    // Uniform plugin initialization
    $(".uniform_on").uniform();

    // Chosen plugin initialization
    $(".chzn-select").chosen();

    // Datepicker initialization
    $(".datepicker").datepicker();

    // CKEditor standard configuration
    $('textarea#ckeditor_standard').ckeditor({
        width: '98%',
        height: '150px',
        toolbar: [
            { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },
            [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
            { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
        ]
    });

    // CKEditor full configuration
    $('textarea#ckeditor_full').ckeditor({
        width: '98%',
        height: '150px'
    });

    // FullCalendar initialization
    $('#calendar').fullCalendar();

    // Rootwizard finish button click event
    $('#rootwizard .finish').click(function() {
        alert('Finished!, Starting over!');
        $('#rootwizard').find("a[href*='tab1']").trigger('click');
    });
});
</script>
