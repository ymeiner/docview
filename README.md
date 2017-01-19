## Installation

Just checkout repo or copy files to a public folder.


install with composer:

```
composer install
```

## Use cases

A few ways to use the tool:

### In /docs/ folder

```
my.site.com/{docname}
```
for example, [/example](/example)

### File is online somewhere

will look in the docs folder for a file with the same name;

```
my.site.com/?docname=http://some.domain.com/path/to/file.md
```
for example [/?docname=https://raw.githubusercontent.com/tchapi/markdown-cheatsheet/master/README.md](/?docname=https://raw.githubusercontent.com/tchapi/markdown-cheatsheet/master/README.md)

will present a file on another server

### shortcuts File

Shortcuts.json is a json object that can hold ready made shortcuts.

For example if the json obejct looks like that:

```json
{
  "shortcut-example" : "https://raw.githubusercontent.com/adam-p/markdown-here/master/README.md"
}
```

when you go to [/shortcut-example](/shortcut-example), you would get the article above
