<div class="row text-center">
    <form action="/roster/setSession" method="post">
        <select name="layout">
            <option value="">Select a layout</option>
            <option value="gallery">Gallery</option>
            <option value="table">Table</option>
        </select>
        <select name="order">
            <option value="">Select an order</option>
            <option value="name">Name</option>
            <option value="num">Jersey Number</option>
            <option value="pos">Position</option>
        </select>
        <input type="submit" value="Go!" id="filterGo" />
    </form>
</div>
<div class="row">
    {players}
    <div class="span4 text-center"><a href="/player/{id}"><img src="/data/{mug}" title="{who}"/></a><br />
        <p>#{num}: {name}</p></div>
    {/players}
</div>
<div class="row text-center">
    {pagination}
</div>