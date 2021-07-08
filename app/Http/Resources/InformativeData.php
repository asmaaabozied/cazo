<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InformativeData extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $header = request()->header('Accept-Language');

        $attribute = "";
        $content   = "";

        if(isset($this->about_en)){
            $about = "about_" . $header;
            $attribute = "about";
            $content   = $this->$about;
        }

        if(isset($this->terms_conditions_en)){
            $terms = "terms_conditions_" . $header;
            $attribute = "terms_conditions";
            $content   = $this->$terms;
        }

        if(isset($this->privecy_en)){
            $privacy = "privecy_" . $header;
            $attribute = "privacy";
            $content   = $this->$privacy;
        }

        if(isset($this->facebook_link)){
            return [
                'instagrem_link'  => $this->instagram_link,
                'snapchat_link'   => $this->snapchat_link,
                'facebook_link'   => $this->facebook_link,
                'twitter_link'    => $this->twitter_link
            ];
        }

        return [
            $attribute   => $content
        ];
    }
}
