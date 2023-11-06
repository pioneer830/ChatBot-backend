<?php

namespace App\Repositories;

use App\Contracts\OpenAiInterface;
use App\Contracts\OpenAiServiceInterface;
use OpenAI\Responses\Chat\CreateResponse;
use Tectalic\OpenAi\ClientException;
use Tectalic\OpenAi\Models\AbstractModel;
use Tectalic\OpenAi\Models\AbstractModelCollection;

class OpenAiRepository implements OpenAiInterface
{

    public function __construct(private readonly OpenAiServiceInterface $service){}

    /**
     * @param string $content
     * @return mixed|object|CreateResponse|AbstractModel|AbstractModelCollection
     * @throws ClientException
     */
    public function searchOpenAi( string $content): mixed
    {
        return $this->service->searchOpenAi($content);
    }
}
