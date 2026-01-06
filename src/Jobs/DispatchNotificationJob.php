<?php declare(strict_types=1);

namespace Rat\eBaySDK\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Rat\eBaySDK\Services\NotificationDispatcherService;

class DispatchNotificationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     *
     * @param string $content
     * @param array $headers
     * @param null|string $token
     * @return void
     */
    public function __construct(
        public readonly string $content,
        public readonly array $headers,
        public readonly ?string $token = null,
    ) {}

    /**
     *
     * @param NotificationDispatcherService $dispatcher
     * @return void
     */
    public function handle(NotificationDispatcherService $dispatcher): void
    {
        $dispatcher->handle($this->content, $this->headers, $this->token);
    }
}
