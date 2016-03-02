"use strict";

var DrawSearch = React.createClass({
    displayName: "DrawSearch",

    render: function render() {
        var createItem = function createItem(item) {
            var url = "http://" + item.webpage;
            var rand = Math.floor(Math.random() * 8) + 1;
            var id = "searched_" + rand;

            console.log("Trooo:", rand);

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
                        { "class": "highlight" },
                        "Phone: "
                    ),
                    item.phone
                ),
                React.createElement(
                    "p",
                    null,
                    React.createElement(
                        "span",
                        { "class": "normal" },
                        "Webpage: "
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
                        { "class": "normal" },
                        "Email: "
                    ),
                    item.email
                ),
                React.createElement(
                    "p",
                    null,
                    React.createElement(
                        "span",
                        { "class": "normal" },
                        "Address: "
                    ),
                    item.address
                ),
                React.createElement(
                    "p",
                    null,
                    React.createElement("span", { "class": "normal" }),
                    item.detail
                )
            );
        };
        return React.createElement(
            "div",
            { "class": "content" },
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
        console.log("render:", this.state.items);
        var itemsArray = jQuery.makeArray(this.state.items);

        return React.createElement(
            "div",
            null,
            React.createElement(DrawSearch, { items: itemsArray })
        );
    }
});

ReactDOM.render(React.createElement(Searcher, { source: "http://www.devsiquesi.com/product_search/salud/Offer" }), document.getElementById('block-results'));