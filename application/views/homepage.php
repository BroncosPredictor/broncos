<div class="row">
    <div class="col-md-8 text-center">
        <h3>Make a prediction:</h3>
            <h5>Broncos vs. <select name="prediction" id="prediction">
                {teams}
                    <option value="{code}">{code}</option>
                {/teams}
            </select></h5>
            <input type="submit" value="Go!" class="btn" id="predictButton" />

        <div class="predicted">
            <h6><span id="predictResult"></span></h6>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 text-center">
        
    </div>
</div>

<div class="row">
    <div class="col-md-8 text-center">
        <p>We are building a small but complete webapp to predict NFL game outcomes for the Denver Broncos. This will be accomplished in three stages using the Code Igniter framework.</p>
        <p>This site may contain copyrighted material the use of which has not always been specifically authorized by the copyright owner. We are using this material in an effort to advance understanding of the CodeIgniter MVC framework. We believe this constitutes a ‘fair use’ of any such copyrighted material as provided for in section 107 of the US Copyright Law.</p>
    </div>
</div>