<h1>Staff Chat</h1>

<div id="chatWrapper">

    <div id="chatFeed">
        <?= $messagesOutput ?>
    </div>

    <div id="chatInputBar">

        <form action="/send" method="POST">

            <input type="text" name="message" placeholder="Type a message..." required>

            <input type="hidden" name="tempSessionID" value="<?= $tempSessionID?>">

            <button type="submit">Send</button>

        </form>

    </div>

</div>

<?php
?> 