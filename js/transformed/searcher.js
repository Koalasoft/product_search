"use strict";

var DrawSearch = React.createClass({
    displayName: "DrawSearch",

    render: function render() {
        var createItem = function createItem(item) {
            var url = "http://" + item.webpage;
            var rand = Math.floor(Math.random() * 8) + 1;
            var id = "searched_" + rand;

            return React.createElement(
                "div",
                { id: id },
                React.createElement(
                    "a",
                    { href: "" },
                    React.createElement(
                        "h2",
                        null,
                        item.name
                    )
                ),
                React.createElement(
                    "p",
                    null,
                    React.createElement(
                        "span",
                        { className: "highlight" },
                        "Teléfono: "
                    ),
                    item.phone
                ),
                React.createElement(
                    "p",
                    null,
                    React.createElement(
                        "span",
                        { className: "normal" },
                        "Página web: "
                    ),
                    React.createElement(
                        "a",
                        { href: url, target: "_blank" },
                        item.webpage
                    )
                ),
                React.createElement(
                    "p",
                    null,
                    React.createElement(
                        "span",
                        { className: "normal" },
                        "Email: "
                    ),
                    item.email
                ),
                React.createElement(
                    "p",
                    null,
                    React.createElement(
                        "span",
                        { className: "normal" },
                        "Dirección: "
                    ),
                    item.address
                ),
                React.createElement(
                    "p",
                    null,
                    React.createElement("span", { className: "normal" }),
                    item.detail
                )
            );
        };
        return React.createElement(
            "div",
            { className: "content" },
            this.props.items.map(createItem)
        );
    }
});

var Searcher = React.createClass({
    displayName: "Searcher",

    getInitialState: function getInitialState() {
        return {};
    },

    componentDidMount: function componentDidMount() {
        this.serverRequest = $.get(this.props.source, function (result) {
            this.setState({
                items: result
            });
        }.bind(this));
    },

    componentWillUnmount: function componentWillUnmount() {
        this.serverRequest.abort();
    },

    render: function render() {
        var itemsArray = jQuery.makeArray(this.state.items);

        return React.createElement(
            "div",
            null,
            React.createElement(DrawSearch, { items: itemsArray })
        );
    }
});

var sourceString = "http://" + document.domain + "/product_search/salud/Offer";

ReactDOM.render(React.createElement(Searcher, { source: sourceString }), document.getElementById('block-results'));