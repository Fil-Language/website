<?php
/**
 * MIT License
 *
 * Copyright (c) 2025-Present Kevin Traini
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

namespace Fil\Website\Controller\Doc;

use function Psl\Str\split;
use function Psl\Str\trim;
use function Psl\Str\trim_left;

final readonly class RefController extends AbstractDocController
{
    protected function buildPresenter(string $content): DocPresenter
    {
        $lines = split($content, "\n");
        if ($lines[0][0] === '#') {
            $short_title = trim(trim_left($lines[0], '#'));
            $title       = 'References - ' . $short_title;
        } else {
            $short_title = '';
            $title       = 'References';
        }

        return new DocPresenter($title, $short_title, '/ref', [
            // TODO: define the toc
        ], $content);
    }

    /**
     * @psalm-pure
     */
    protected function toFilePath(string $path): string
    {
        return __DIR__ . "/../../../public/files/ref/$path.md";
    }
}
