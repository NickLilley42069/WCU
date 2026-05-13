<h1>Staff Chat</h1>

<div id="chatWrapper">

    <div id="chatFeed">
        <?php foreach ($chatLogs as $log): ?>
            <?php $isMine = ($log->staff_id === $loggedInStaffId); ?>

            <div class="chatBubbleWrap <?= $isMine ? 'mine' : 'theirs' ?>">

                <?php if (!$isMine): ?>
                    <p class="senderName"><?= htmlspecialchars($log->sender_name) ?></p>
                <?php endif; ?>

                <div class="chatBubble <?= $isMine ? 'bubbleMine' : 'bubbleTheirs' ?>">
                    <p class="messageText"><?= htmlspecialchars($log->message) ?></p>
                    <p class="messageTime"><?= date('H:i', strtotime($log->timestamp)) ?></p>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <div id="chatInputBar">
        <input type="text" id="chatInput" placeholder="Type a message..." />
        <button id="sendBtn">Send</button>
    </div>

</div>

<style>
   
</style>

<script>
    const feed = document.getElementById('chatFeed');
    feed.scrollTop = feed.scrollHeight;

    const sendBtn   = document.getElementById('sendBtn');
    const chatInput = document.getElementById('chatInput');

    function sendMessage() {
        const msg = chatInput.value.trim();
        if (msg === '') return;

        const wrap = document.createElement('div');
        wrap.className = 'chatBubbleWrap mine';

        const bubble = document.createElement('div');
        bubble.className = 'chatBubble bubbleMine';

        const now     = new Date();
        const timeStr = now.getHours().toString().padStart(2,'0') + ':' + now.getMinutes().toString().padStart(2,'0');

        bubble.innerHTML = `<p class="messageText">${msg}</p><p class="messageTime">${timeStr}</p>`;
        wrap.appendChild(bubble);
        feed.appendChild(wrap);

        chatInput.value = '';
        feed.scrollTop  = feed.scrollHeight;
    }

    sendBtn.addEventListener('click', sendMessage);

    chatInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
</script>

