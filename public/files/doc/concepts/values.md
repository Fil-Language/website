# Values

### Variables and constant

There is only 2 way for storing a value in fil, and they pretty look similar:

```fil
// Variable
var my_variable: i32 = 3
// Constant
val my_constant: char = 'f'
```

The only difference reside in the first keyword: `val` for constants versus `var` for variables. In previous example, it
was the full syntax: keyword name type and initial value. Some parts are optional:

- If you provide the initial value, the type can be inferred by the compiler and so can be omitted -> `val foo = "bar"`.
- For variables the initial value can be set later if you provide the type -> `var foo: bool` and then `foo = true`. It
  doesn't work for constants, you must provide the value at declaration.

### Types

**Integer**

| Length  | Signed | Unsigned |
|:--------|:-------|:---------|
| 8-bit   | `i8`   | `u8`     |
| 16-bit  | `i16`  | `u16`    |
| 32-bit  | `i32`  | `u32`    |
| 64-bit  | `i64`  | `u64`    |
| 128-bit | `i128` | `u128`   |
| arch    | `int`  | `uint`   |

**Float**

There is `f32` and `f64` respectively for 32 and 64 bits floating point.

**Boolean**

The type is `bool` and can either be `true` or `false`.

**Character**

To store character you can use the type `char`. Under the hood it's an alias of the type `u8`.

All these types belong to scalar types. After them there is 2 basics: arrays and pointers

**Arrays**

Arrays are static by default, their size are determined at compile time from the declaration. To do so just add brackets
with the desired size (`int[5]`). The size can be inferred by the compiler if you associate declaration with definition,
it's the easiest way:

```fil
var my_array = [1, 2, 3] // Inferred to i32[3]
```

Note that this array size cannot be increased nor reduced, you can only change the contained values as long as
it's the same type as the original one.

**Pointers**

To declare a new pointer you use the `new` keyword, or get address of an existing variable with `&`.

### Operations

**Numeric operators**

They apply only on integers, floats and chars.

```fil
// Addition
1 + 2
1++
// Subtraction
6 - 5
3--
// Multiplication
2.0 * 0.5
// Division
6 / 3
// Remainder
42 % 3
```

**Boolean operators**

```fil
// Logical AND
true && false
// Logical OR
true || true
// Logical NOT
!false
```

**Comparison operators**

```fil
// Equality
1 == 1
// Inequality
2 != 3
// Lesser than
2 < 3
2 <= 2
// Greater than
3 > 2
3 >= 3
```

**Array operators**

Arrays are basically just pointers, so you can do pointer arithmetics (at your own risk). Else you can use array access
operator `[]`.

```fil
val my_array = [1, 2, 3]
my_array[0] // 1
```

**Pointer operators**

As in all others languages with pointers, you can do pointer arithmetics*!!!* Using addition and subtraction you can
travel around memory. But keep in mind that these operations must be kept under control, your program may try access to
unauthorized memory.

**Assignation operators**

All binary numeric and boolean operators can be used directly for assignation:

```fil
var my_var = 2
my_var += 3
// my_var == 5
```
