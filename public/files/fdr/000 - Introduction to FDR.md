# 000 - Introduction to FDR

> - Author: Kevin Traini
> - Status: Published
> - Publication date: 2024-07-04
> - License: MIT

#### Abstract

Fil Decision Records are used as specifications file for Fil project.

#### Table of Contents

- [1. Definition](#1-definition)
- [2. Why?](#2-why)
- [3. Usage](#3-usage)

## 1. Definition

FDR stands for `Fil Decision Record`. They are file used to save and store all decisions about Fil project. One file is
an FDR, and the collection is FDRs.

## 2. Why?

As of July 2024, it makes 5 years this project begins. But nothing has been released yet and not many things has been
done too. Why? Because the lack of methodology. The project begins with just a simple idea and instantly jump into
development without any reflexions on how to do it, the result is clear: we lost 5 years.

With FDRs the goal is to force the reflexion before doing anything, write it into an FDR and then use it as a reference
for all works.

## 3. Usage

For each important decisions, a new FDR should be written. Decisions with a global impact - that's to say entire
project - must be stored inside website repository to be listed and showed directly in it. Each part of the project can
have its own list of FDR, then it must be stored at the root of the repository inside a directory named `fdr` (lower
case) and numbered from 001.

Files must be written in Markdown with this structure:

```markdown
# Title

> - Author: Name
> - Status: Draft|Published
> - Publication date: 2024-07-10
> - Last revision: 2024-07-15
> - License: MIT

#### Abstract

Short description of the file content

#### Table of Contents

- [1. Numbered chapter](#1-numbered-chapter)

## 1. Numbered chapter

Some content

#### License

MIT License

Copyright (c) 2024-Present Kevin Traini

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

```

The template file is available in the website repository in the same directory where FDRs are stored.

As they are stored inside a git repository it's possible to update them by submitting a new commit, previous version are
still available in the git history.

#### License

MIT License

Copyright (c) 2024-Present Kevin Traini

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
