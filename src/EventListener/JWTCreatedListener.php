<?php

namespace App\EventListener;

use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\User\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;



class JWTCreatedListener
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var UserInterface
     */
    private $user;

    
   
    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack, Security $security)
    {
        $this->requestStack = $requestStack;
        $this->user = $security->getUser();        
    }

    
    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $request = $this->requestStack->getCurrentRequest();
        
        /*$expiration = new \DateTime('+1 day');
        $expiration->setTime(2, 0, 0);*/

        $payload        = $event->getData();
        /*$payload['exp'] = $expiration->getTimestamp();   */     
        $payload['ip'] = $request->getClientIps();
        $payload['URI'] = $request->getUri();
        $payload['URI Request'] = $request->getRequestUri();        

        $payload['id'] = $this->user->getId();
        $payload['lastname'] = $this->user->getLastname();
        $payload['firstname'] = $this->user->getFirstname();
        $payload['pseudo'] = $this->user->getPseudo();
        $payload['email'] = $this->user->getEmail();
        $payload['age'] = $this->user->getAge();
        $payload['nationality'] = $this->user->getNationality();
        $payload['picture'] = $this->user->getPicture();


        $event->setData($payload);

    }
   
   
}

