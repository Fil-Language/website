# Installation

**Current state**

|  Tool  |                                   Version                                   |
|:------:|:---------------------------------------------------------------------------:|
| `filc` | ![](https://raw.githubusercontent.com/Fil-Language/filc/master/version.svg) |

## `filc`

Fil compiler

### Debian and rpm packages

Debian and rpm packages are available in [latest release](https://github.com/Fil-Language/filc/releases/latest).
Binaries are also available on the same page.

These packages are also built for each commit pushed on master branch, but please note that it is not a stable version.

<div class="alert warning">
Packages and binaries are built on GitHub actions runners, so they are compatible only with this architecture, if your
machine runs on another architecture you must compile your binary from sources.
</div>

### From sources

First you will need to clone the repository

```sh
git clone https://github.com/Fil-Language/filc
cd filc
```

The recommended way to build is to use provided `shell.nix` file to get all dependencies, more information about Nix is
available on their site [https://nixos.org/](https://nixos.org/).

#### Using nix

```sh
nix-shell --run 'build_release'
sudo cp filc /usr/bin/
```

#### By hand

These are the dependencies you'll need to install

- Antlr4 C++ runtime
- Java
- The C++ compiler of your choice
- CMake
- LLVM

You can then run:

```sh
cmake -B build -DCMAKE_BUILD_TYPE=Release
cmake --build build
```

### Nix package

filc is not yet available in nixpkgs, but you can take inspiration from the provided [
`tools/nix/filc.nix`](https://github.com/Fil-Language/filc/blob/master/tools/nix/filc.nix)
