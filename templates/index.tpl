    <div class="content">
      {if isset($SuccessMessages)}{foreach from=$SuccessMessages item=Message}<div class="alert alert-success" role="alert">{$Message}</div>{/foreach}{/if}
      {if isset($ErrorMessages)}{foreach from=$ErrorMessages item=Message}<div class="alert alert-danger" role="alert">{$Message}</div>{/foreach}{/if}
      <div class="upload">
        <div class="content">
          <form action="{$Action}" method="POST" enctype="multipart/form-data">
            <div class="file">
              <input type="text" id="ImageUploadName" readonly class="form-control" placeholder="No file selected">
              <span class="btn btn-info btn-file pull-right">
                Browse
                <input type="file" id="ImageUpload" name="ImageUpload">
              </span>
            </div><br/><br/>
            Private Upload: <input type="checkbox" checked name="PrivateUpload"><br/>
            <input type="submit" class="btn btn-success" value="UPLOAD">
          </form>
        </div>
      </div>
    </div>
    {if $UploadOK eq "1"}
    <div class="content">
      <div class="upload-links">
        <div class="col-xs-6">
         <a href="http://{$Host}/{$ImageInfo.ShortURL}" class="thumbnail" target="_blank">
           <img src="http://{$Host}/{$ImageInfo.URL}" alt="{$ImageInfo.Name}" />
         </a>
       </div>
        <div class="links-input">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Short Link:</span>
            <input type="text" class="form-control" readonly onclick="javascript:this.focus();this.select();" value="http://{$Host}/{$ImageInfo.ShortURL}" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Direct Link:</span>
            <input type="text" class="form-control" readonly onclick="javascript:this.focus();this.select();" value="http://{$Host}/{$ImageInfo.URL}" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Forum Code:</span>
            <input type="text" class="form-control" readonly onclick="javascript:this.focus();this.select();" value='[URL="http://{$Host}/{$ImageInfo.ShortURL}"][IMG]http://{$Host}/{$ImageInfo.URL}[/IMG][/URL]' aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">HTML Code:</span>
            <input type="text" class="form-control" readonly onclick="javascript:this.focus();this.select();" value='<a href="http://{$Host}/{$ImageInfo.ShortURL}"><img src="http://{$Host}/{$ImageInfo.URL}" alt="{$ImageInfo.Name}"></a>' aria-describedby="basic-addon1">
          </div>
        </div>
      </div>
    </div>
    {/if}
