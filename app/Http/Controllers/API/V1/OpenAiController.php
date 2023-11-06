<?php

namespace App\Http\Controllers\API\V1;


use App\Contracts\OpenAiInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\OpenAi\SearchRequest;
use App\Service\OpenAiService;
use Tectalic\OpenAi\ClientException;

class OpenAiController extends Controller
{

    /*public function __construct(private readonly OpenAiInterface $openAi){
    }*/

    /**
     * @param SearchRequest $request
     * @return array
     * @throws ClientException
     */
    public function searchOpenAi(SearchRequest $request): array
    {
        $content =  $request->search;
        return (new OpenAiService())->searchOpenAi($content)->toArray();
    }


}
