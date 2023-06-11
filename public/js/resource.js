<script>
$(function() {
    $("#title").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "/get-titles", // Rota ou URL para buscar sugestões no banco de dados
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 3 // Número mínimo de caracteres para acionar o autocompletar
    })
});
</script>
