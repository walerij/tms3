<style>
    .left {
       /* margin-left: 0.2em;*/
        background: #428bca;
        color: white;;
        text-align: left;
        border-radius: 6px 6px 6px 6px;
    }
</style>
<div class="row" style="margin-top:0.5em">
    <div class="col-lg-3 col-md-3 col-sm-3 left">
        <div>
            <?=$mess->datetime_mess ?>  
              <?=$mess->getUser($mess->from_id)?> 
        </div>
        <div>
            <?=$mess->message ?>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-md-6">
        
    </div>

</div>
