<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use WebPush\Action;
use WebPush\Message;
use WebPush\Notification;
use WebPush\Subscription;
use WebPush\WebPush;

class NotificationController extends AbstractController
{
    public function __construct(
        private readonly WebPush $webpushService
    ) {
    }

    #[Route('/notify', name: 'app_notification', methods: [Request::METHOD_POST])]
    public function __invoke(Request $request): Response
    {

        $message = Message::create('My super Application.', 'Hello World! Clic on the body to go to Facebook')
            //->rtl()
            //->ltr()
            //->renotify()
            //->doNotRenotify()
            ->vibrate(200, 300, 200, 300)
            //->interactionRequired()
            ->withImage('https://picsum.photos/1024/512')
            ->withIcon('https://picsum.photos/512/512')
            ->withBadge('https://picsum.photos/256/256')
            //->withData(['foo' => 'BAR'])
            //->withTag('tag1')
            ->withLang('fr_FR')
            ->mute()
            ->unmute()
            ->auto()
            ->withTimestamp(time()*1000)
            ->addAction(Action::create('google', 'To Google'))
            ->addAction(Action::create('linkedin', 'To LinkedIn'));
        ;
        $notification = Notification::create()
            //->highUrgency()
            ->withPayload($message->toString());
        $subscription = Subscription::createFromString($request->getContent());

        $statusReport = $this->webpushService->send($notification, $subscription);

        return new JsonResponse(
            [
                'error' => ! $statusReport->isSuccess(),
                'links' => $statusReport->getLinks(),
                'location' => $statusReport->getLocation(),
                'expired' => $statusReport->isSubscriptionExpired(),
            ],
            $statusReport->isSuccess() ? 200 : 400,
        );
    }
}
