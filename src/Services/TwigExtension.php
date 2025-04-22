<?php
/**
 * MIT License
 *
 * Copyright (c) 2024-Present Kevin Traini
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

declare(strict_types=1);

namespace Fil\Website\Services;

use LogicException;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use function Psl\Json\decode as psl_json_decode;

final class TwigExtension extends AbstractExtension
{
    private const VITE_MANIFEST = __DIR__ . '/../../public/js/.vite/manifest.json';

    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'asset',
                static fn(string $type, string $name) => match ($type) {
                    'css'   => "<link rel='stylesheet' href='/css/$name.css'/>",
                    'js'    => self::getJSScript($name),
                    default => throw new LogicException("Found asset type $type, but this is not handled"),
                },
                [
                    'is_safe' => ['html'],
                ]
            ),
            new TwigFunction(
                'assetPath',
                static fn(string $type, string $name) => match ($type) {
                    'img', 'image' => "/img/$name",
                    default        => throw new LogicException("Found asset type $type, but this is not handled"),
                },
            ),
        ];
    }

    private static function getJSScript(string $name): string
    {
        $manifest_text = file_get_contents(self::VITE_MANIFEST);
        if ($manifest_text === false) {
            throw new LogicException('Vite manifest not found, assets are not build');
        }

        $manifest_json = psl_json_decode($manifest_text);
        if (!isset($manifest_json[$name])) {
            throw new LogicException("App '$name' not found");
        }

        $path = $manifest_json[$name]['file'];
        $tag  = "<script type='application/javascript' src='/js/$path' defer></script>";

        if (isset($manifest_json[$name]['css'])) {
            foreach ($manifest_json[$name]['css'] as $css_asset) {
                $tag .= "<link rel='stylesheet' href='/js/$css_asset' />";
            }
        }

        return $tag;
    }
}
