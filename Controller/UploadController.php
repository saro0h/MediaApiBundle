<?php

namespace Saro0h\MediaApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UploadController extends Controller
{
    public function uploadAction(Request $request)
    {
        $file = $request->files->get($this->container->getParameter('media_api.field_name'));
        $filename = $request->get('filename');

        if (is_null($file)) {
            throw new HttpException(Response::HTTP_BAD_REQUEST, 'There is no file supplied.');
        }

        $media = $this->get('media_api.upload')->upload($file, $filename);

        $response = new Response($this->get('jms_serializer')->serialize(array('media' => $media), 'json'));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
