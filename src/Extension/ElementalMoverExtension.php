<?php

namespace Derralf\ElementalMover;

use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;

use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\ArrayData;


class ElementalMoverExtension extends DataExtension
{

    public function updateCMSFields(FieldList $fields)
    {
        $availableParents = $this->getElementalAreaDropdownMap();
        if($availableParents) {
            $ParentIdDropdown = new DropdownField('TempParentID', _t(__CLASS__.'.AreaDropdownLabel', 'Move to'), $availableParents, $this->owner->ParentID);
            $fields->addFieldToTab('Root.ExpertSettings', $ParentIdDropdown);
        }
        return $fields;
    }


    public function getElementalAreaDropdownMap() {
        $available_areas = ElementalArea::get();
        if($available_areas->exists()) {
            $area_list = new ArrayList();
            foreach($available_areas as $area) {
                $ownerPage = $area->getOwnerPage();
                if ($ownerPage) {
                    $area_list->push(new ArrayData(array(
                        "AreaID" => $area->ID,
                        "PageMenuTitle" => $ownerPage->MenuTitle,
                        "PageLink" => $ownerPage->Link(),
                        "PageSort" => $ownerPage->Sort,
                        "PageParentSort" => $ownerPage->Parent()->Sort,
                        "DropdownTitle" => $area->getOwnerPage()->MenuTitle . ' (' . $area->getOwnerPage()->Link() . ')'
                    )));
                }
            }
            $area_list = $area_list->sort(array(
                'PageParentSort' => 'ASC',
                'PageSort'       => 'ASC',
                'PageLink'       => 'ASC'
            ));
            return $area_list->map("AreaID", "DropdownTitle");
        }
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        if($this->owner->TempParentID && ($this->owner->TempParentID != $this->owner->ParentID)) {
            $this->owner->ParentID = $this->owner->TempParentID;

        }
    }

}
