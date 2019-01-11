<script>
    var modhtml = 'on';
    function showHTML(target) {
        var name = target.match('[^\/]*$')[0];
        $("#dialog").dialog({
            modal: true,
            title: name,
            width: '95vw',
            height: 900,
            buttons: {
                Close: function () {
                    $("#dialog").html('');
                    $(this).dialog('close');
                }
            },
            open: function () {
                $("#dialog").load(target);
            }
        });
    }
</script>