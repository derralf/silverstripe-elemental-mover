# SilverStripe Elemental Mover

A simple experimental extension to move Elements to other Areas/Pages.  
(private project, no help/support provided).

## Requirements

* SilverStripe CMS ^4.3
* dnadesign/silverstripe-elemental ^4.0

For a SilverStripe 4.2 and Elemental 3.x compatible version of this module, please see the [1.x release line](https://github.com/derralf/silverstripe-elemental-mover/tree/1.0#readme).

## Installation

- Install a module via Composer
  
```
composer require derralf/elemental-mover
```

- Apply extension to BaseElement in **mysite/\_config/elements.yml**

  
```
DNADesign\Elemental\Models\BaseElement:
  extensions:
    - Derralf\ElementalMover\ElementalMoverExtension

```


## Configuration

none

## Usage

Go to "Expert Settings" tab, select another page and save.

## Caution

- You will eventally get a "page does not" after moving/saving. I don't know how to prevent this.
- May not work properly with mutliple Element Areas per Page
