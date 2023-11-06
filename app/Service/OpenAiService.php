<?php

namespace App\Service;

use App\Contracts\OpenAiServiceInterface;
use GuzzleHttp\Client;
use Mockery\Exception;
use OpenAI\Responses\Chat\CreateResponse;
use OpenAI;
use Tectalic\OpenAi\Authentication;
use Tectalic\OpenAi\ClientException;
use Tectalic\OpenAi\Manager;
use Tectalic\OpenAi\Models\AbstractModel;
use Tectalic\OpenAi\Models\AbstractModelCollection;
use Tectalic\OpenAi\Models\ChatCompletions\CreateRequest;

class OpenAiService implements OpenAiServiceInterface
{
    const  MAX_TOKENS = 4096;

    private OpenAI\Client $client;
    private \Tectalic\OpenAi\Client $openAiClient;

    public function __construct()
    {
        $OPEN_AI_KEY = config("app.OPEN_AI_KEY");
        $this->client = OpenAI::client($OPEN_AI_KEY);
        $this->openAiClient = Manager::build(new Client(), new Authentication($OPEN_AI_KEY));
    }

    /**
     * @param $content
     * @return mixed|object|CreateResponse|AbstractModel|AbstractModelCollection
     * @throws ClientException
     */
    public function searchOpenAi($content): mixed
    {
        try {
            return $this->client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'temperature' => 0,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $content
                    ],
                ],
            ]);
        }catch (Exception $e){
            return $this->searchOpenAi2($content);
        }
    }

    /**
     * @param $content
     * @return mixed|object|CreateResponse|AbstractModel|AbstractModelCollection
     * @throws ClientException
     */
    public function searchOpenAi2($content): mixed
    {
        try {
        return $this->openAiClient->chatCompletions()->create(
            new CreateRequest([
                'model' => 'gpt-3.5-turbo',
                'temperature' => 0,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $content
                    ],
                ],
            ]))->toModel();
        }catch (Exception $e){
            return $this->searchOpenAi($content);
        }
    }


    /**
     * @param array $services
     * @param array $keywords
     * @return array
     * @throws ClientException
     */
    public function groupKeywordIntoServices(array $services, array $keywords): array
    {
        //$services = ['Fashion', 'Electronics', 'Vehicles'];
        ///$keywords = ['baby wears', 'Adidas foot wear', 'Toyota', 'Mercedes Benz', 'Apple watch', 'samsung LED', 'Macbook pro'];
        $responses = [];
        $servicesContent = "use the following array " . json_encode($services) . " as array key to group this data ". json_encode($keywords) . " return them as json";
        $servicesTokens = str_word_count($servicesContent);
        $maxKeywordTokens = self::MAX_TOKENS - $servicesTokens;
        $keywordChunks = [];
        $chunk = [];
        $chunkTokens = 0;
        foreach ($keywords as $keyword) {
            $keywordTokens = str_word_count($keyword);
            if (($chunkTokens + $keywordTokens) > $maxKeywordTokens) {
                $keywordChunks[] = $chunk;
                $chunk = [$keyword];
                $chunkTokens = $keywordTokens;
            } else {
                $chunk[] = $keyword;
                $chunkTokens += $keywordTokens;
            }
        }

        if (!empty($chunk)) {
            $keywordChunks[] = $chunk;
        }

        foreach ($keywordChunks as $chunk) {
            $content = "use the following array " . json_encode($services) . " as array key to group this data " . json_encode($chunk) . " return them as json";
            try {
                $result = $this->searchOpenAi($content)->toArray();
            }catch (\Exception $e){
                $result = $this->searchOpenAi2($content)->toArray();
            }
            $newKeywords = json_decode($result['choices'][0]['message']['content'], true);

            if (!empty($newKeywords)) {
                $responses[] = array_merge_recursive($responses, $newKeywords);
            }
        }
        return $responses;
    }

}
