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

use Archict\Router\Exception\HTTP\HTTPException;
use Archict\Router\HTTPExceptionFactory;
use Archict\Router\RequestHandler;
use Fil\Website\Services\Twig;
use Psr\Http\Message\ServerRequestInterface;
use function Psl\File\read;
use function Psl\Filesystem\exists;
use function Psl\Filesystem\is_file;

abstract readonly class AbstractDocController implements RequestHandler
{
    public function __construct(private Twig $twig) {}

    /**
     * @throws HTTPException
     */
    public final function handle(ServerRequestInterface $request): string
    {
        $path = $request->getAttribute('path');
        if ($path === null) {
            $path = 'index';
        }
        $file = $this->toFilePath(urldecode($path));

        if (exists($file) && is_file($file)) {
            $content = read($file);
        } else {
            throw HTTPExceptionFactory::NotFound();
        }

        return $this->twig->render('doc/doc.html.twig', $this->buildPresenter($content));
    }

    abstract protected function buildPresenter(string $content): DocPresenter;

    /**
     * @psalm-pure
     */
    abstract protected function toFilePath(string $path): string;
}
