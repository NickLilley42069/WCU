<?php
// Dummy chatLog objects for testing


class chatLogDummy {
    public $message_id;
    public $staff_id;
    public $sender_name;
    public $message;
    public $timestamp;

    public function __construct($id, $staff_id, $name, $message, $timestamp) {
        $this->message_id  = $id;
        $this->staff_id    = $staff_id;
        $this->sender_name = $name;
        $this->message     = $message;
        $this->timestamp   = $timestamp;
    }
}

// Dummy messages ordered oldest to newest
$chatLogs = [
    new chatLogDummy(1, 101, 'Dr. Simon White',  'Morning everyone — can someone check the Year 1 attendance logs from yesterday?', '2026-05-12 08:34:00'),
    new chatLogDummy(2, 102, 'Dr. Raj Singh',    'On it, pulling them up now.', '2026-05-12 08:36:00'),
    new chatLogDummy(3, 103, 'Adam Blake',        'Also flagging that two students submitted late — do we action that today?', '2026-05-12 08:40:00'),
    new chatLogDummy(4, 101, 'Dr. Simon White',  'Yes please — generate the cause for concern letters and file them.', '2026-05-12 08:42:00'),
    new chatLogDummy(5, 102, 'Dr. Raj Singh',    'Attendance logs checked. Three students missed all of last week.', '2026-05-12 08:45:00'),
    new chatLogDummy(6, 103, 'Adam Blake',        'Letters drafted. Will send this afternoon once reviewed.', '2026-05-12 09:01:00'),
];

// Logged in staff ID — hardcoded for now, will come from session later
$loggedInStaffId = 103;
?>

<?php require "../../Includes/RMS-Mockup-HEADER.html"; ?>

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
    #chatWrapper {
        display: flex;
        flex-direction: column;
        height: 75vh;
        margin: 2% 5%;
        border-radius: 12px;
        overflow: hidden;
        background-color: #80748c2a;
        box-shadow: 0px 8px 20px rgba(0,0,0,0.25);
    }

    #chatFeed {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        scroll-behavior: smooth;
    }

    .chatBubbleWrap {
        display: flex;
        flex-direction: column;
        max-width: 60%;
    }

    .mine   { align-self: flex-end;   align-items: flex-end; }
    .theirs { align-self: flex-start; align-items: flex-start; }

    .senderName {
        font-size: 12px;
        color: #6D5C7C;
        font-weight: 600;
        margin-bottom: 3px;
        padding-left: 4px;
        text-align: left;
    }

    .chatBubble {
        padding: 10px 15px;
        border-radius: 16px;
        max-width: 100%;
        text-align: left;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    .bubbleMine {
        background-color: #8A038C;
        color: white;
        border-bottom-right-radius: 4px;
    }

    .bubbleTheirs {
        background-color: #F2BBC9;
        color: #2b2b2b;
        border-bottom-left-radius: 4px;
    }

    .messageText {
        font-size: 14px;
        margin-bottom: 4px;
    }

    .messageTime {
        font-size: 10px;
        opacity: 0.7;
        text-align: right;
    }

    #chatInputBar {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        background-color: #6D5C7C;
        border-top: 2px solid #8A038C;
    }

    #chatInput {
        flex: 1;
        padding: 12px 16px;
        border-radius: 25px;
        border: none;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        background-color: #f5f0f7;
        color: #2b2b2b;
        outline: none;
    }

    #chatInput:focus {
        background-color: #fff;
        box-shadow: 0 0 0 2px #F2BBC9;
    }

    #sendBtn {
        width: auto;
        height: auto;
        padding: 10px 22px;
        background-color: #8A038C;
        color: white;
        border-radius: 25px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    #sendBtn:hover {
        background-color: #F2BBC9;
        color: #2b2b2b;
    }
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

<?php require "../../Includes/RMS-Mockup-FOOTER.html"; ?>