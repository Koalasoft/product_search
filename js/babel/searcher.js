var DrawSearch = React.createClass({
    render: function() {
        var createItem = function(item) {
            var url = "http://" + item.webpage;
            var rand = Math.floor(Math.random() * 8) + 1;
            var id = "searched_" + rand;

            console.log("Trooo:", rand);

            return (
                <div id={id}>
                    <a href=""><h2>{item.name}</h2></a>
                    <p><span class="highlight">Phone: </span>{item.phone}</p>
                    <p><span class="normal">Webpage: </span><a href={url} target="_blank">{item.webpage}</a></p>
                    <p><span class="normal">Email: </span>{item.email}</p>
                    <p><span class="normal">Address: </span>{item.address}</p>
                    <p><span class="normal"></span>{item.detail}</p>
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
            });
        }.bind(this));
    },

    componentWillUnmount: function() {
        this.serverRequest.abort();
    },

    render: function() {
        console.log("render:", this.state.items);
        var itemsArray = jQuery.makeArray( this.state.items );

        return (
            <div>
                <DrawSearch items={itemsArray} />
            </div>
        );
    }
});

ReactDOM.render(
    <Searcher source="http://www.devsiquesi.com/product_search/salud/Offer" />,
    document.getElementById('block-results')
);