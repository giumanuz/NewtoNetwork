<div id='messagePopup' class='comment-popup' style='overflow:hidden;'>
    <div class='popup-content' style='overflow:hidden;'>
        <div class='headerComments' style='overflow:hidden;'>
            <h4>Write a message</h4>
            <button class='material-symbols-outlined topright' id='messageClosePopup'> close </button>
        </div>
        <hr>
        <div class="alert alert-danger fade" role="alert" id="errorAlert" style='display:none;'>
            <strong>Error!</strong> <span id="errorAlertText"> </span>
        </div>
        <form name='messageForm'  id="messageFormId">
            <input name='friend' type='text' id='messageReceiver' class='comment-input' style='max-width:100%;' placeholder='Receiver' >

            <input name='message' type='text' id='messageContent' class='message-input' placeholder='Content' style='margin-top:1.5rem;max-width:100%;'></input>
            <br>
            <button name='messageSend' type="button submit" class="btn btn-primary"
                    style="margin-top:1rem;border-radius:var(--border-radius);border:none;background-color: var(--color-primary);">
                Send
            </button>

        </form>
    </div>
</div>
