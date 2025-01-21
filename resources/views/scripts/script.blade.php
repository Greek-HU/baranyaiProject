<script>
$(document).ready(function() {
    $(document).on('click', '.index', function(event) {


        window.location.href = '/';
    });
    $(document).on('click', '.projects', function(event) {
        var id = $(this).data('id');

        window.location.href = 'comment'+id;
    });
    $(document).on('click', '.summary', function(event) {


        window.location.href = 'summaryPage';
    });
});
</script>
