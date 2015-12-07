<div class="row text-center">
    <form action="/roster/setLayoutSession" method="post">
        <select name="layout">
            <option value="">Select a layout</option>
            <option value="gallery">Gallery</option>
            <option value="table">Table</option>
        </select>
        <input type="submit" value="Go!" id="filterGo" />
    </form>
    <form action="/roster/setOrderSession" method="post">
        <select name="order">
            <option value="">Select an order</option>
            <option value="name">Name</option>
            <option value="num">Jersey Number</option>
            <option value="pos">Position</option>
        </select>
        <input type="submit" value="Go!" id="filterGo" />
    </form>
    <div style="display: {displayAddBtn};" >
        <a href="/player/new" class="btn addButton" role="button">New Player</a>
    </div>
</div>
<div class="row text-center">
    <table class="table table-condensed rosterTable">
        <thead>
            <tr>
                <th>Picture</th>
                <th>Number</th>
                <th>Name</th>
                <th>Position</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            {players}
            <tr>
                <td><img src="/data/{mug}" title="{who}"/></td>
                <td>#{num}</td>
                <td><a href="/player/{edit}{id}">{name}</a></td>
                <td>{pos}</td>
                <td>{age}</td>
            </tr>
            {/players}
        </tbody>
    </table>
</div>
<div class="row text-center pagination">
    {pagination}
</div>