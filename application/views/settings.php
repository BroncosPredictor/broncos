<div class="row" style="display: {displayErr};">
    <div class="alert alert-danger col-md-12" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        {errMsg}
    </div>
</div>
<div class="row">
    
    <div class="col-md-8 text-center">
        <p>Editing status: {editStatus}</p>
        <a href="/settings/editToggle/{editToggle}" class="btn btn-info btn-block" role="button">{editToggle} editing</a>
        <a href="/settings/syncHistoryData" class="btn btn-info btn-block" role="button">Update games data</a>
    </div>
    
</div>
