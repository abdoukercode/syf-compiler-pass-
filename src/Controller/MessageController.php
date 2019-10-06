<?php
namespace App\Controller;

use App\Strategy\Message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures\AbstractClassController;

/**
 * @Route("/messages")
 */
class MessageController extends AbstractClassController
{
    private $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * @Route("/{type}" , methods={"POST"})
     * @param Request $request
     * @param string $type
     * @return Response
     */
    public function index(Request $request, string $type)
    {
        $payload = json_decode($request->getContent(), true);

        $this->message->send($type, $payload);

        return new Response('OK');
    }
}