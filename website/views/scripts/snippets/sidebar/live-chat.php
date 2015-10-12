<?php $contactUsLiveChatDetails = $this->wysiwyg("live_chat_details_content", ["width" => 350, "height" => 100]); ?>

<div class="contact-us__live-chat">
    <div class="contact-us__live-chat__icon">
        <img src="website/static/images/home/woman_headset2.png" />
    </div>
    <div class="contact-us__live-chat__details" style="margin-bottom:10px;">
        <div class="contact-us__live-chat__details__title">
            Chat
        </div>
        <div class="contact-us__live-chat__details__content">
            <?= $contactUsLiveChatDetails ?>
        </div>
        <div class="contact-us__live-chat__details__open-chat">
            <a href="#livechat">Chat now</a>
        </div>
    </div>
</div>