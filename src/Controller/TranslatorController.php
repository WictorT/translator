<?php
namespace App\Controller;

use Stichoza\GoogleTranslate\TranslateClient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TranslatorController extends Controller
{
    public function translateAction(Request $request) {
        $sourceLanguage = $request->query->get('source_language');
        $targetLanguage = $request->query->get('target_language');
        $text = $request->query->get('text');

        $tr = new TranslateClient($sourceLanguage, $targetLanguage);

        $result = $tr->translate($text);

        return new Response($result);
    }
}
