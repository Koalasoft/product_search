(function ($) {
    $(document).ready(function () {
        $( "#edit-require" ).click(function() {
            var searched = $("#for-search").val();

            if (searched != ""){
                var myComponent = ReactDOM.render(
                    React.createElement(
                        Searcher,
                        { source: "http://www.devsiquesi.com/product_search/" + searched + "/Offer" }
                    ),
                    document.getElementById('block-results'));
                myComponent.componentDidMount();
            }

        });
    });
})(jQuery);

