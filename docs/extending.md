# Extending

## A new component

One directory per family under `src/Components/`, one class, one markup file:

1. Extend `MarkupComponent`, take the `ClassResolver` plus typed props.
2. `render()` binds the props and requires the markup file through `ob_start()`.
3. The markup file declares its variables in a docblock, resolves every class
   through `$c('family-name')`, and escapes exactly once per output.
4. Test the rendered output byte-for-byte — every component's rendered output
   is a required test.

## A new class-map entry

The map is the consumer's: a theme names its own classes and ships the JSON.
The component's name is the stable key; the consumer owns what it resolves to.
A component never hard-codes a consumer's class name.

## What a component must never do

Fetch data, read a global, fire a hook, reference a `WP_*` type, or escape
twice. If a component needs data, the caller reads it and hands it over as a
constructor argument.
