# SilverStripe Elemental Mover

A simple experimental extension to move Elements to other Areas/Pages.  
(private project, no help/support provided)

## Requirements

* SilverStripe ^4.2
* dnadesign/silverstripe-elemental ^3.0


## Installation

- Install a module via Composer
  
  ```
  composer require derralf/elemental-mover
  ```

- Apply extension to BaseElement
  
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