<style>
    .right {
        /* margin-left: 0.2em;*/
        background: #FFE0E1;
        color: green;
        text-align: right;
        border-radius: 6px 6px 6px 6px;
        padding: 2em;
    }
</style>
<div class="row" style="margin-top:0.5em">
    <div class="col-lg-9 col-md-9 col-sm-9">

    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 right">
        <div>
            <?= $mess->message ?>
            <span class="">
                <?= $mess->datetime_mess ?> 
            </span>

        </div>
    </div>
</div>


