<div class="row" style="display: {displayErr};">
    <div class="alert alert-danger col-md-12" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        {errMsg}
    </div>
</div>

<div class="row">

    <div class="span4 text-right"><img src="/data/{mug}" title="Add image"/>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <form role="form" action="/playerCRUD/submit" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pos">Mug shot:</label>
            <input type="file" id="mug" name="mug">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{who}">
        </div>
        
        <div class="form-group">
            <label for="pos">Position:</label>
            <select class="form-control" id="pos" name="pos">
                {posOpts}
                    <option {optSelected}>{optValue}</option>
                {/posOpts}
            </select>
        </div>
        
        <div class="form-group">
            <label for="auxPos">Auxiliary position:</label>
            <select class="form-control" id="auxPos" name="auxPos">
                {auxPosOpts}
                    <option {optSelected}>{optValue}</option>
                {/auxPosOpts}
            </select>
        </div>
        
        <div class="form-group">
            <label for="num">Number:</label>
            <input type="number" class="form-control" id="num" name="num" value="{num}">
        </div>
        
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" value="{age}">
        </div>
        <input type="hidden" name="isNew" value="{isNew}">
        <input type="hidden" name="id" value="{id}">
        <button type="submit" class="btn btn-default" name="submit" value="cancel">Cancel</button>
        <button type="submit" class="btn btn-default" name="submit" value="save">Save</button>
        <button type="submit" class="btn btn-default" name="submit" value="delete" {deleteDisable}>Delete</button>
    </form>
</div>
    