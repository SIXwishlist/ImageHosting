    <div class="content">
      <div class="gallery">
        {if $CountImages gt "0"}
        {foreach from=$Images item=Query}
        <div class="col-md-3 col-sm-4 col-xs-6 thumb">
          <a class="thumbnail" href="http://{$Host}/{$Query.ShortURL}" target="_blank">
            <img class="img-responsive" src="http://{$Host}/{$Query.ImageURL}" alt="{$Query.ImageName}">
          </a>
        </div>
        {/foreach}
        {/if}
        <div class="clearfix"></div>
      </div>
    </div>
