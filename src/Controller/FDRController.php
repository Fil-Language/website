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

namespace Fil\Website\Controller;

use Archict\Router\Exception\HTTP\HTTPException;
use Archict\Router\HTTPExceptionFactory;
use Archict\Router\RequestHandler;
use Fil\Website\Services\Twig;
use Psr\Http\Message\ServerRequestInterface;
use function Psl\File\read;
use function Psl\Filesystem\exists;
use function Psl\Filesystem\is_file;

final readonly class FDRController implements RequestHandler
{
    public function __construct(private Twig $twig)
    {
    }

    /**
     * @throws HTTPException
     */
    public function handle(ServerRequestInterface $request): string
    {
        $request_file = $request->getAttribute('title');
        if ($request_file === null) {
            return $this->twig->render('fdr-list.html.twig', [
                'records' => [
                    FDRPresenter::fromName('000 - Introduction to FDR'),
                ],
            ]);
        }

        $file = $this->toFDRPath(urldecode($request_file));
        if (exists($file) && is_file($file)) {
            $content = read($file);
        } else {
            throw HTTPExceptionFactory::NotFound();
        }

        return $this->twig->render('fdr.html.twig', [
            'title'   => urldecode($request_file),
            'content' => $content,
            'file'    => $this->toFDRDownloadLink(urldecode($request_file)),
        ]);
    }

    /**
     * @psalm-pure
     */
    private function toFDRPath(string $request_file): string
    {
        return __DIR__ . "/../../public/fdr/$request_file.md";
    }

    private function toFDRDownloadLink(string $request_file): string
    {
        return "/fdr/$request_file.md";
    }
}
