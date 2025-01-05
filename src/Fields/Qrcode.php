<?php

declare(strict_types=1);

namespace Geekstek\Qrcode\Fields;

use chillerlan\QRCode\Output\QROutputInterface;
use chillerlan\QRCode\QRCode as baseQRCode;
use chillerlan\QRCode\QROptions as baseQROptions;
use Geekstek\Qrcode\Components\Thumbnails;
use Illuminate\Contracts\Support\Renderable;
use MoonShine\UI\Fields\Image;

final class Qrcode extends Image
{
    protected string $view = 'moonshine-qrcode::fields.qrcode';

    protected function resolvePreview(): Renderable|string
    {
        $opts = new baseQROptions([
            // 'outputType' => QROutputInterface::IMAGICK,
            // 'imagickFormat' => 'webp',
            'outputBase64' => true,
            'version' => 7,
            'returnResource' => true,
        ]);
        $qrcode = (new baseQRCode($opts))->render($this->toValue());
        // $qrcode->scaleImage(250, 250, true);

        // \Debugbar::info($qrcode->getImageBlob());
        return Thumbnails::make(
            $qrcode,
        )
            ->render();
    }
}
