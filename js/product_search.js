(function ($) {
    $(document).ready(function () {
        $( "#edit-require" ).click(function() {
            var searched = $("#for-search").val();

            if (searched != ""){
                var myComponent = ReactDOM.render(
                    React.createElement(
                        Searcher,
                        { source: "http://" + document.domain + "/product_search/" + searched + "/Offer" }
                    ),
                    document.getElementById('block-results'));
                myComponent.componentDidMount();
            }

        });

        $( "#edit-bid" ).click(function() {

            alert("Muy pronto activaremos esta opción. Gracias por visitarnos");

        });
    });
})(jQuery);

