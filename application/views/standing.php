<div class="row">
    <form action="/standing/setSession" method="post">
        <select name="layout">
        {standingLayoutOpts}
            <option {optSelected}>{optValue}</option>
        {/standingLayoutOpts}
        </select>
        <select name="order">
        {standingOrderOpts}
            <option {optSelected}>{optValue}</option>
        {/standingOrderOpts}
        <input type="submit" value="Go!" />
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
                <th>Touchdowns</th>
                <th>Streak</th>
            </tr>
        </thead>
        <tbody>
            {standingsTable}
        </tbody>
    </table>
</div>
