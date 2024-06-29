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

namespace Archict\Archict\Controller;

use Archict\Archict\Services\Twig;
use Archict\Router\RequestHandler;
use Psr\Http\Message\ServerRequestInterface;

final readonly class HomeController implements RequestHandler
{
    public function __construct(private Twig $twig)
    {
    }

    public function handle(ServerRequestInterface $request): string
    {
        $backgrounds = [
            'linear-gradient(to right, #f0c27b, #4b1248)',
            'linear-gradient(to right, #ff4e50, #f9d423)',
            'linear-gradient(to right, #add100, #7b920a)',
            'linear-gradient(to right, #fbd3e9, #bb377d)',
        ];

        return $this->twig->render(
            'home.html.twig',
            [
                'background' => $backgrounds[random_int(0, count($backgrounds) - 1)],
            ]
        );
    }
}
