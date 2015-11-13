<div class="row">
    <form action="/roster/setSession" method="post">
        <select name="layout">
            <option value="">Select a layout</option>
            <option value="gallery">Gallery</option>
            <option value="table">Table</option>
        </select>
        <input type="submit" value="Go!" />
    </form>
</div>
<div class="row">
    <table>
        <tr>
            <th>Picture</th>
            <th>Number</th>
            <th>Name</th>
            <th>Position</th>
            <th>Age</th>
        </tr>
        {players}
        <tr>
            <td><img src="/data/{mug}" title="{who}"/></td>
            <td>#{num}</td>
            <td><a href="/player/{id}">{who}</a></td>
            <td>{pos}</td>
            <td>{age}</td>
        </tr>
        {/players}
    </table>
</div>