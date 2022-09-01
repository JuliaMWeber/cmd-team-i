<?php
namespace MediaEssenz\MeGoogleCalendar\ViewHelpers;

class JsBoolViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * @return string
     */
    public function render()
    {
        $code = $this->renderChildren();

        return empty($code) ? 'false' : 'true';
    }
}
