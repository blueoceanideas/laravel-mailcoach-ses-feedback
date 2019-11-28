<?php

namespace Spatie\MailcoachSesFeedback\SesEvents;

use Spatie\Mailcoach\Models\CampaignSend;

class PermanentBounce extends SesEvent
{
    public function canHandlePayload(): bool
    {
        if ($this->payload['eventType'] !== 'Bounce') {
            return false;
        }

        if ($this->payload['bounce']['bounceType'] !== 'Permanent') {
            return false;
        }

        return true;
    }

    public function handle(CampaignSend $campaignSend)
    {
        $campaignSend->registerBounce();
    }
}