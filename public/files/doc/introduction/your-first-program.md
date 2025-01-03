# Your first program

<div class="alert info">
As of version 0.1.0 of the compiler, not many feature are available. We recommend to wait at least for version 0.2.0 or
better first stable version 1.0.0 to have a better set of feature.
</div>

## Let's do some computation

Fil code is written in `.fil` file.

In this first program we'll write a little script which compute the result of operation `3 * 2 + 4` in a variable and
then return the result as exit code.

```
// main.fil
val result = 3 * 2 + 4
```

This line declare a constant in which we store the result of our operation. As the declaration is an expression it
returns a value, the constant's one. The compiler will then use this value as the exit code. If your program has
multiple expression, the value of the last expression is used as exit code.

To compile your program run this command

```shell
filc main.fil
```

The result is an object file. You need to use `ld` or a compiler like `gcc` to transform it to an executable. You then
execute it and the exit code of it should be `10`.
