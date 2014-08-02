/** @jsx React.DOM */
var CategoryBox = React.createClass({
    render: function() {
        return (
            <ul class="nav nav-stacked">
                <li><h3 class="highlight">Category<i class="glyphicon glyphicon-dashboard pull-right"></i></h3></li>
                <CategoryList />
            </ul>
        );
    }
});
var CategoryList = React.createClass({
    render: function() {
        return (
            <li></li>
        );
    }
});
React.renderComponent(
    <CategoryBox />,
    document.getElementById('reactCategory')
);
