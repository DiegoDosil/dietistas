<script type="text/javascript" src="js/alertify.min.js"></script>
 <script type="text/javascript">
    $("#alert").on( 'click', function () {
    alertify.alert("{{$slot}}");
        });
</script>
