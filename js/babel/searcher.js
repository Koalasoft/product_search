Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

var DrawSearch = React.createClass({
    render: function() {
        var createItem = function(item) {
            return (
                <div id="searched_1">
                    <a href="product/233"><h2>{item.name}</h2></a>
                    <p><span class="highlight">Phone: </span>{item.phone}</p>
                    <p><span class="normal">Webpage: </span><a href="" target="_blank">{item.webpage}</a></p>
                    <p><span class="normal">Address: </span>{item.address}</p>
                </div>
            );
        };
        return <div class="content">{this.props.items.map(createItem)}</div>;
    }
});

var Searcher = React.createClass({
    getInitialState: function() {
        return {};
    },

    componentDidMount: function() {
        this.serverRequest = $.get(this.props.source, function (result) {
            this.setState({
                items: result,
                title: "buttonX"
            });
        }.bind(this));
    },

    componentWillUnmount: function() {
        this.serverRequest.abort();
    },

    render: function() {
        console.log(this.state.items);
        var itemsArray = jQuery.makeArray( this.state.items );

        return (
            <div>
                <DrawSearch items={itemsArray} />
            </div>
        );
    }
});

ReactDOM.render(
    <Searcher source="http://www.devsiquesi.com/product_search/Desarrollo/Offer" />,
    document.getElementById('block-results')
);