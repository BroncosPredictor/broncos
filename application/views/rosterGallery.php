<div class="row text-center">
    <form action="/roster/setLayoutSession" method="post" id="forms">
        <select name="layout">
            <option value="">Select a layout</option>
            <option value="gallery">Gallery</option>
            <option value="table">Table</option>
        </select>
        <input type="submit" value="Go!" id="filterGo" />
    </form>
    <form action="/roster/setOrderSession" method="post" id="forms">
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
<div class="row">
    {players}
    <div class="span4 text-center"><a href="/player/{edit}{id}"><img src="/data/{mug}" title="{who}"/></a><br />
        <p>#{num}: {name}<br/>{pos}</p></div>
    {/players}
</div>
<div class="row text-center pagination">
    {pagination}
</div>