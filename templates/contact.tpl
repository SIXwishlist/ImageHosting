    <div class="content">
      {if isset($Messages)}{foreach from=$Messages item=Message}<div class="alert alert-success" role="alert">{$Message}</div>{/foreach}{/if}
      <div class="contact">
        <form action="{$Action}" method="POST">
          <label>Message Title:</label>
          <input type="text" required class="form-control" name="MessageTitle">
          <label>E-Mail Address:</label>
          <input type="email" required class="form-control" name="EmailAddress">
          <label>Message:</label>
          <textarea class="form-control" required rows="5" name="MessageContent"></textarea>
          <input type="submit" class="btn btn-success pull-right" value="SUBMIT">
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
