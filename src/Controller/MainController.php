<?php

namespace App\Controller;

use App\Entity\IpLog;
use App\Repository\IpLogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MainController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    #[Route('/', name: 'app_main')]
    public function index(Request $request, IpLogRepository $logRepository, HttpClientInterface $client): Response
    {

        $ipLog = new IpLog();
        $ipLog->setIpv4($request->getClientIp());
        $info = $this->fetchIpInfo($ipLog->getIpv4(), $client);
        $ipLog->setData($info);
        dd($ipLog);
    }

    /**
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function fetchIpInfo(string $ip, HttpClientInterface $client): string {
        $response = $client->request(
            'GET',
            'https://proxycheck.io/v2/'.$ip.'?vpn=1&asn=1'
        );

        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        return $response->getContent();
    }
}
