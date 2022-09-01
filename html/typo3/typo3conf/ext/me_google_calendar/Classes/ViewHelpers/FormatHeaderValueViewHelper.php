<?php
namespace MediaEssenz\MeGoogleCalendar\ViewHelpers;

class FormatHeaderValueViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * @return string
     */
    public function render()
    {
        $code = $this->renderChildren();
        $code = str_replace('[SPACE1]', ' ', $code);
        $code = str_replace('[SPACE2]', ' ', $code);
        $code = str_replace(', ,', ' ', $code);
        $code = str_replace(' ,', ' ', $code);
        $code = str_replace(', ', ' ', $code);

        return trim($code);
    }
}
