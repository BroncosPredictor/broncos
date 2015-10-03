<table class="table table-condensed">
    <thead>
        <tr>
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
        {conferences}
        <tr><td colspan="7"><h5>{conference}</h5></td></tr>
        {groups}
        <tr><td colspan="7"><h6>{group}</h6></td></tr>
        {teams}
        <tr>
            <td>{name}</td>
            <td>{wins}</td>
            <td>{loses}</td>
            <td>{ties}</td>
            <td>{netPts}</td>
            <td>{touchdowns}</td>
            <td>{streak}</td>
        </tr>
        {/teams}
        {/groups}
        {/conferences}
    </tbody>
  </table>
