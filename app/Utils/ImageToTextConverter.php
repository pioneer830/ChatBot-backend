<?php

namespace App\Utils;


use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Likelihood;

class ImageToTextConverter
{

    const API_KEY = "AIzaSyAhmcy97eGfwLymWsw1mLrxQm1PUWAR7l0";
    private string $image = "";

    public function setImagePath($image): ImageToTextConverter
    {
        $this->image = $image;

        return $this;
    }

    public function convertImageToText(): string
    {
        $response_text = "";

        try {
            $client = new ImageAnnotatorClient();
            $client->setImage($this->image_path);
            $client->setFeature("TEXT_DETECTION");

            $google_request = new GoogleCloudVision([$client],  self::API_KEY);

            $response_text = $google_request->annotate();

        }catch (\Exception $ex){
            dd($ex->getMessage());
        }

        return $response_text;
    }

}
