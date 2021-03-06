<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php $contactUsLiveChatDetails = $this->wysiwyg("live_chat_details_content", ["width" => 350, "height" => 100]); ?>


<?php if ($this->editmode) : ?>
<div style="width: 1200px;">
<?php endif; ?>

<div class="contact-us__live-chat">
    <div class="contact-us__live-chat__icon">
        <img src="/website/static/images/home/woman_headset2.png" />
    </div>
    <div class="contact-us__live-chat__details" style="margin-bottom:10px;">
        <div class="contact-us__live-chat__details__title">
            Chat
        </div>
        <div class="contact-us__live-chat__details__open-chat">
            <a href="#livechat">Chat now</a>
        </div>
        <div class="contact-us__live-chat__details__content">
            <?= $contactUsLiveChatDetails ?>
        </div>
    </div>
</div>
<?php if ($this->editmode) : ?>
    </div>
<?php endif; ?>