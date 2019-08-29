$('#jq-skip').on('click', function () {
    $.post("core/handler.php",
        {
            'action' : 'test_skip'
        },
        function (data) {
            var data = JSON.parse(data);
            $('.jq-rand-word').html(data['eng_name']);
        }
    )

})