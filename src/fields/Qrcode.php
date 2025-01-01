<?php

declare(strict_types=1);

namespace App\MoonShine\Fields;

use MoonShine\UI\Fields\Image;
use MoonShine\AssetManager\Css;
use MoonShine\AssetManager\Js;
use Illuminate\Contracts\Support\Renderable;
use MoonShine\UI\Components\Thumbnails;

final class Qrcode extends Image
{
    protected string $view = 'moonshine-qrcode::fields.qrcode';

    protected function resolvePreview(): Renderable|string
    {
        \Debugbar::info($this->toValue());
        return Thumbnails::make(
            $this->getFiles()->first(),
        )->render();
    }

    // public function assets(): array
    // {
    //     return [
    //         Css::make('/css/moonshine/quill/quill.snow.css'), // theme
    //         Js::make('/js/moonshine/quill/quill.js'), // library
    //         Js::make('/js/moonshine/quill/quill-init.js'), // initialization
    //     ];
    // }
}