<div class="row">
    <form action="/standing/setSession" method="post">
        
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Layout:</th>
                <th>Order:</th>
                <th>Data Source:</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
        <select name="layout">
        {standingLayoutOpts}
            <option {optSelected}>{optValue}</option>
        {/standingLayoutOpts}
        </select>
                </td>
        
                <td>
        <select name="order">
        {standingOrderOpts}
            <option {optSelected}>{optValue}</option>
        {/standingOrderOpts}
        </select>
                </td>
        
                <td>
        <select name="dataSource">
        {dataSourceOpts}
            <option {optSelected}>{optValue}</option>
        {/dataSourceOpts}
        </select>
                </td>
                <td>
        <input type="submit" value="Go!" />
                </td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
        </tbody>
    </form>
</div>
<div class="row">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Wins</th>
                <th>Loses</th>
                <th>Ties</th>
                <th>Net Points</th>
                <th>Streak</th>
            </tr>
        </thead>
        <tbody>
            {standingsTable}
        </tbody>
    </table>
</div>
